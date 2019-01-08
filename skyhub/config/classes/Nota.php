<?php
require_once '_crud.php';

class Nota extends Crud{
	
	protected $table = 'tb_nota';
	private $os;
	private $descricao;

	public function setOs($os){
		$this->os = $os;
	}
	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}

	public function insert(){
		try{
			$sql  = "INSERT INTO $this->table (os, descricao) ";
			$sql .= "VALUES (:os, :descricao)";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':os',$this->os);
			$stmt->bindParam(':descricao',$this->descricao);
			$stmt->execute();

			$res['error'] = false;
			$res['message'] = "OK, processo da OS alterado com sucesso";

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
			$stmt->execute();

			$res['error'] = false;
			$res['message'] = "OK, processo da OS alterado com sucesso";

		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
		
	}
	public function motaOs($os){
		try{
			$sql  = "SELECT * FROM $this->table WHERE os = :os";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':os', $os, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();

		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}

}