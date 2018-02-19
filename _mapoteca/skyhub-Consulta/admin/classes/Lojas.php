<?php
require_once 'Crud.php';

class Lojas extends Crud{
	
	protected $table = 'tb_loja';
	private $nome;
	private $nick;
	private $ativo;

	public function setNome($nome){
		$nome = iconv('UTF-8', 'ASCII//TRANSLIT', $nome);
		$this->nome = strtoupper ($nome);
	}
	public function getNome(){
		return $this->nome;
	}
	public function setNick($nick){
		$nick = iconv('UTF-8', 'ASCII//TRANSLIT', $nick);
		$this->nick = strtoupper ($nick);
	}
	public function setAtivo($ativo){
		$this->ativo = $ativo;
	}

	public function insert(){

		$sql  = "INSERT INTO $this->table (nome, nick, ativo) ";
		$sql .= "VALUES (:nome, :nick, :ativo)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome',$this->nome);
		$stmt->bindParam(':nick',$this->nick);
		$stmt->bindParam(':ativo',$this->ativo);

		return $stmt->execute(); 

	}

	public function update($id){

		$sql  = "UPDATE $this->table SET nome = :nome, nick = :nick, ativo = :ativo WHERE id = :id ";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':nick',$this->nick);
		$stmt->bindParam(':ativo',$this->ativo);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
		
	}

	public function logar(){

		// SELECIONAR BANCO DE DADOS
		
		$sql = "SELECT * from $this->table WHERE BINARY nickuser=:nickuser AND BINARY senha=:senha ";

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
				
				header("Refresh: 6, index.php?acao=welcome");
			}else{
				echo '<div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Erro ao logar!</strong> Os dados estão incorretos.
                </div>';
			}
		
	}


}
