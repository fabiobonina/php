<?php
require_once '_crud.php';

class Usuarios extends Crud{
	
	protected $table = 'users';
	private $name;
	private $email;
	private $nickuser;
	private $senha;
	private $chave;
	private $nivel;
	private $avatar;
	private $proprientario;
	private $grupo;
	private $loja;
	private $ativo;
	private $datacadastro;
	private $datalogin;



	public function setName($name){
		$name = iconv('UTF-8', 'ASCII//TRANSLIT', $name);
		$this->name = strtoupper ($name);
	}
	public function getName(){
		return $this->name;
	}
	public function setEmail($email){
		$this->email = $email;
	}
	public function setNickuser($nickuser){
		$this->nickuser = $nickuser;
	}
	public function setSenha($senha){
		$this->senha = $senha;
	}
	public function setChave($chave){
		$this->chave = $chave;
	}
	public function setAvatar($avatar){
		$this->avatar = $avatar;
	}
	public function setProprietario($proprietario){
		$this->proprietario = $proprietario;
	}
	public function setGrupo($grupo){
		$this->grupo = $grupo;
	}
	public function setLoja($loja){
		$this->loja = $loja;
	}
	public function setNivel($nivel){
		$this->nivel = $nivel;
	}
	public function setAtivo($ativo){
		$this->ativo = $ativo;
	}
	public function setDataCadastro($datacadastro){
		$this->datacadastro = $datacadastro;
	}
	public function setDatalogin($datalogin){
		$this->datalogin = $datalogin;
	}


	public function insert(){
		try{
		$sql  = "INSERT INTO $this->table (name, email, user, password, chave, avatar, nivel, ativo, data_cadastro, data_ultimo_login) ";
		$sql .= "VALUES (:name, :email, :user, :password, :chave, :avatar, :nivel, :ativo, :data_cadastro, :data_ultimo_login)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':name',$this->name);
		$stmt->bindParam(':email',$this->email);
		$stmt->bindParam(':user',$this->nickuser);
		$stmt->bindParam(':password',$this->senha);
		$stmt->bindParam(':chave',$this->chave);
		$stmt->bindParam(':avatar', $this->avatar);
		$stmt->bindParam(':nivel',$this->nivel);
		$stmt->bindParam(':ativo',$this->ativo);
		$stmt->bindParam(':data_cadastro',$this->datacadastro);
		$stmt->bindParam(':data_ultimo_login',$this->datalogin);

		return $stmt->execute();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}

	}

	public function update($id){
		try{
			$sql  = "UPDATE $this->table SET name = :name, email = :email, nickuser = :nickuser, senha = :senha, WHERE id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':name', $this->name);
			$stmt->bindParam(':email', $this->email);
			$stmt->bindParam(':nickuser',$this->nickuser);
			$stmt->bindParam(':senha',$this->senha);
			$stmt->bindParam(':id', $id);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
		
	}

	public function isLoggedIn( $chave ){
		// SELECIONAR BANCO DE DADOS
		try{
			$sql = "SELECT id, name, email, user, avatar, chave, proprietario, grupo, loja, nivel, uf, data_cadastro, data_ultimo_login from $this->table WHERE BINARY chave= :chave ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':chave', $chave);
			$stmt->execute();
			$contar = $stmt->rowCount();
			if($contar>0){
				$loop = $stmt->fetch();
					
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
				
			}else{
				$res['error'] = true;
				$res['isLoggedIn'] = false;
				return $res;
			}
			
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}
	public function findKey($chave){
		try{
			$sql  = "SELECT * FROM $this->table WHERE BINARY chave = :chave ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':chave', $this->chave);
			$stmt->execute();
			$contar = $stmt->rowCount();
			if($contar>0){
				$loop = $stmt->fetchAll();
				foreach ($loop as $show){
					$loginId = $show->id;
					$loginName = $show->name;
					$loginEmail = $show->email;
					$loginUser = $show->user;
					$loginAvatar = $show->avatar;
					$loginProprietario = $show->proprietario;
					$loginGrupo = $show->grupo;
					$loginLoja = $show->loja;
					$loginNivel = $show->nivel;
					$loginAtivo = $show->ativo;
					$loginDtCadastro = $show->data_cadastro;
				}
				if($loginAtivo == 0){
					
				}else{

				}
				
			}else{

			}
			return $stmt->fetch();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}

	public function validationPassword($email; $password){
		try{
			$sql  = "SELECT * FROM $this->table WHERE BINARY chave = :chave ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':chave', $this->chave);
			$stmt->execute();
			$contar = $stmt->rowCount();
			if($contar>0){
				$loop = $stmt->fetchAll();
				foreach ($loop as $show){
					$loginId = $show->id;
					$loginName = $show->name;
					$loginEmail = $show->email;
					$loginUser = $show->user;
					$loginAvatar = $show->avatar;
					$loginProprietario = $show->proprietario;
					$loginGrupo = $show->grupo;
					$loginLoja = $show->loja;
					$loginNivel = $show->nivel;
					$loginAtivo = $show->ativo;
					$loginDtCadastro = $show->data_cadastro;
				}
				if($loginAtivo == 0){
					
				}else{

				}
				
			}else{

			}
			return $stmt->fetch();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}
	public function findEmail( $email, $password ){
		try{
			$sql  = "SELECT * FROM $this->table WHERE BINARY email = :email ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':email', $email);
			$stmt->execute();
			$contar = $stmt->rowCount();
			if($contar>0){
				$value 	= $stmt->fetchAll();

				if($password == $value->password){
      
					#CONFINAÇÃO ATIVO
					$loginAtivo = $value->ativo;
					if($loginAtivo == 0){
					
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

				}else{
					$res['error'] = true;
					$arError = "Error ao logar! Usuario não encontrado!";
					array_push($arErros, $arError);
				}
				return $stmt->fetch();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}
	public function updateLogar($id, $datalogin ){
		// SELECIONAR BANCO DE DADOS
		try{
			$sql  = "UPDATE $this->table SET data_ultimo_login = :data_ultimo_login WHERE id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':data_ultimo_login', $datalogin);
			$stmt->bindParam(':id', $id);
			return $stmt->execute();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}


}