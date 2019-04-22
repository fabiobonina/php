<?php
	require_once 'cilProgDemanda.control.php';
	require_once '../emailPHP.php';

	class CilindroProgControl extends CilindroDemandaControl {

		public function matrix( $item ){
			
			$lojas     		= new Loja();
			$locais     	= new Local();
			
			$item->local 			= $locais->find( $item->local_id );
			$item->local_tipo		= $item->local->tipo;
			$item->local_name		= $item->local->name;
			$item->local_municipio	= $item->local->municipio;
			$item->local_uf			= $item->local->uf;
			$item->loja 			= $lojas->find( $item->loja_id );
			$item->loja_nick		= $item->loja->nick;
			$item->loja_name		= $item->loja->name;
			//$item->local_lat		= $local->latitude;
			//$item->local_long		= $local->longitude;
			//$item->equipamento		= $equipamentos->find( $item->equipamento_id );
			$item->demandas		= $this->listDemanda( $item->id );

			//$oss->ajuste( $item->id, $local->uf );
			//$osTecnicos->ajuste( $item->id, $item->status );

			return $item;

		}

		public function publish(
			$loja_id,
			$local_id,
			$data,
			$status,
			$id )
		{
			$item['error'] = false;
			$cilindroProg	= new CilindroProg();

			$cilindroProg->setLoja($loja_id);
			$cilindroProg->setLocal($local_id);
			$cilindroProg->setData($data);
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
			$itens 	= array();
			foreach($cilindroProg->findAll() as $key => $value): {
				$item = $value;
				$item = $this->matrix( $item );
				$item = (array)  $item;
				array_push( $itens, $item );
			}endforeach;
			$res = $itens;
			return $res;

		}

		public function show( $cilProgramacao_id ){
			$cilindroProg	= new CilindroProg();
			
			$item = $cilindroProg->find( $cilProgramacao_id );
			//var_dump($item);
			if( !$item ){
				
				$res['error'] = true;
				$res['message'] = 'Error, Dados nao encontrado';
				
			}else{
				$res['error'] = false;
				$res['programacao'] = $this->matrix( $item );
				$res['message'] = 'OK, Dados encontrado';
			}

			return $res;

		}

		

		
		
	}
