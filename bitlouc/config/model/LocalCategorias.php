<?php
require_once '_crud.php';

try {
class LocalCategorias extends Crud{

	protected $table = 'tb_local_categoria';
	private $local_id;
	private $categoria_id;
	private $ativo;

	public function setLocal($local_id){
		$this->local_id = $local_id;
	}
	public function setCategoria($categoria_id){
		$this->categoria_id = $categoria_id;
	}
	public function setAtivo($ativo){
		$this->ativo = $ativo;
	}

	public function insert(){
		try{
			$sql  = "INSERT INTO $this->table ( local_id, categoria_id ) ";
			$sql .= "VALUES ( :local_id, :categoria_id )";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':local_id', $this->local_id );
			$stmt->bindParam(':categoria_id', $this->categoria_id );	
			$stmt->execute();
		
			$res['error'] = false;
			$res['message'] = "OK, inserido com sucesso";
			return $res;
		} catch(PDOExecption $e){
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
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
			$res['message'] = "OK, salvo com sucesso";
			return $res;
		} catch(PDOExecption $e){
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
		
	}
	public function deleteLocal($local_id){
		try{
			$sql  = "DELETE FROM $this->table WHERE local_id = :local_id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':local_id', $local_id, PDO::PARAM_INT);
			$stmt->execute();
		
			$res['error'] = false;
			$res['message'] = "OK, deletado com sucesso";
			return $res;
		} catch(PDOExecption $e){
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}

}
}catch( Exception $e ) {
    $res['error'] = true; 
	$res['message'] = $e->getMessage();
	return $res;
}