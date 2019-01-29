<?php

require_once '_crud.php';

class OsTecnicos extends Crud{
	
	protected $table = 'tb_os_tecnico';
	protected $tableB = 'tb_os';
	private $os_id;
	private $loja_id;
	private $tecnico_id;
	private $user_id;
	private $user_nick;
	private $hh;

	public function setOs($os_id){
		$this->os_id = $os_id;
	}
	public function setLoja($loja_id){
		$this->loja_id = $loja_id;
	}
	public function setTecnico($tecnico_id){
		$this->tecnico_id = $tecnico_id;
	}
	public function setUser($user_id){
		$this->user_id = $user_id;
	}
	public function setUserNick($user_nick){
		$this->user_nick = $user_nick;
	}
	public function setHh($hh){
		$this->hh = $hh;
	}
	
	public function insert(){
		try{
			$sql  = "INSERT INTO $this->table ( os_id, loja_id, tecnico_id, user_id, user_nick, hh ) ";
			$sql .= "VALUES ( :os_id, :loja_id, :tecnico_id, :user_id, :user_nick, :hh )";
			$stmt = DB::prepare($sql);

			$stmt->bindParam(':os_id',			$this->os_id);
			$stmt->bindParam(':loja_id',		$this->loja_id);
			$stmt->bindParam(':tecnico_id',		$this->tecnico_id);
			$stmt->bindParam(':user_id',		$this->user_id);
			$stmt->bindParam(':user_nick',		$this->user_nick);
			$stmt->bindParam(':hh',				$this->hh);
			$stmt->execute();
			$res['error'] = false;
			$res['message'] = "OK, dados salvo com sucesso";
			return $res;
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}
	public function update($id){
		try{
			$sql  = "UPDATE $this->table SET os_id = :os_id, loja_id = :loja_id, tecnico_id = :tecnico_id, user_id = :user_id, hh = :hh WHERE id = :id";
			$stmt = DB::prepare($sql);

			$stmt->bindParam(':os_id',			$this->os_id);
			$stmt->bindParam(':loja_id',		$this->loja_id);
			$stmt->bindParam(':tecnico_id',		$this->tecnico_id);
			$stmt->bindParam(':user_id',		$this->user_id);
			$stmt->bindParam(':hh',				$this->hh);
			$stmt->bindParam(':id', $id);

			$res['error'] = false;
			$res['message'] = "OK, dados alterado com sucesso";
			return $res;
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}
	public function findOs($os_id){
		try{
			$sql  = "SELECT * FROM $this->table WHERE os_id = :os_id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':os_id', $os_id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();

		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}
	
	public function findPlus($os_id){
		try{
			$sql  = "SELECT $this->table.os_id, $this->tableB.id FROM $this->table LEFT JOIN $this->tableB ON $this->table.os_id = $this->tableB.id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':os_id', $os_id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}
	public function findUserUF( $user_id, $uf){
		try{
			$sql  = "SELECT DISTINCT $this->tableB.* FROM $this->tableB LEFT JOIN $this->table ";
			$sql  .="ON $this->table.os_id = $this->tableB.id ";
			$sql  .="WHERE ($this->tableB.uf = :uf AND $this->tableB.status < 4) OR ($this->tableB.uf != :uf AND $this->table.user_id = :user_id AND $this->tableB.status < 4)";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':uf', $uf);
			$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}
	public function findPlusII( $loja_id, $status){
		try{
			$sql  = "SELECT   $this->table.loja_id, $this->tableB.id FROM $this->table INNER JOIN $this->tableB";
			$sql  .=" ON $this->table.loja_id = $this->tableB.loja_id ";
			$sql  .=" WHERE $this->tableB.loja_id = 1 AND $this->tableB.status < 4";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':loja_id', $loja_id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}
	public function findTecStatus( $tecId, $status){
		try{
		$sql  = "SELECT * FROM $this->table WHERE tecnico_id=:tecnico_id AND status=:status";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':tecnico_id', $tecId );
		$stmt->bindParam(':status', $status );
		$stmt->execute();
		return $stmt->fetchAll();

		//$res['message'] = false;
		//$res['message'] = "OK, deslocamento fechado com sucesso";
		//return $res;
		} catch(PDOException $e) {
			//$res['error']	= true;
			$res = $e->getMessage();
			return $res;
		}
	}
	public function findTecOs( $tecId, $os_id){
		try{
		$sql  = "SELECT * FROM $this->table WHERE tecnico_id=:tecnico_id AND os_id=:os_id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':tecnico_id', $tecId );
		$stmt->bindParam(':os_id', $os_id );
		$stmt->execute();
		return $stmt->fetch();

		//$res['message'] = false;
		//$res['message'] = "OK, deslocamento fechado com sucesso";
		//return $res;
		} catch(PDOException $e) {
			//$res['error']	= true;
			$res = $e->getMessage();
			return $res;
		}
	}
	public function deleteOs($os_id){
		try{
			$sql  = "DELETE FROM $this->table WHERE os_id = :os_id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':os_id', $os_id, PDO::PARAM_INT);
			
			$stmt->execute();

			$res['error'] = false;
			$res['message'] = "OK, processo da OS alterado com sucesso"; 
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}

	public function ajuste($os_id, $status){
		try{
			$sql  = "UPDATE $this->table SET status = :status WHERE os_id = :os_id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':status',	$status);
			$stmt->bindParam(':os_id', $os_id);
			$stmt->execute();

			$res['error'] = false;
			$res['message'] = "OK, OS atualizado com sucesso";
			return $res;
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}

}
