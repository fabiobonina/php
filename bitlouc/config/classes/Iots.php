<?php
require_once 'Crud.php';

class Iots extends Crud{
	
	protected $table = 'tb_teste';
	private $bem;

	public function setBem($bem){
		$this->bem = $bem;
	}

	public function insert(){

		$sql  = "INSERT INTO $this->table (bem) ";
		$sql .= "VALUES (:bem)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':bem',$this->bem);

		return $stmt->execute(); 

	}

	public function update($id){

		$sql  = "UPDATE $this->table SET bem = :bem ";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':bem', $this->bem);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
		
	}

}
