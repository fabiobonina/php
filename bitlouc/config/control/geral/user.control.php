<?php
	require_once '_global.php';

	class UserControl extends GlobalControl {

		public function session( $item ){
			
			#CRIAR SESSÃO
			$_SESSION['loginId']            = $item->id;
			$_SESSION['loginName']          = $item->name;
			$_SESSION['loginEmail']         = $item->email;
			$_SESSION['loginUser']          = $item->user;
			$_SESSION['loginToken']         = $item->chave;
			$_SESSION['loginAvatar']        = $item->avatar;
			$_SESSION['loginProprietario']  = $item->proprietario;
			$_SESSION['loginGrupo']         = $item->grupo;
			$_SESSION['loginLoja']          = $item->loja;
			$_SESSION['loginNivel']         = $item->nivel;
			$_SESSION['loginUf']         	= $item->uf;
			$_SESSION['loginDtCadastro']    = $item->data_cadastro;
			$_SESSION['loginDtUltimoLogin'] = $item->data_ultimo_login;

		}

		public function matrix( $item ){
			$usuarios   = new User();
          	$user		= $item['user'];
			
			$datalogin = date("Y-m-d H:i:s");
			$usuarios->updateLogar( $user->id, $datalogin);
			$this->session( $user );

		}

		public function isLoggedIn( $chave ){

			$usuarios 	= new User();
			$item		= $usuarios->isLoggedIn( $chave );
			if( $item['error']){
				$res = $item;
				return $res;
			}else{
				$this->matrix( $item );
				return $item;
			}

		}

		public function logar( $email, $senha ){
			$usuarios   = new User();
			$password 	= md5($senha);
			$item 		= $usuarios->findEmail( $email, $password );
			if( $item['error'] ){
				$res = $item;
				return $res;
			}else{
				$this->matrix( $item );
				return $item;
			}

		}

		public function logout(){
			session_start();
			session_destroy();
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

	}
