<?php

require_once '_DB.php';

abstract class Crud extends DB{
	
	protected $table;

	abstract public function insert();
	abstract public function update($id);
	//abstract public function logar();

	public function find($id){
		try{
		$sql  = "SELECT * FROM $this->table WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}

	public function findAll(){
		try{
			$sql  = "SELECT * FROM $this->table";
			$stmt = DB::prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}

	public function delete($id){
		try{
			$sql  = "DELETE FROM $this->table WHERE id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		
			if( $stmt->execute() ){
				$res['error'] = false;
				$res['message'] = "OK, deletado com sucesso";
			}else{
				$res['error'] = true;
				$res['message'] = "Error, não foi possivel deletar";
			}
			return $res;

		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}

	public function ativo($ativo){
		try {
			$sql  = "SELECT * FROM $this->table WHERE ativo = :ativo";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':ativo', $ativo, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();
			
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}

	public function contLocal( $local_id ){
		try {
			$sql  = "SELECT COUNT(*) FROM $this->table WHERE local_id  = :local_id ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':local_id', $local_id);
			$stmt->execute();
			return $stmt->fetchColumn();
			
			
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}
	
	public function contLoja( $loja_id ){
		try {
			$sql  = "SELECT COUNT(*) FROM $this->table WHERE loja_id  = :loja_id ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':loja_id ', $loja_id);
			$stmt->execute();
			return $stmt->fetchColumn();
			
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}

	public function contProprietario( $proprietario_id ){
		try {
			$sql  = "SELECT COUNT(*) FROM $this->table WHERE proprietario_id  = :proprietario_id ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':proprietario_id ', $proprietario_id);
			$stmt->execute();
			return $stmt->fetchColumn();
			
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}

}