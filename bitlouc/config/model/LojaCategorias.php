<?php
require_once '_crud.php';

try {
class LojaCategorias extends Crud{
	

	
	protected $table = 'tb_loja_categoria';
	private $loja_id;
	private $categoria_id;
	private $ativo;

	public function setLoja($loja_id){
		$this->loja_id = $loja_id;
	}
	public function setCategoria($categoria_id){
		$this->categoria_id = $categoria_id;
	}
	public function setAtivo($ativo){
		$this->ativo = $ativo;
	}

	public function insert(){
		try{
			$sql  = "INSERT INTO $this->table ( loja_id, categoria_id ) ";
			$sql .= "VALUES ( :loja_id, :categoria_id )";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':loja_id', $this->loja_id );
			$stmt->bindParam(':categoria_id', $this->categoria_id );
			
			$stmt->execute();
			$res['error'] = false;
			$res['message'] = 'OK, salvo com sucesso';
			return $res;
		} catch(PDOException $e) {
			$res['error'] = true; 
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
			$res['message'] = 'OK, salvo com sucesso';
			return $res;

		} catch(PDOException $e) {
			$res['error'] = true; 
			$res['message'] = $e->getMessage();
			return $res;
		}
	}
	public function deleteLoja($loja_id){
		try{
			$sql  = "DELETE FROM $this->table WHERE loja_id = :loja_id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':loja_id', $loja_id, PDO::PARAM_INT);
			$stmt->execute();

			$res['error'] = false;
			$res['message'] = 'OK, deletado com sucesso';
			return $res;
		} catch(PDOException $e) {
			$res['error'] = true; 
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