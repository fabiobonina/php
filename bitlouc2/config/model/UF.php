<?php
require_once '_crud.php';

class UF extends Crud{
	
	protected $table = 'tb_uf';
	private $uf_id;
	private $name;
	private $pais;

	public function setCod($uf_id){
		$uf_id = iconv('UTF-8', 'ASCII//TRANSLIT', $uf_id);
		$this->uf_id = strtoupper ($uf_id);
	}
	public function setDescricao($name){
		$name = iconv('UTF-8', 'ASCII//TRANSLIT', $name);
		$this->name = strtoupper ($name);
	}
	public function getDescricao(){
		return $this->name;
	}
	public function setAtivo($pais){
		$this->pais = $pais;
	}

	public function insert(){
		try{
		$sql  = "INSERT INTO $this->table (id, name, pais) ";
		$sql .= "VALUES (:id, :name, :pais)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id',$this->uf_id);
		$stmt->bindParam(':name',$this->name);
		$stmt->bindParam(':pais',$this->pais);

		$stmt->execute();

			$res['error'] = false;
			$res['message'] = "OK, processo da OS alterado com sucesso";
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}

	}

	public function update($id){
		try{
		$sql  = "UPDATE $this->table SET name = :name, pais = :pais WHERE id = :id ";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':name', $this->name);
		$stmt->bindParam(':pais',$this->pais);
		$stmt->bindParam(':id', $id);
		$stmt->execute();

			$res['error'] = false;
			$res['message'] = "OK, processo da OS alterado com sucesso";
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
		
	}

	


}