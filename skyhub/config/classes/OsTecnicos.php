<?php

require_once '_crud.php';

class OsTecnicos extends Crud{
	
	protected $table = 'tb_os_tecnico';
	protected $tableB = 'tb_os';
	private $os;
	private $loja;
	private $tecnico;
	private $user;
	private $hh;

	public function setOs($os){
		$this->os = $os;
	}
	public function setLoja($loja){
		$this->loja = $loja;
	}
	public function setTecnico($tecnico){
		$this->tecnico = $tecnico;
	}
	public function setUser($user){
		$this->user = $user;
	}
	public function setUserNick($userNick){
		$this->userNick = $userNick;
	}
	public function setHh($hh){
		$this->hh = $hh;
	}
	
	public function insert(){
		try{
			$sql  = "INSERT INTO $this->table ( os, loja, tecnico, user, userNick, hh ) ";
			$sql .= "VALUES ( :os, :loja, :tecnico, :user, :userNick, :hh )";
			$stmt = DB::prepare($sql);

			$stmt->bindParam(':os',			$this->os);
			$stmt->bindParam(':loja',		$this->loja);
			$stmt->bindParam(':tecnico',	$this->tecnico);
			$stmt->bindParam(':user',		$this->user);
			$stmt->bindParam(':userNick',	$this->userNick);
			$stmt->bindParam(':hh',			$this->hh);
			$stmt->execute();
			$res['error'] = false;
			$res['message'] = "OK, dados inserio com sucesso";
			return $res;
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}
	public function update($id){
		try{
			$sql  = "UPDATE $this->table SET os = :os, loja = :loja,  tecnico = :tecnico, hh = :hh WHERE id = :id";
			$stmt = DB::prepare($sql);

			$stmt->bindParam(':os',$this->os);
			$stmt->bindParam(':loja',$this->loja);
			$stmt->bindParam(':tecnico',$this->tecnico);
			$stmt->bindParam(':hh',$this->hh);
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
	public function findOs($os){
		try{
			$sql  = "SELECT * FROM $this->table WHERE os = :os";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':os', $os, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();

		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}
	
	public function findPlus($os){
		try{
			$sql  = "SELECT $this->table.*, $this->tableB.* FROM $this->table LEFT JOIN $this->tableB ON $this->table.os = $this->tableB.id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':os', $os, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}
	public function findTecStatus( $tecId, $status){
		try{
		$sql  = "SELECT * FROM $this->table WHERE tecnico=:tecnico AND status=:status";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':tecnico', $tecId );
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
	public function findTecOs( $tecId, $os){
		try{
		$sql  = "SELECT * FROM $this->table WHERE tecnico=:tecnico AND os=:os";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':tecnico', $tecId );
		$stmt->bindParam(':os', $os );
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
	public function deleteOs($os){
		try{
		$sql  = "DELETE FROM $this->table WHERE os = :os";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':os', $os, PDO::PARAM_INT);
		
		return $stmt->execute(); 
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}

}
