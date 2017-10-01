<?php
require_once 'Crud.php';

class Servicos extends Crud{
	
	protected $table = 'tb_servicos';
	private $cod;
	private $descricao;
	private $tipo;
	private $ativo;

	public function setCod($cod){
		$cod = iconv('UTF-8', 'ASCII//TRANSLIT', $cod);
		$this->cod = strtoupper ($cod);
	}
	public function setDescricao($descricao){
		$descricao = iconv('UTF-8', 'ASCII//TRANSLIT', $descricao);
		$this->descricao = strtoupper ($descricao);
	}
	public function getDescricao(){
		return $this->descricao;
	}
	public function setTipo($tipo){
		$this->tipo = $tipo;
	}
	public function setAtivo($ativo){
		$this->ativo = $ativo;
	}

	public function insert(){
		try{
		$sql  = "INSERT INTO $this->table (id, descricao, tipo, ativo) ";
		$sql .= "VALUES (:id, :descricao, :tipo, :ativo)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id',$this->cod);
		$stmt->bindParam(':descricao',$this->descricao);
		$stmt->bindParam(':tipo',$this->tipo);
		$stmt->bindParam(':ativo',$this->ativo);

		return $stmt->execute();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}

	}

	public function update($id){
		try{
		$sql  = "UPDATE $this->table SET descricao = :descricao, tipo = :tipo, ativo = :ativo WHERE id = :id ";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':descricao', $this->descricao);
		$stmt->bindParam(':tipo',$this->tipo);
		$stmt->bindParam(':ativo',$this->ativo);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
		
	}


}