<?php
	require_once 'cilProgItem.control.php';
	require_once '../emailPHP.php';

	class CilindroDemandaControl extends CilindroItemControl {

		public function matrixDemanda( $item ){
			
			$oss     		= new Os();
			$osTecnicos     = new OsTecnicos();
			$lojas     		= new Loja();
			$locais     	= new Local();
			$servicos   	= new Servicos();
			$categorias 	= new Categorias();
			$notas      	= new Nota();
			$equipamentos	= new Equipamento();
			$fabricantes	= new Fabricantes();
			$users			= new User();

			
			$local 					= $locais->find( $item->local_id );
			//$item->local_tipo		= $local->tipo;
			//$item->local_name		= $local->name;
			//$item->local_municipio	= $local->municipio;
			//$item->local_uf			= $local->uf;
			//$item->local_lat		= $local->latitude;
			//$item->local_long		= $local->longitude;
			//$item->equipamento		= $equipamentos->find( $item->equipamento_id );
			if($item->equipamento){
				$fabricante			= $fabricantes->find( $item->equipamento->fabricante_id );
				$item->equipamento->fabricante_nick		= $fabricante->nick;
			}
			$user					= $users->find( $item->user_id );
			$item->user_user		= $user->user;
			$item->servico			= $servicos->find( $item->servico_id );
			$item->categoria		= $categorias->find( $item->categoria_id );
			$item->tecnicos			= $this->listOsTec( $item->id );
			$item->notas			= $notas->findOs( $item->id );

			//$oss->ajuste( $item->id, $local->uf );
			//$osTecnicos->ajuste( $item->id, $item->status );

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
		public function listDemanda( $progracao_id ){
			$cilindroDemandas 	= new CilindroDemanda();
			$cilTipos			= new CilTipo();
			

			$arItem = array();
			foreach($cilindroDemandas->findProg( $progracao_id ) as $key => $value): {
				
				$value->cil_tipo = $cilTipos->find( $value->tipo_id );
				array_push( $arItem, $value );
			}endforeach;
			
			return $arItem;
		}
	}