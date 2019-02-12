<?php

require_once '_crud.php';



class Os extends Crud{
	
	protected $table = 'tb_os';
	protected $table2 = 'tb_os_tecnico';
	private $proprietario_id;
	private $loja_id;
	private $loja_nick;
	private $local_id;
	private $equipamento_id;
	private $categoria_id;
	private $servico_id;
	private $tecnicos;
	private $data;
	private $dtCadastro;
	private $filial;
	private $os;
	private $dtUltimoMan;
	private $dtOS;
	private $dtFech;
	private $dtConcluido;
	private $estado;
	private $processo;
	private $status;
	private $ativo;


	public function setProprietario($proprietario_id){
		$this->proprietario_id = $proprietario_id;
	}
	public function setLoja($loja_id){
		$this->loja_id = $loja_id;
	}
	public function setLojaNick($loja_nick){
		$this->loja_nick = $loja_nick;
	}
	public function setLocal($local_id){
		$this->local_id = $local_id;
	}
	public function setUf($uf){
		$this->uf = $uf;
	}
	public function setEquipamento($equipamento_id){
		$this->equipamento_id = $equipamento_id;
	}
	public function setCategoria($categoria_id){
		$this->categoria_id = $categoria_id;
	}
	public function setServico($servico_id){
		$this->servico_id = $servico_id;
	}
	public function setData($data){
		$this->data = $data;
	}
	public function setDtUltimoMan($dtUltimoMan){
		$this->dtUltimoMan = $dtUltimoMan;
	}
	public function setDtCadastro($dtCadastro){
		$this->dtCadastro = $dtCadastro;
	}
	public function setFilial($filial){
		$this->filial = $filial;
	}
	public function setOs($os){
		$this->os = $os;
	}
	public function setDtOs($dtOs){
		$this->dtOs = $dtOs;
	}
	public function setDtFech($dtFech){
		$this->dtFech = $dtFech;
	}
	public function setDtConcluido($dtConcluido){
		$this->dtConcluido = $dtConcluido;
	}
	public function setProcesso($processo){
		$this->processo = $processo;
	}
	public function setStatus($status){
		$this->status = $status;
	}
	public function setUser($user_id){
		$this->user_id = $user_id;
	}
	public function setAtivo($ativo){
		$this->ativo = $ativo;
	}

	public function insert(){
		try{
			$sql  = "INSERT INTO $this->table ( proprietario_id, loja_id, loja_nick, local_id, uf, equipamento_id, servico_id, categoria_id, data, dtUltimoMan, dtCadastro, user_id, ativo) ";
			$sql .= "VALUES (:proprietario_id, :loja_id, :loja_nick, :local_id, :uf, :equipamento_id, :servico_id, :categoria_id, :data, :dtUltimoMan, :dtCadastro, :user_id, :ativo)";
			$stmt = DB::prepare($sql);
			
			$stmt->bindParam(':proprietario_id',	$this->proprietario_id);
			$stmt->bindParam(':loja_id',			$this->loja_id);
			$stmt->bindParam(':loja_nick',			$this->loja_nick);
			$stmt->bindParam(':local_id',			$this->local_id);
			$stmt->bindParam(':uf',					$this->uf);
			$stmt->bindParam(':equipamento_id',		$this->equipamento_id);
			$stmt->bindParam(':servico_id',			$this->servico_id);
			$stmt->bindParam(':categoria_id',		$this->categoria_id);
			$stmt->bindParam(':data',				$this->data);
			$stmt->bindParam(':dtUltimoMan',		$this->dtUltimoMan);
			$stmt->bindParam(':dtCadastro',			$this->dtCadastro);
			$stmt->bindParam(':user_id',			$this->user_id);
			$stmt->bindParam(':ativo',				$this->ativo);
			$stmt->execute();
			$osId = DB::getInstance()->lastInsertId();

			$res['id'] = $osId;
			$res['error'] = false;
			$res['message'] = "OK, OS aberta com sucesso";
			return $res;
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}

	}

	public function update($id){
		try{
			$sql  = "UPDATE $this->table SET loja_id = :loja_id, loja_nick = :loja_nick, local_id = :local_id, uf = :uf, equipamento_id = :equipamento_id, servico_id = :servico_id, categoria_id = :categoria_id, data = :data, ativo = :ativo WHERE id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':loja_id',		$this->loja_id);
			$stmt->bindParam(':loja_nick',		$this->loja_nick);
			$stmt->bindParam(':local_id',		$this->local_id);
			$stmt->bindParam(':uf',				$this->uf);
			$stmt->bindParam(':equipamento_id',	$this->equipamento_id);
			$stmt->bindParam(':servico_id',		$this->servico_id);
			$stmt->bindParam(':categoria_id',	$this->categoria_id);
			$stmt->bindParam(':data',			$this->data);
			$stmt->bindParam(':ativo',			$this->ativo);
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
	
	public function ultimaOs( $local_id, $categoria_id ){
		try{
			$sql  = "SELECT id, local_id, categoria_id, MAX(data) AS dtUltimo FROM $this->table  WHERE BINARY local_id=:local_id AND categoria_id=:categoria_id GROUP BY local_id=:local_id, categoria_id=:categoria_id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':local_id', $local_id, PDO::PARAM_INT);
			$stmt->bindParam(':categoria_id', $categoria_id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}

	public function visitadoLocal( $local_id ){
		try{
			$sql  = "SELECT MAX(data) AS dtVisitado FROM $this->table  WHERE BINARY local_id=:local_id GROUP BY local_id=:local_id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':local_id', $local_id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}

	public function validarOs( $local_id, $categoria_id, $equipamento_id, $data, $id ){
		try{
			$sql  = "SELECT * FROM $this->table  WHERE BINARY local_id = :local_id AND categoria_id = :categoria_id AND  ((equipamento_id = :equipamento_id OR equipamento_id IS NULL) != ( equipamento_id IS NOT NULL)) AND data = :data AND id  <> :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':local_id', 		$local_id);			
			$stmt->bindParam(':equipamento_id',	$equipamento_id);
			$stmt->bindParam(':categoria_id',	$categoria_id);
			$stmt->bindParam(':data',			$data);
			$stmt->bindParam(':id',				$id);
			$stmt->execute();
			return $stmt->fetch();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}
	public function osLoja( $loja_id ){
		try{
			$sql  = "SELECT * FROM $this->table  WHERE loja_id = :loja_id ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':loja_id', $loja_id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}
	public function contOsStatusUF( $uf, $status ){
		try {
			$sql  = "SELECT COUNT(*) FROM $this->table WHERE uf  = :uf AND status = :status";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':uf', $uf);
			$stmt->bindParam(':status', $status);
			$stmt->execute();
			return $stmt->fetchColumn();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}

	public function contOsStatusProprietario( $proprietario_id, $status ){
		try {
			$sql  = "SELECT COUNT(*) FROM $this->table WHERE proprietario_id  = :proprietario_id AND status = :status";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':proprietario_id', $proprietario_id);
			$stmt->bindParam(':status', $status);
			$stmt->execute();
			return $stmt->fetchColumn();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}

	public function contOsStatusLoja( $loja_id, $status ){
		try {
			$sql  = "SELECT COUNT(*) FROM $this->table WHERE loja_id  = :loja_id AND status = :status";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':loja_id', $loja_id);
			$stmt->bindParam(':status', $status);
			$stmt->execute();
			return $stmt->fetchColumn();
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

	public function findIIILoja( $loja_id ){
		try{
			$sql  = "SELECT * FROM $this->table WHERE loja_id  = :loja_id AND status < '4' ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':loja_id', $loja_id);
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

	public function contOsStatusUFLoja( $loja_id, $uf, $status ){
		try{
			$sql  = "SELECT COUNT(*) FROM $this->table ";
			$sql  .="WHERE uf = :uf  AND loja_id = :loja_id AND status = :status ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':uf', $uf);
			$stmt->bindParam(':loja_id', $loja_id);
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
