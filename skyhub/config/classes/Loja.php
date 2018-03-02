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
			
		} catch(PDOException $e) {
			$res['error'] = true; 
			$arError = $e->getMessage();
			header("Content-Type: application/json");
			echo json_encode($res, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
		}

	}

	public function update($id){
		try{
			$sql  = "UPDATE $this->table SET name = :name, nick = :nick, grupo = :grupo, seguimento = :seguimento, ativo = :ativo WHERE id = :id ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':name',$this->name);
			$stmt->bindParam(':nick',$this->nick);
			$stmt->bindParam(':grupo',$this->grupo);
			$stmt->bindParam(':seguimento',$this->seguimento);
			$stmt->bindParam(':ativo',$this->ativo);
			$stmt->bindParam(':id', $id);
			return $stmt->execute();
		} catch(PDOException $e) {
			$res['error'] = true; 
			$res['message'] = $e->getMessage();
			header("Content-Type: application/json");
			echo json_encode($res, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
		}
		
	}

}
