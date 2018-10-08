<?php
require_once '_crud.php';

class Nota extends Crud{
	
	protected $table = 'tb_nota';
	private $os_id;
	private $descricao;

	public function setOs($os_id){
		$this->os_id = $os_id;
	}
	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}

	public function insert(){
		try{
			$sql  = "INSERT INTO $this->table (os_id, descricao) ";
			$sql .= "VALUES (:os_id, :descricao)";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':os_id',$this->os_id);
			$stmt->bindParam(':descricao',$this->descricao);
			return $stmt->execute();

		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}

	}

	public function update($id){
		try{
			$sql  = "UPDATE $this->table SET descricao = :descricao  WHERE id = :id ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':descricao', $this->descricao);
			$stmt->bindParam(':id', $id);
			return $stmt->execute();

		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
		
	}
	public function motaOs($os_id){
		try{
			$sql  = "SELECT * FROM $this->table WHERE os_id = :os_id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':os_id', $os_id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();

		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}

}