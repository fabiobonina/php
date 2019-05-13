<?php
		
	require_once '_global.php';

	class CilindroItemControl extends GlobalControl{

		public function matrixItem( $item ){
			$cilindros	= new Cilindro();
			
			$item->cilindro	= $cilindros->find( $item->cilindro_id );
			$item->edit 	= false;
			return $item;

		}

		public function publishItem( 
			$programacao_id,
			$demanda_id,
			$cilindro_id,
			$id
	  		){
			$item['error'] 		= false;
			$cilindroItems	= new CilindroItem();

			$cilindroItems->setProgramacao($programacao_id);
			$cilindroItems->setDemanda($demanda_id);
			$cilindroItems->setCilindro($cilindro_id);

			if( $id == '' ):
				# Insert
				$item = $cilindroItems->insert();
			endif;
			if( $id > '0' ):
				# Update
				$item = $cilindroItems->update($id);

			endif;

			return $item;

		}

		public function itemProg( $demanda_id ){
			$cilindroItems 	= new CilindroItem();
			
			$arItem = array();
			foreach($cilindroItems->fetchProg( $demanda_id ) as $key => $value): {
				$item = $this->matrixItem( $value );
				array_push( $arItem, $item );
			}endforeach;
			
			return $arItem;
		}

		/*public function addItem( $demanda, $id, $cil_prog_id ) {
			$item['error'] = false;

			foreach ($demanda  as $key => $value){
				$cil_tipo = (object) $value['cil_tipo'];
				$item = $this->publishItem( $cil_tipo->id, $value['qtd'], $id, $cil_prog_id );
			  }

			$res = $item;
			return $res;

		}
		public function deleteItem( $os_id ){

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
		}*/
	}