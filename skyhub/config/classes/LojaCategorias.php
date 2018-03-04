<?php
require_once '_crud.php';

try {
class LojaCategorias extends Crud{
	

	
	protected $table = 'tb_loja_categoria';
	private $loja;
	private $categoria;
	private $ativo;

	public function setLoja($loja){
		$this->loja = $loja;
	}
	public function setCategoria($categoria){
		$this->categoria = $categoria;
	}
	public function setAtivo($ativo){
		$this->ativo = $ativo;
	}

	public function insert(){
		try{
			$sql  = "INSERT INTO $this->table2 ( loja, categoria ) ";
			$sql .= "VALUES ( :loja, :categoria )";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':loja', $this->loja );
			$stmt->bindParam(':categoria', $this->categoria );
			
			return $stmt->execute();
			
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
		return $stmt->execute();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
		
	}

}
}catch( Exception $e ) {

    echo $e->getMessage();
    return false;

}