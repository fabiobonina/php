<?php
require_once '_crud.php';

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

		$stmt->execute();

			$res['error'] = false;
			$res['message'] = "OK, processo da OS alterado com sucesso"; 

	}

	public function update($id){

		$sql  = "UPDATE $this->table SET bem = :bem ";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':bem', $this->bem);
		$stmt->bindParam(':id', $id);
		$stmt->execute();

			$res['error'] = false;
			$res['message'] = "OK, processo da OS alterado com sucesso";
		
	}

}
