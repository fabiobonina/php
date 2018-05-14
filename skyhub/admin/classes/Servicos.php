<?php
require_once 'Crud.php';

class Servicos extends Crud{
	
	protected $table = 'tb_servicos';
	private $cod;
	private $name;
	private $ativo;

	public function setCod($cod){
		$cod = iconv('UTF-8', 'ASCII//TRANSLIT', $cod);
		$this->cod = strtoupper ($cod);
	}
	public function setname($name){
		$name = iconv('UTF-8', 'ASCII//TRANSLIT', $name);
		$this->name = strtoupper ($name);
	}
	public function getname(){
		return $this->name;
	}
	public function setAtivo($ativo){
		$this->ativo = $ativo;
	}

	public function insert(){
		try{
		$sql  = "INSERT INTO $this->table (id, name, ativo) ";
		$sql .= "VALUES (:id, :name, :ativo)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id',$this->cod);
		$stmt->bindParam(':name',$this->name);
		$stmt->bindParam(':ativo',$this->ativo);

		return $stmt->execute();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}

	}

	public function update($id){
		try{
		$sql  = "UPDATE $this->table SET name = :name, ativo = :ativo WHERE id = :id ";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':name', $this->name);
		$stmt->bindParam(':ativo',$this->ativo);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
		
	}


}