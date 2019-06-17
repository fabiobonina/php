<?php
	require_once '_global.php';

	class UserControl extends GlobalControl {

		public function session( $item ){
			
			#CRIAR SESSÃO
			$_SESSION['user_id']            = $item->id;
			$_SESSION['user_name']          = $item->name;
			$_SESSION['user_email']         = $item->email;
			$_SESSION['user_user']          = $item->user;
			$_SESSION['user_token']         = $item->chave;
			$_SESSION['user_avatar']        = $item->avatar;
			$_SESSION['user_proprietario']  = $item->proprietario;
			$_SESSION['user_grupo']         = $item->grupo;
			$_SESSION['user_loja']          = $item->loja;
			$_SESSION['user_nivel']         = $item->nivel;
			$_SESSION['user_uf']         	= $item->uf;
			$_SESSION['user_dtCadastro']    = $item->data_cadastro;
			$_SESSION['user_dtUltimoLogin'] = $item->data_ultimo_login;

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
			if( !$item['error']){
				$this->matrix( $item );				
			}
			return $item;

		}

		public function logar( $email, $senha ){
			$usuarios   = new User();
			$password 	= md5($senha);
			$item 		= $usuarios->findEmail( $email, $password );

			if( !$item['error'] ){
				$this->matrix( $item );
			}

			return $item;
		}

		public function logout(){
			//session_start();
			session_destroy();
		}

	}
