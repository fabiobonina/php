<?php
require_once '_crud.php';

class Usuarios extends Crud{
	
	protected $table = 'users';
	private $name;
	private $email;
	private $nickuser;
	private $senha;
	private $nivel;
	private $avatar;
	private $proprientario;
	private $grupoLoja;
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
	public function setAvatar($avatar){
		$this->avatar = $avatar;
	}
	public function setProprietario($proprietario){
		$this->proprietario = $proprietario;
	}
	public function setGrupoLoja($grupoLoja){
		$this->grupoLoja = $grupoLoja;
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
		$sql  = "INSERT INTO $this->table (name, email, user, password, avatar, nivel, ativo, data_cadastro, data_ultimo_login) ";
		$sql .= "VALUES (:name, :email, :user, :password, :avatar, :nivel, :ativo, :data_cadastro, :data_ultimo_login)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':name',$this->name);
		$stmt->bindParam(':email',$this->email);
		$stmt->bindParam(':user',$this->nickuser);
		$stmt->bindParam(':password',$this->senha);
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

	public function logar(){
		// SELECIONAR BANCO DE DADOS
		$sql = "SELECT * from $this->table WHERE BINARY email=:email AND BINARY password=:password ";
			try{
				$stmt = DB::prepare($sql);
				$stmt->bindParam(':email', $this->email);
				$stmt->bindParam(':password', $this->senha);
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
						$loginGrupo = $show->grupoLoja;
						$loginLoja = $show->loja;
						$loginNivel = $show->nivel;
						$loginAtivo = $show->ativo;
						$loginDtCadastro = $show->data_cadastro;
					}
					if($loginAtivo == 0){
						try{
							$sql  = "UPDATE $this->table SET data_ultimo_login = :data_ultimo_login WHERE id = :id";
							$stmt = DB::prepare($sql);
							$stmt->bindParam(':data_ultimo_login', $this->datalogin);
							$stmt->bindParam(':id', $id);
							$stmt->execute();
						} catch(PDOException $e) {
							echo 'ERROR: ' . $e->getMessage();
						}
						$_SESSION['loginId'] = $loginId;
						$_SESSION['loginName'] = $loginName;
						$_SESSION['loginEmail'] = $loginEmail;
						$_SESSION['loginUser'] = $loginUser;
						$_SESSION['loginAvatar'] = $loginAvatar;
						$_SESSION['loginProprietario'] = $loginProprietario;
						$_SESSION['loginGrupo'] = $loginGrupo;
						$_SESSION['loginLoja'] = $loginLoja;
						$_SESSION['loginNivel'] = $loginNivel;
						$_SESSION['loginDtCadastro'] = $loginDtCadastro;

						echo '<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Logado!</h4>
						Sucesso, redirecionando para o sistema.
					  	</div>';
						header("Refresh: 1, index.php?acao=welcome");
					}else{
						echo '<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-ban"></i> Erro ao logar!</h4>
						Contate o administrador do sistema.
						</div>';
					}
					
				}else{
					echo '<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-ban"></i> Erro!</h4>
					Os dados estão incorretos.
				    </div>';
				}
			} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}
	public function updateLogar($id){
		// SELECIONAR BANCO DE DADOS
		try{
			$sql  = "UPDATE $this->table SET data_ultimo_login = :data_ultimo_login WHERE id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':data_ultimo_login', $this->datalogin);
			$stmt->bindParam(':id', $id);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}


}