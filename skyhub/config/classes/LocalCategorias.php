<?php
require_once '_crud.php';

try {
class LocalCategorias extends Crud{

	protected $table = 'tb_local_categoria';
	private $local;
	private $categoria;
	private $ativo;

	public function setLocal($local){
		$this->local = $local;
	}
	public function setCategoria($categoria){
		$this->categoria = $categoria;
	}
	public function setAtivo($ativo){
		$this->ativo = $ativo;
	}

	public function insert(){
		try{
			$sql  = "INSERT INTO $this->table ( local, categoria ) ";
			$sql .= "VALUES ( :local, :categoria )";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':local', $this->local );
			$stmt->bindParam(':categoria', $this->categoria );
				
			$stmt->execute();

			$res['error'] = false;
			$res['message'] = "OK, processo da OS alterado com sucesso";
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}

	}

	public function update($id){
		try{
		$sql  = "UPDATE $this->table SET ativo = :ativo WHERE id = :id ";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':ativo',$this->ativo);
		$stmt->bindParam(':id', $id);
		$stmt->execute();

			$res['error'] = false;
			$res['message'] = "OK, processo da OS alterado com sucesso";
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
		
	}
	public function deleteLocal($local){
		try{
		$sql  = "DELETE FROM $this->table WHERE local = :local";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':local', $local, PDO::PARAM_INT);
		
		$stmt->execute();

			$res['error'] = false;
			$res['message'] = "OK, processo da OS alterado com sucesso"; 
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}

}
}catch( Exception $e ) {
    echo $e->getMessage();
    return false;
}