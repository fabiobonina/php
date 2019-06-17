<?php

require_once '_crud.php';



class CilindroDemanda extends Crud{
	
	protected $table = 'tb_cil_prog_demanda';
	private $programacao_id;
	private $capacidade_id;
	private $qtd;


	public function setProgramacao($programacao_id){
		$this->programacao_id = $programacao_id;
	}
	public function setCapacidade($capacidade_id){
		$this->capacidade_id = $capacidade_id;
	}
	public function setQtd($qtd){
		$this->qtd = $qtd;
	}

	public function insert(){
		try{
			$sql  = "INSERT INTO $this->table ( programacao_id, capacidade_id, qtd) ";
			$sql .= "VALUES (:programacao_id, :capacidade_id, :qtd)";
			$stmt = DB::prepare($sql);
			
			$stmt->bindParam(':programacao_id',	$this->programacao_id);
			$stmt->bindParam(':capacidade_id',	$this->capacidade_id);
			$stmt->bindParam(':qtd',			$this->qtd);
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
			$sql  = "UPDATE $this->table SET programacao_id = :programacao_id, capacidade_id = :capacidade_id, qtd = :qtd WHERE id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':programacao_id',	$this->programacao_id);
			$stmt->bindParam(':capacidade_id',	$this->capacidade_id);
			$stmt->bindParam(':qtd',			$this->qtd);
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
	
	public function ultimaOs( $capacidade_id, $categoria_id ){
		try{
			$sql  = "SELECT id, capacidade_id, categoria_id, MAX(qtd) AS dtUltimo FROM $this->table  WHERE BINARY capacidade_id=:capacidade_id AND categoria_id=:categoria_id GROUP BY capacidade_id=:capacidade_id, categoria_id=:categoria_id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':capacidade_id', $capacidade_id, PDO::PARAM_INT);
			$stmt->bindParam(':categoria_id', $categoria_id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}

	public function visitadoLocal( $capacidade_id ){
		try{
			$sql  = "SELECT MAX(qtd) AS dtVisitado FROM $this->table  WHERE BINARY capacidade_id=:capacidade_id GROUP BY capacidade_id=:capacidade_id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':capacidade_id', $capacidade_id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}

	public function validarOs( $capacidade_id, $categoria_id, $equipamento_id, $qtd, $id ){
		try{
			$sql  = "SELECT * FROM $this->table  WHERE BINARY capacidade_id = :capacidade_id AND categoria_id = :categoria_id AND  ( equipamento_id = :equipamento_id OR equipamento_id IS NULL ) AND qtd = :qtd AND id  <> :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':capacidade_id', 		$capacidade_id);			
			$stmt->bindParam(':equipamento_id',	$equipamento_id);
			$stmt->bindParam(':categoria_id',	$categoria_id);
			$stmt->bindParam(':qtd',			$qtd);
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

	public function findIIIProprietario( $proprietario_id  ){
		try{
			$sql  = "SELECT * FROM $this->table WHERE proprietario_id  = :proprietario_id AND status < '4' ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':proprietario_id', $proprietario_id);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}

	public function findIIILoja( $programacao_id ){
		try{
			$sql  = "SELECT * FROM $this->table WHERE programacao_id  = :programacao_id AND status < '4' ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':programacao_id', $programacao_id);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}
	
	public function ajuste($id, $uf){
		try{
			$sql  = "UPDATE $this->table SET uf = :uf WHERE id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':uf',	$uf);
			$stmt->bindParam(':id', $id);
			$stmt->execute();

			$res['error'] = false;
			$res['message'] = "OK, OS atualizado com sucesso";
			return $res;
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}
	public function findUF( $uf ){
		try {
			$sql  = "SELECT COUNT(*) FROM $this->table WHERE uf  = :uf AND status < 4";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':uf', $uf);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}
	public function findAmarar(){
		try {
			$sql  = "SELECT * FROM $this->table WHERE os IS NULL";
			$stmt = DB::prepare($sql);
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
