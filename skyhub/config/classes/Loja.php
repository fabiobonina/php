<?php
require_once '_crud.php';

class Loja extends Crud{
	
	protected $table = 'tb_loja';
	protected $table2 = 'tb_loja_categoria';
	private $name;
	private $nick;
	private $proprietario;
	private $grupo;
	private $seguimento;
	private $data;
	private $ativo;

	public function setName($name){
		$this->name = $name;
	}
	public function setNick($nick){
		$this->nick = $nick;
	}
	public function setProprietario($proprietario){
		$this->proprietario = $proprietario;
	}
	public function setGrupo($grupo){
		$this->grupo = $grupo;
	}
	public function setSeguimento($seguimento){
		$this->seguimento = $seguimento;
	}
	public function setData($data){
		$this->data = $data;
	} 
	public function setAtivo($ativo){
		$this->ativo = $ativo;
	}
	public function setCategoria($categoria){
		$this->categoria = $categoria;
	}
	
	public function insert(){
		try{
			$sql  = "INSERT INTO $this->table (name, nick, proprietario, grupo, seguimento, data, ativo) ";
			$sql .= "VALUES (:name, :nick, :proprietario, :grupo, :seguimento, :data, :ativo)";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':name',$this->name);
			$stmt->bindParam(':nick',$this->nick);
			$stmt->bindParam(':proprietario',$this->proprietario);
			$stmt->bindParam(':grupo',$this->grupo);
			$stmt->bindParam(':seguimento',$this->seguimento);
			$stmt->bindParam(':data',$this->data);
			$stmt->bindParam(':ativo',$this->ativo);

			$categorias = json_decode( $this->categoria);
			if( isset($categorias) ){
				$stmt->execute();
				$lojaId = DB::getInstance()->lastInsertId();
				foreach ($categorias as $value){
					$itemId = $value->id;
					$sql  = "INSERT INTO $this->table2 ( loja, categoria ) ";
					$sql .= "VALUES ( :loja, :categoria )";
					$stmt = DB::prepare($sql);
					$stmt->bindParam(':loja', $lojaId );
					$stmt->bindParam(':categoria', $itemId );
					
					return $stmt->execute();
				}
			}else{
				return $stmt->execute();
			}
			

			
			if( isset($categorias) ):
				
			endif;
			return true;
			
		} catch(PDOException $e) {
			$res['error'] = true; 
			$arError = $e->getMessage();
			header("Content-Type: application/json");
			echo json_encode($res, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
		}

	}

	public function update($id){

		$sql  = "UPDATE $this->table SET name = :name, nick = :nick, ativo = :ativo WHERE id = :id ";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':name',$this->name);
		$stmt->bindParam(':nick',$this->nick);
		$stmt->bindParam(':proprietario',$this->proprietario);
		$stmt->bindParam(':grupo',$this->grupo);
		$stmt->bindParam(':seguimento',$this->seguimento);
		$stmt->bindParam(':data',$this->data);
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
					$loginNome = $show->name;
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
