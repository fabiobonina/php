<?php
	require_once 'cilDemanda.control.php';

	class CilindroProgControl extends CilindroDemandaControl {

		public function matrix( $item, $modelo ){
			
			$lojas     		= new Loja();
			$locais     	= new Local();
			
			$item->loja 		= $lojas->find( $item->loja_id );
			$item->loja_nick	= $item->loja->nick;
			$item->loja_name	= $item->loja->name;

			$item->local 			= $locais->find( $item->local_id );
			$item->local_tipo		= $item->local->tipo;
			$item->local_name		= $item->local->name;
			$item->local_municipio	= $item->local->municipio;
			$item->local_uf			= $item->local->uf;
			$item->demanda			= $this->demandaProg( $item->id);
			if($modelo > 1){
				
			}
			

			return $item;

		}

		public function publish(
			$loja_id,
			$local_id,
			$dt_programacao,
			$status,
			$id )
		{
			$item['error'] = false;
			$cilindroProg	= new CilindroProg();

			$cilindroProg->setLoja($loja_id);
			$cilindroProg->setLocal($local_id);
			$cilindroProg->setDtProgramacao($dt_programacao);
			$cilindroProg->setStatus($status);

			if( $id == '' ):
				# Insert
				$item = $cilindroProg->insert();

			endif;
			if( $id > '0' ):
				# Update
				$item = $cilindroProg->update($id);

			endif;

			$res = $item;
			return $res;

		}
		public function delete( $os_id ){

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

		public function list(){
			$cilindroProg	= new CilindroProg();
			
			$modelo = '2';
			$itens 	= array();
			foreach($cilindroProg->findAll() as $key => $value): {
				$item = $value;
				$item = $this->matrix( $item, $modelo );
				$item = (array)  $item;
				array_push( $itens, $item );
			}endforeach;
			$res = $itens;
			return $res;

		}

		public function show( $programacao_id ){
			$cilindroProg	= new CilindroProg();
			
			$modelo = '1';
			$item = $cilindroProg->find( $programacao_id );
			//var_dump($item);
			if( !$item ){
				$res['error'] = true;
				$res['message'] = 'Error, Dados nao encontrado';
				
			}else{
				$res['error'] = false;
				$res['programacao'] = $this->matrix( $item, $modelo );
				//$res['demandas'] 	= $this->demandaProg( $item->id, $modelo );
				$res['items'] 		= $this->itemProg( $item->id, $modelo );
				$res['message'] = 'OK, Dados encontrado';
			}

			return $res;

		}

		

		
		
	}
