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
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
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
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
		
	}

	public function isLoggedIn( $chave ){
		// SELECIONAR BANCO DE DADOS
		try{
			$sql = "SELECT id, name, email, user, avatar, chave, proprietario, grupo, loja, nivel, uf, ativo, data_cadastro, data_ultimo_login from $this->table WHERE BINARY chave= :chave ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':chave', $chave);
			$stmt->execute();
			$contar = $stmt->rowCount();
			if($contar>0){
				$res['user'] = $stmt->fetch();
				$res['error'] = false;
				return $res;
				
			}else{
				$res['error'] = true;
				$res['isLoggedIn'] = false;
				return $res;
			}
			
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}

	public function validationPassword($email, $password){
		try{
			$sql  = "SELECT chave FROM $this->table WHERE BINARY email = :email AND password = :password ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':email', $email );
			$stmt->bindParam(':password', $password );
			$stmt->execute();
			$contar = $stmt->rowCount();
			if($contar>0){
				$loop = $stmt->fetchAll();
				return $loop;
			}else{
				$res['error']	= true;
				$res['message'] = 'Erro, senha invalida!';
				return $res;
			}
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}
	public function findEmail( $email ){
		try{

			$sql  = "SELECT COUNT(*) FROM $this->table WHERE BINARY email = :email ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':email', $email);
			$stmt->execute();
			return $stmt->fetchColumn();
			$sql = "SELECT id, name, email, user, avatar, chave, proprietario, grupo, loja, nivel, uf, ativo, data_cadastro, data_ultimo_login";
			$sql .=" from $this->table WHERE BINARY email = :email AND password = :password ";
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}
	public function matrixUser(){

			$res = "SELECT id, name, email, user, avatar, chave, proprietario, grupo, loja, nivel, uf, ativo, data_cadastro, data_ultimo_login";

			return $res;
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