<?php

require_once '_crud.php';



class Os extends Crud{
	
	protected $table = 'tb_os';
	protected $table2 = 'tb_os_tecnico';
	private $loja;
	private $lojaNick;
	private $local;
	private $bem;
	private $categoria;
	private $servico;
	private $tipoServ;
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

	public function setLoja($loja){
		$this->loja = $loja;
	}
	public function setLojaNick($lojaNick){
		$this->lojaNick = $lojaNick;
	}
	public function setLocal($local){
		$this->local = $local;
	}
	public function setBem($bem){
		$this->bem = $bem;
	}
	public function setCategoria($categoria){
		$this->categoria = $categoria;
	}
	public function setServico($servico){
		$this->servico = $servico;
	}
	public function setTipoServ($tipoServ){
		$this->tipoServ = $tipoServ;
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
	public function setEstado($estado){
		$this->estado = $estado;
	}
	public function setProcesso($processo){
		$this->processo = $processo;
	}
	public function setStatus($status){
		$this->status = $status;
	}
	public function setAtivo($ativo){
		$this->ativo = $ativo;
	}

	public function insert(){
		try{
			$sql  = "INSERT INTO $this->table ( loja, lojaNick, local, servico, tipoServ, categoria, data, dtUltimoMan, dtCadastro, estado, processo, status, ativo) ";
			$sql .= "VALUES (:loja, :lojaNick, :local, :servico, :tipoServ, :categoria, :data, :dtUltimoMan, :dtCadastro, :estado, :processo, :status, :ativo)";
			$stmt = DB::prepare($sql);
			
			$stmt->bindParam(':loja',		$this->loja , PDO::PARAM_INT);
			$stmt->bindParam(':lojaNick',	$this->lojaNick);
			$stmt->bindParam(':local',		$this->local, PDO::PARAM_INT);
			$stmt->bindParam(':servico',	$this->servico);
			$stmt->bindParam(':tipoServ',	$this->tipoServ, PDO::PARAM_INT);
			$stmt->bindParam(':categoria',	$this->categoria, PDO::PARAM_INT);
			$stmt->bindParam(':data',		$this->data);
			$stmt->bindParam(':dtUltimoMan',$this->dtUltimoMan);
			$stmt->bindParam(':dtCadastro',	$this->dtCadastro);
			$stmt->bindParam(':estado',		$this->estado);
			$stmt->bindParam(':processo',	$this->processo);
			$stmt->bindParam(':status',		$this->status);
			$stmt->bindParam(':ativo',		$this->ativo);
			$stmt->execute();
			$osId = DB::getInstance()->lastInsertId();
			if($this->bem != null){
				$sql  = "UPDATE $this->table SET bem = :bem WHERE id = :id";
				$stmt = DB::prepare($sql);
				$stmt->bindParam(':bem',$this->bem);
				$stmt->bindParam(':id', $osId);
				$stmt->execute();
			}
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
			$sql  = "UPDATE $this->table SET local = :local, bem = :bem, servico = :servico, tipoServ = :tipoServ, categoria = :categoria, data = :data, dtUltimoMan = :dtUltimoMan, ativo = :ativo WHERE id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':local',		$this->local);
			$stmt->bindParam(':bem',		$this->bem);
			$stmt->bindParam(':servico',	$this->servico);
			$stmt->bindParam(':tipoServ',	$this->tipoServ);
			$stmt->bindParam(':categoria',	$this->categoria);
			$stmt->bindParam(':data',		$this->data);
			$stmt->bindParam(':dtUltimoMan',$this->dtUltimoMan);
			$stmt->bindParam(':ativo',		$this->ativo);
			$stmt->bindParam(':id', 		$id);
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

	public function upProcesso($id, $processo){
		try{
			$sql  = "UPDATE $this->table SET processo = :processo WHERE id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':processo',$processo);
			$stmt->bindParam(':id'		,$id);
			$stmt->execute();

			$res['error'] = false;
			$res['message'] = "OK, processo da OS alterado com sucesso";
			return $res;
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}
	public function amarar($id){
		try{
			$sql  = "UPDATE $this->table SET filial = :filial, os = :os, dtOs = :dtOs, status = :status WHERE id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':filial',$this->filial);
			$stmt->bindParam(':os',$this->os);
			$stmt->bindParam(':dtOs',$this->dtOs);
			$stmt->bindParam(':status',$this->status);
			$stmt->bindParam(':id', $id);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}
	public function concluir($id){
		try{
			$sql  = "UPDATE $this->table SET processo = :processo, status = :status, dtConcluido = :dtConcluido WHERE id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':processo',		$this->processo);
			$stmt->bindParam(':status',			$this->status);
			$stmt->bindParam(':dtConcluido',	$this->dtConcluido);
			$stmt->bindParam(':id',				$id);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}
	public function reabrir($id){
		try{
			$sql  = "UPDATE $this->table SET status = :status WHERE id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':status',			$this->status);
			$stmt->bindParam(':id',				$id);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}
	public function fechar($id){
		try{
			$sql  = "UPDATE $this->table SET processo = :processo,  dtFech = :dtFech, status = :status WHERE id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':processo', $this->processo);
			$stmt->bindParam(':dtFech',	$this->dtFech);
			$stmt->bindParam(':status',	$this->status);
			$stmt->bindParam(':id', 	$id);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}	
	}
	public function avalidar($id){
		try{
			$sql  = "UPDATE $this->table SET status = :status WHERE id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':status',	$this->status);
			$stmt->bindParam(':id', 	$id);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}	
	}
	public function findOs($status){
		try{
			$sql  = "SELECT * FROM $this->table WHERE BINARY status=:status ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':status', $status, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}
	public function ultimaOs( $local, $categoria ){
		try{
			$sql  = "SELECT id, local, categoria, MAX(data) AS dtUltimo FROM $this->table  WHERE BINARY local=:local AND categoria=:categoria GROUP BY local=:local, categoria=:categoria";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':local', $local, PDO::PARAM_INT);
			$stmt->bindParam(':categoria', $categoria, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}
	public function validarOs( $local, $categoria, $bem, $data ){
		try{
			$sql  = "SELECT * FROM $this->table  WHERE BINARY local = :local AND categoria = :categoria AND (bem = :bem OR bem IS NULL) AND data = :data";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':local', 		$local);			
			$stmt->bindParam(':bem',		$bem, PDO::PARAM_INT);
			$stmt->bindParam(':categoria',	$categoria);
			$stmt->bindParam(':data',		$data);
			$stmt->execute();
			return $stmt->fetch();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}
	public function osLoja( $lojaId ){
		try{
			$sql  = "SELECT * FROM $this->table  WHERE loja:loja ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':loja', $lojaId, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
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


	

}
