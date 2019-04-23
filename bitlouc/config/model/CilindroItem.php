<?php

require_once '_crud.php';



class CilindroItem extends Crud{
	
	protected $table = 'tb_cil_prog_item';
	private $programacao_id;
	private $demanda_id;
	private $cilindro_id;


	public function setProgramacao($programacao_id){
		$this->programacao_id = $programacao_id;
	}
	public function setDemanda($demanda_id){
		$this->demanda_id = $demanda_id;
	}
	public function setCilindro($cilindro_id){
		$this->cilindro_id = $cilindro_id;
	}

	public function insert(){
		try{
			$sql  = "INSERT INTO $this->table ( programacao_id, demanda_id, cilindro_id) ";
			$sql .= "VALUES (:programacao_id, :demanda_id, :cilindro_id)";
			$stmt = DB::prepare($sql);
			
			$stmt->bindParam(':programacao_id',	$this->programacao_id);
			$stmt->bindParam(':demanda_id',		$this->demanda_id);
			$stmt->bindParam(':cilindro_id',	$this->cilindro_id);
			$stmt->execute();
			$item_id = DB::getInstance()->lastInsertId();

			$res['id'] = $item_id;
			$res['error'] = false;
			$res['message'] = "OK, Ação realizada com sucesso";
			return $res;
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}

	}

	public function update($id){
		try{
			$sql  = "UPDATE $this->table SET programacao_id = :programacao_id, demanda_id = :demanda_id, cilindro_id = :cilindro_id WHERE id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':programacao_id',	$this->programacao_id);
			$stmt->bindParam(':demanda_id',		$this->demanda_id);
			$stmt->bindParam(':cilindro_id',	$this->cilindro_id);
			$stmt->bindParam(':id', 			$id);
			$stmt->execute();

			$res['error'] 	= false;
			$res['message'] = "OK, OS atualizado com sucesso";
			return $res;
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}

	public function upProcesso($id, $processo){
		try{
			$sql  = "UPDATE $this->table SET processo = :processo WHERE id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':processo',$processo);
			$stmt->bindParam(':id',$id);
			$stmt->execute();

			$res['error'] = false;
			$res['message'] = "OK, salvo com sucesso";
			return $res;

		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}
	public function amarar($id){
		try{
			$sql  = "UPDATE $this->table SET filial = :filial, os = :os, dtOs = :dtOs WHERE id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':filial',$this->filial);
			$stmt->bindParam(':os',$this->os);
			$stmt->bindParam(':dtOs',$this->dtOs);
			$stmt->bindParam(':id', $id);
			$stmt->execute();

			$res['error'] = false;
			$res['message'] = "OK, salvo com sucesso";
			return $res;
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}
	public function statusI($id){
		try{
			$sql  = "UPDATE $this->table SET status = :status WHERE id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':status', $this->status);
			$stmt->bindParam(':id', $id);
			$stmt->execute();

			$res['error'] = false;
			$res['message'] = "OK, salvo com sucesso";
			return $res;
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}
	public function statusII($id){
		try{
			$sql  = "UPDATE $this->table SET status = :status WHERE id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':status', $this->status);
			$stmt->bindParam(':id', $id);
			$stmt->execute();

			$res['error'] = false;
			$res['message'] = "OK, salvo com sucesso";
			return $res;
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}
	public function concluir($id){
		try{
			$sql  = "UPDATE $this->table SET dtConcluido = :dtConcluido, status = :status WHERE id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':dtConcluido', $this->dtConcluido);
			$stmt->bindParam(':status', $this->status);
			$stmt->bindParam(':id', $id);
			$stmt->execute();

			$res['error'] = false;
			$res['message'] = "OK, salvo com sucesso";
			return $res;
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}	
	}
	public function fechar($id){
		try{
			$sql  = "UPDATE $this->table SET dtFech = :dtFech, status = :status WHERE id = :id ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':dtFech',	$this->dtFech);
			$stmt->bindParam(':status',	$this->status);
			$stmt->bindParam(':id', $id);
			$stmt->execute();

			$res['error'] = false;
			$res['message'] = "OK, salvo com sucesso";
			return $res;
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}	
	}
	
	public function ultimaOs( $demanda_id, $categoria_id ){
		try{
			$sql  = "SELECT id, demanda_id, categoria_id, MAX(cilindro_id) AS dtUltimo FROM $this->table  WHERE BINARY demanda_id=:demanda_id AND categoria_id=:categoria_id GROUP BY demanda_id=:demanda_id, categoria_id=:categoria_id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':demanda_id', $demanda_id, PDO::PARAM_INT);
			$stmt->bindParam(':categoria_id', $categoria_id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}

	public function visitadoLocal( $demanda_id ){
		try{
			$sql  = "SELECT MAX(cilindro_id) AS dtVisitado FROM $this->table  WHERE BINARY demanda_id=:demanda_id GROUP BY demanda_id=:demanda_id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':demanda_id', $demanda_id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}

	public function validarOs( $demanda_id, $categoria_id, $equipamento_id, $cilindro_id, $id ){
		try{
			$sql  = "SELECT * FROM $this->table  WHERE BINARY demanda_id = :demanda_id AND categoria_id = :categoria_id AND  ( equipamento_id = :equipamento_id OR equipamento_id IS NULL ) AND cilindro_id = :cilindro_id AND id  <> :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':demanda_id', 		$demanda_id);			
			$stmt->bindParam(':equipamento_id',	$equipamento_id);
			$stmt->bindParam(':categoria_id',	$categoria_id);
			$stmt->bindParam(':cilindro_id',			$cilindro_id);
			$stmt->bindParam(':id',				$id);
			$stmt->execute();
			return $stmt->fetch();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}
	public function findProg( $programacao_id ){
		try{
			$sql  = "SELECT * FROM $this->table  WHERE programacao_id = :programacao_id ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':programacao_id', $programacao_id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}


	
	public function findStatus($status){
		try{
			$sql  = "SELECT * FROM $this->table WHERE BINARY status=:status ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':status', $status);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}

	public function contOsStatusUFProprietario( $proprietario_id, $uf, $status ){
		try{
			$sql  = "SELECT COUNT(*) FROM $this->table ";
			$sql  .="WHERE proprietario_id = :proprietario_id AND uf = :uf AND status = :status ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':uf', $uf);
			$stmt->bindParam(':proprietario_id', $proprietario_id);
			$stmt->bindParam(':status', $status);
			$stmt->execute();
			return $stmt->fetchColumn();
		} catch(PDOException $e) {
			$res['error'] = true; 
			$res['message'] = $e->getMessage();
			return $res;
		}
	}

	public function contOsStatusUFLoja( $programacao_id, $uf, $status ){
		try{
			$sql  = "SELECT COUNT(*) FROM $this->table ";
			$sql  .="WHERE uf = :uf  AND programacao_id = :programacao_id AND status = :status ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':uf', $uf);
			$stmt->bindParam(':programacao_id', $programacao_id);
			$stmt->bindParam(':status', $status, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchColumn();
		} catch(PDOException $e) {
			$res['error'] = true; 
			$res['message'] = $e->getMessage();
			return $res;
		}
	}
	

}
