<?php
	require_once '_global.php';


	class UserControl extends GlobalControl {

		public function session( $item ){
			
			#CRIAR SESSÃO
			$_SESSION['loginId']            = $item->id;
			$_SESSION['loginName']          = $item->name;
			$_SESSION['loginEmail']         = $item->email;
			$_SESSION['loginUser']          = $item->user;
			$_SESSION['loginToken']         = $item->token;
			$_SESSION['loginAvatar']        = $item->avatar;
			$_SESSION['loginProprietario']  = $item->proprietario;
			$_SESSION['loginGrupo']         = $item->grupo;
			$_SESSION['loginLoja']          = $item->loja;
			$_SESSION['loginNivel']         = $item->nivel;
			$_SESSION['loginUf']         	= $item->uf;
			$_SESSION['loginDtCadastro']    = $item->dtCadastro;
			$_SESSION['loginDtUltimoLogin'] = $item->dtUltimoLogin;

			return true;

		}

		public function matrix( $item ){
					
			$item->error 		= false;
			$item->isLoggedIn 	= true;
			return $item;

		}
		public function validacao( $item ){
			$locais      	= new Local();
			$equipamentos	= new Equipamento();
			$oss			= new Os();

			$datalogin = date("Y-m-d H:i:s");
			$this->updateLogar( $login['id'], $datalogin);
					
			$item->error 		= false;
			$ite->isLoggedIn 	= true;
			return $item;
			$res['error'] 	= true;
				$res['message'] = "Error ao logar! Contate o administrador do sistema.";
				return $res;
		}

		

		public function isLoggedIn( $chave ){

			$usuarios       = new Usuarios();
			$item 	= $usuarios->findEmail( $chave );
			$item = $this->matrix( $item );
			$item = (array)  $item;
			array_push( $itens, $item );

					if($loop->ativo == 0){
						$datalogin = date("Y-m-d H:i:s");
						$this->updateLogar( $login['id'], $datalogin);
						
						$login['error'] = false;
						$login['isLoggedIn'] = true;
						
						$_SESSION['loginId']            = $login['id'];
						$_SESSION['loginName']          = $login['name'];
						$_SESSION['loginEmail']         = $login['email'];
						$_SESSION['loginUser']          = $login['user'];
						$_SESSION['loginToken']         = $login['token'];
						$_SESSION['loginAvatar']        = $login['avatar'];
						$_SESSION['loginProprietario']  = $login['proprietario'];
						$_SESSION['loginGrupo']         = $login['grupo'];
						$_SESSION['loginLoja']          = $login['loja'];
						$_SESSION['loginNivel']         = $login['nivel'];
						$_SESSION['loginUf']         	= $login['uf'];
						$_SESSION['loginDtCadastro']    = $login['dtCadastro'];
						$_SESSION['loginDtUltimoLogin'] = $login['dtUltimoLogin'];
	
						return $login;
	
					}else{
						$res['error'] = true;
						$res['isLoggedIn'] = false;
						return $res;
					}
		}
		public function logar( $email, $senha ){
			$usuarios   = new Usuarios();
			
			$password 	= md5($senha);
			$item 	= $usuarios->findEmail( $email );
			if( $item > 0 ){
				$item 	= $usuarios->validationPassword( $email, $password );
				$res['user'] = $stmt->fetch();
				$res['error'] = false;
				return $res;
				
			}else{
				$res['error'] = true;
				$res['isLoggedIn'] = false;
				return $res;
			}
			$item = $this->matrix( $item );
			$item = (array)  $item;
			array_push( $itens, $item );

			$res = $itens;
			return $res;
			  
				$datalogin = date("Y-m-d H:i:s");
				$password = md5($senha);
			  
				#CONFIRMAÇÃO-LOGIN-------------------------------------------------------------------------------------------
				#CONFINAÇÃO EMAIL
				$userValido = '0';
				foreach($usuarios->findEmail( $email ) as $key => $value): {
				  
				  #CONFINAÇÃO SENHA
				  $value->password;
				  $userValido++;
				  if($password == $value->password){
					
					#CONFINAÇÃO ATIVO
					$loginAtivo = $value->ativo;
					if($loginAtivo == 0){
					  //$login = array();
					  $login['id']            = $value->id;
					  $login['name']          = $value->name;
					  $login['email']         = $value->email;
					  $login['user']          = $value->user;
					  $login['avatar']        = $value->avatar;
					  $login['token']         = $value->chave;
					  $login['proprietario']  = $value->proprietario;
					  $login['grupo']         = $value->grupo;
					  $login['loja']          = $value->loja;
					  $login['nivel']         = $value->nivel;
					  $login['dtCadastro']    = $value->data_cadastro;
					  $login['dtUltimoLogin'] = $value->data_ultimo_login;
					  
					  #ATUALIZAÇÃO ULTIMO LOGIN
					  if($usuarios->updateLogar($login['id'], $datalogin)){
						$res['error'] = false;
						$res['isLoggedIn']= true;
						$res['dados']= $login;
						$res['token']= $value->chave;
						$res['message']= 'Logado com sucesso!';
					  }else{
						$arError = "Atenção, data não atualizada";
						array_push($arErros, $arError);
					  }
			  
					}else{
					  $res['error'] = true;
					  $arError = "Error ao logar! Contate o administrador do sistema.";
					  array_push($arErros, $arError);
					}
				  }else{
					$res['error'] = true;
					$arError = "Error ao logar! Senha invalida!";
					array_push($arErros, $arError);
				  }
				}endforeach;
				#CONFIRMAÇÃO-LOGIN-------------------------------------------------------------------------------------------
				
				if($userValido == 0){
				  $res['error'] = true;
				  $arError = "Error ao logar! Usuario não encontrado!";
				  array_push($arErros, $arError);
				}
				if($res['error'] == true){
				  $res['message']= $arErros;
				}
				
			
			  

		}

		public function updateLogar( $user_id ){
			$lojas	= new Loja();
			$itens 	= array();
			
			foreach($lojas->findProprietario( $proprietario_id ) as $key => $value): {
				$item =  $value;
				$item = (array) 	$this->matrix( $item );
				array_push( $itens, $item );
			}endforeach;
			$res = $itens;
			return $res;
		}

		

		public function insertLoja(
			$loja,
			$tipo,
			$regional,
			$name,
			$municipio,
			$uf,
			$lat,
			$long,
			$categorias,
			$ativo ){

			$lojas	= new Loja();

			$lojas->setLoja($loja);
			$lojas->setTipo($tipo);
			$lojas->setRegional($regional);
			$lojas->setName($name);
			$lojas->setMunicipio($municipio);
			$lojas->setUf($uf);
			$lojas->setAtivo($ativo);
			# Insert
			$item = $lojas->insert();
			if( !$item['error'] ){
				$item = $this->insertGeolocalizacao( $item['id'], $lat, $long );
				if( isset( $categorias )):
					$item = $this->insertCategoria( $item['id'], $categorias );
				endif;				
			}
			$res = $this->statusReturn($item);
			return $res;
		}

		public function updateLoja(
			$loja,
			$tipo,
			$regional,
			$name,
			$municipio,
			$uf,
			$lat,
			$long,
			$ativo,
			$id ){

			$lojas	= new Loja();

			$lojas->setLoja($loja);
			$lojas->setTipo($tipo);
			$lojas->setRegional($regional);
			$lojas->setName($name);
			$lojas->setMunicipio($municipio);
			$lojas->setUf($uf);
			$lojas->setAtivo($ativo);
			# Update
			$item = $lojas->updete($id);
			$item = $this->insertGeolocalizacao( $id, $lat, $long );
			
			$res = $this->statusReturn($item);
			return $res;
		}

		public function insertGeolocalizacao( $id, $lat, $long ){

			$lojas	= new Loja();

			$lojas->setLat($lat);
			$lojas->setLong($long);
			$item = $lojas->geolocalizacso($id);

			$res = $this->statusReturn($item);
			return $res;
		}
		
		public function deleteLoja( $localId ){

			$lojas 			= new Loja();
			$localCategorias	= new LocalCategorias();
			$item 	= $this->anexoLoja( $localId );
			if( !$item['error'] ){
				$item	= $lojas->delete($localId);
				$item	= $localCategorias->deleteCategoriaPorLoja($localId);
			}
			$res	= $this->statusReturn($item);
			return $res;
		}

		public function anexoLoja( $localId ){

			$equipamentos	= new Equipamento();

			$item['equipLocal_tt'] 			= $equipamentos->contLoja( $item['id'] );
			if( $item['equipLocal_tt']  == 0 ){
				$res['error'] = false;
				$res['message'] = 'OK, Local pode ser deletado';
			}else{
				$res['error'] = true;
				$res['message'] = 'Error, '.$item['equipLocal_tt'] .' - Equipamento(s) nesse Local! É necessario remover-los antes.';
			}
			return $res;
		}

		#LOCAL_CATERORIAS----------------------------------------------------------------------------------
		public function insertCategoria( $localId, $categorias ){

			$localCategorias = new LocalCategorias();

			foreach ( $categorias as $data){
				$categoriaId = $data['id'];
				$duplicado = false;

				foreach($localCategorias->findAll() as $key => $value):if( $value->categoria_id == $categoriaId )  {
					$duplicado = true;       
				}endforeach;

				if( !$duplicado ){
				  $localCategorias->setLoja($local);
				  $localCategorias->setCategoria($itemId);
					$item = $localCategorias->insert();

				}else{
				  $item['error'] = true; 
				  $item['message'] = "Error, item já cadastrado";
				}
			}

			if($item['error'] == true ){
				$res = $this->statusReturn($item);
			}else{

				$res = $this->statusReturn($item);
			}
			return $res;

		}

		public function statusCategoria( $localCatId, $ativo ){

			$localCategorias = new LocalCategorias();

			$localCategorias->setAtivo($ativo);
			$item = $localCategorias->update($localCatId);

			$res = $this->statusReturn($item);
			return $res;
			
		}

		public function deleteCategoria( $localCatId ){

			$localCategorias = new LocalCategorias();

			$item = $localCategorias->delete($localCatId);
			$res = $this->statusReturn($item);
			return $res;
			
		}

		public function deleteCategoriaPorLoja( $localId ){

			$localCategorias = new LocalCategorias();

			$res = $localCategorias->deleteLoja($localId);
			//$res = $this->statusReturn($item);
			return $res;
			
		}

		public function listCategoriaLoja( $lojaId ){
			
			$lojaCategorias		= new LojaCategorias();
			$categorias			= new Categorias();
    		$arTens 			= array();
			
			foreach($lojaCategorias->findAll() as $key => $value):if($value->loja_id == $lojaId) {
				$categoriaId 	= $value->categoria_id;
				$lojaCatAtivo 	= $value->ativo;
				$lojaCatId 	= $value->id;
				foreach($categorias->find( $categoriaId ) as $key => $value): {
					$item = (array) $value;
					$item['categoria_id'] 	= $categoriaId;
					$item['ativo']			= $lojaCatAtivo;
					$item['id'] 			= $lojaCatId;
					array_push( $arTens, $item );
				}endforeach;
			}endforeach;

			$res = $arTens;
			return $res;

		}

	}
