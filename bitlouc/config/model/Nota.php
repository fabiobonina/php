<?php
require_once '_crud.php';

class Nota extends Crud{
	
	protected $table = 'tb_nota';
	protected $tableII = 'users';
	private $os_id;
	private $descricao;

	public function setOs($os_id){
		$this->os_id = $os_id;
	}
	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}
	public function setUser($user_id){
		$this->user_id = $user_id;
	}
	public function setData($data){
		$this->data = $data;
	}

	public function insert(){
		try{
			$sql  = "INSERT INTO $this->table (os_id, descricao, user_id, data) ";
			$sql .= "VALUES (:os_id, :descricao, :user_id, :data)";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':os_id'		,$this->os_id);
			$stmt->bindParam(':descricao'	,$this->descricao);
			$stmt->bindParam(':user_id'		,$this->user_id);
			$stmt->bindParam(':data'		,$this->data);
			$stmt->execute();

			$res['error'] = false;
			$res['message'] = "OK, salvo com sucesso";
			return $res;

		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}

	}

	public function update($id){
		try{
			$sql  = "UPDATE $this->table SET descricao = :descricao, user_id = :user_id  WHERE id = :id ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':descricao'	,$this->descricao);
			$stmt->bindParam(':user_id'		,$this->user_id);
			$stmt->bindParam(':id', $id);
			$stmt->execute();

			$res['error'] = false;
			$res['message'] = "OK, salvo com sucesso";
			return $res;

		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
		
	}
	public function motaOs($os_id){
		try{
			$sql  = "SELECT * FROM $this->table WHERE os_id = :os_id ORDER BY data desc";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':os_id', $os_id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();

		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}

	public function motaOsPlus( $os_id ){
		try{
			$sql  = "SELECT   $this->table.user_id, $this->tableII.id FROM $this->table INNER JOIN $this->tableB";
			$sql  .=" ON $this->table.loja_id = $this->tableB.loja_id ";
			$sql  .=" WHERE $this->table.os_id = :os_id ORDER BY data desc";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':os_id', $loja_id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}	
	public function findOs( $os_id ){
		try{
			$sql  = "SELECT $this->table.*, $this->tableII.user FROM $this->table INNER JOIN $this->tableII ";
			$sql  .="ON $this->table.user_id = $this->tableII.id ";
			$sql  .="WHERE $this->table.os_id = :os_id ORDER BY data desc";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':os_id', $os_id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}
}