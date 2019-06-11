<?php
	require_once 'cilItem.control.php';

	class CilindroDemandaControl extends CilindroItemControl {

		public function matrixDemanda( $item ){
			$cilTipos			= new CilTipo();

			$item->capacidade 	= $cilTipos->find( $item->capacidade_id );
			$item->active	= true;

			return $item;

		}

		public function publishDemanda( $programacao_id, $capacidade_id, $qtd, $id ) {
			$item['error'] 		= false;
			$cilindroDemandas	= new CilindroDemanda();

			$cilindroDemandas->setProgramacao($programacao_id);
			$cilindroDemandas->setCapacidade($capacidade_id);
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

		public function addDemanda( $demanda, $programacao_id ) {
			$item['error'] = false;

			foreach ($demanda  as $key => $value){
				$capacidade = (object) $value['capacidade'];
				$item = $this->publishDemanda( $programacao_id, $capacidade->id, $value['qtd'], $value['id'] );
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
		public function demandaProg( $programacao_id ){
			$cilindroDemandas 	= new CilindroDemanda();
			
			$arItem = array();
			foreach($cilindroDemandas->findProg( $programacao_id ) as $key => $value): {
				$value = $this->matrixDemanda( $value );
				array_push( $arItem, $value );
			}endforeach;
			
			return $arItem;
		}
	}