<?php
require_once 'Crud.php';

class Usuarios extends Crud{
	
	protected $table = 'login';
	private $nome;
	private $email;
	private $nickuser;
	private $senha;
	private $nivel_usuario;
	private $ativo;
	private $datacadastro;
	private $datalogin;



	public function setNome($nome){
		$nome = iconv('UTF-8', 'ASCII//TRANSLIT', $nome);
		$this->nome = strtoupper ($nome);
	}
	public function getNome(){
		return $this->nome;
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
	public function setNivel($nivel_usuario){
		$this->nivel_usuario = $nivel_usuario;
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
		$sql  = "INSERT INTO $this->table (nome, email, nickuser, senha, nivel, ativo, data_cadastro, data_ultimo_login) ";
		$sql .= "VALUES (:nome, :email, :nickuser, :senha, :nivel, :ativo, :data_cadastro, :data_ultimo_login)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome',$this->nome);
		$stmt->bindParam(':email',$this->email);
		$stmt->bindParam(':nickuser',$this->nickuser);
		$stmt->bindParam(':senha',$this->senha);
		$stmt->bindParam(':nivel',$this->nivel_usuario);
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
			$sql  = "UPDATE $this->table SET nome = :nome, email = :email, nickuser = :nickuser, senha = :senha, WHERE id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':nome', $this->nome);
			$stmt->bindParam(':email', $this->email);
			$stmt->bindParam(':nickuser',$this->nickuser);
			$stmt->bindParam(':senha',$this->senha);
			$stmt->bindParam(':id', $id);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
		
	}

	public function logar(){

		// SELECIONAR BANCO DE DADOS
		
		$sql = "SELECT * from $this->table WHERE BINARY nickuser=:nickuser AND BINARY senha=:senha ";
			try{
				$stmt = DB::prepare($sql);
				$stmt->bindParam(':nickuser', $this->nickuser);
				$stmt->bindParam(':senha', $this->senha);
				$stmt->execute();
				$contar = $stmt->rowCount();
				if($contar>0){
					$loop = $stmt->fetchAll();
					foreach ($loop as $show){
						$loginId = $show->id;
						$loginNome = $show->nome;
						$loginEmail = $show->email;
						$loginUser = $show->nickuser;
						$loginSenha = $show->senha;
						$loginNivel = $show->nivel;
					}
					$_SESSION['loginId'] = $loginId;
					$_SESSION['loginNome'] = $loginNome;
					$_SESSION['loginEmail'] = $loginEmail;
					$_SESSION['loginUser'] = $loginUser;
					$_SESSION['loginSenha'] = $loginSenha;
					$_SESSION['loginNivel'] = $loginNivel;

					echo '<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<strong>Logado com Sucesso!</strong> Redirecionando para o sistema.
					</div>';
					
					header("Refresh: 3, index.php?acao=welcome");
				}else{
					echo '<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<strong>Erro ao logar!</strong> Os dados estão incorretos.
					</div>';
				}
			} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
		
	}


}