<?php
	require_once 'cilProgItem.control.php';
	require_once '../emailPHP.php';

	class CilindroDemandaControl extends CilindroItemControl {

		public function matrixDemanda( $item, $modelo ){
			$cilTipos			= new CilTipo();

			$item->cil_tipo 	= $cilTipos->find( $item->tipo_id );
			if($modelo > 1){
				$item->itens	= $this->itemDemanda( $item->id );
			}

			return $item;

		}

		public function publishDemanda( $tipo_id, $qtd, $id, $cil_prog_id ) {
			$item['error'] 		= false;
			$cilindroDemandas	= new CilindroDemanda();

			$cilindroDemandas->setCilProg($cil_prog_id);
			$cilindroDemandas->setCilTipo($tipo_id);
			$cilindroDemandas->setQtd($qtd);

			if( $id == '' ):
				# Insert
				$item = $cilindroDemandas->insert();
			endif;
			if( $id > '0' ):
				# Update
				$item = $cilindroDemandas->update($id);

			endif;

			return $item;

		}

		public function addDemanda( $demanda, $id, $cil_prog_id ) {
			$item['error'] = false;

			foreach ($demanda  as $key => $value){
				$cil_tipo = (object) $value['cil_tipo'];
				$item = $this->publishDemanda( $cil_tipo->id, $value['qtd'], $id, $cil_prog_id );
			  }

			$res = $item;
			return $res;

		}
		public function deleteDemanda( $os_id ){

			$oss 			= new Os();
			$osTecnicos		= new OsTecnicos();
			//$item 	= $this->anexoLoja( $os_id );
			//if( !$item['error'] ){
				//echo 'delete';
				$item	= $oss->delete( $os_id );
				$item	= $osTecnicos->deleteOs( $os_id );
			//}
			$res	= $item;
			return $res;
		}
		public function demandaProg( $progracao_id, $modelo ){
			$cilindroDemandas 	= new CilindroDemanda();
			
			$arItem = array();
			foreach($cilindroDemandas->findProg( $progracao_id ) as $key => $value): {
				$value = $this->matrixDemanda( $value, $modelo );
				array_push( $arItem, $value );
			}endforeach;
			
			return $arItem;
		}
	}