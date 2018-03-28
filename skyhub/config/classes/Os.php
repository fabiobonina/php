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
	public function setTecnicos($tecnicos){
		$this->tecnicos = $tecnicos;
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
			$sql  = "INSERT INTO $this->table ( loja, lojaNick, local, servico, tipoServ, categoria, data, dtUltimoMan, dtCadastro, filial, os, dtOs, dtFech, dtTerm, estado, processo, status, ativo) ";
			$sql .= "VALUES (:loja, :lojaNick, :local, :servico, :tipoServ, :categoria, :data, :dtUltimoMan, :dtCadastro, :filial, :os, :dtOs, :dtFech, :dtTerm, :estado, :processo, :status, :ativo)";
			$stmt = DB::prepare($sql);
			
			$stmt->bindParam(':loja',		$this->loja);
			$stmt->bindParam(':lojaNick',	$this->lojaNick);
			$stmt->bindParam(':local',		$this->local);
			$stmt->bindParam(':servico',	$this->servico);
			$stmt->bindParam(':tipoServ',	$this->tipoServ);
			$stmt->bindParam(':categoria',	$this->categoria);
			$stmt->bindParam(':data',		$this->data);
			$stmt->bindParam(':dtUltimoMan',$this->dtUltimoMan);
			$stmt->bindParam(':dtCadastro',	$this->dtCadastro);
			$stmt->bindParam(':filial',		$this->filial);
			$stmt->bindParam(':os',			$this->os);
			$stmt->bindParam(':dtOs',		$this->dtOs);
			$stmt->bindParam(':dtFech',		$this->dtFech);
			$stmt->bindParam(':dtTerm',		$this->dtTerm);
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
			
			$tecnicos = json_decode( $this->tecnicos);
			foreach ($tecnicos as $value){
				$idTec = $value->id;
				$userTec = $value->userNick;
				$hhTec = $value->hh;
				$sql  = "INSERT INTO $this->table2 ( os, loja, tecnico, user, hh ) ";
				$sql .= "VALUES ( :os, :loja, :tecnico, :user, :hh )";
				$stmt = DB::prepare($sql);
				$stmt->bindParam(':os',		$osId);
				$stmt->bindParam(':loja', 	$this->loja );
				$stmt->bindParam(':tecnico',$idTec );
				$stmt->bindParam(':user',	$userTec );
				$stmt->bindParam(':hh', 	$hhTec );
				$stmt->execute();
			}
			 $res['error'] = false;
			 return $res['message']= "OK, dados salvo com sucesso";
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}

	}

	public function update($id){
		try{
			$sql  = "UPDATE $this->table SET loja = :loja,  lojaNick = :lojaNick, local = :local, servico = :servico, tipoServ = :tipoServ, categoria = :categoria, bem = :bem, tecnicos = :tecnicos, data = :data, dtUltimaMan = :dtUltimaMan, dtCadastro = :dtCadastro, filial = :filial, os = :os, dtOs = :dtOs, dtFech = :dtFech, dtTerm = :dtTerm, estado = :estado, processo = :processo, status = :status, ativo = :ativo WHERE id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':loja',		$this->loja);
			$stmt->bindParam(':lojaNick',	$this->lojaNick);
			$stmt->bindParam(':local',		$this->local);
			$stmt->bindParam(':servico',	$this->servico);
			$stmt->bindParam(':tipoServ',	$this->tipoServ);
			$stmt->bindParam(':categoria',	$this->categoria);
			$stmt->bindParam(':data',		$this->data);
			$stmt->bindParam(':dtUltimoMan',$this->dtUltimoMan);
			$stmt->bindParam(':dtCadastro',	$this->dtCadastro);
			$stmt->bindParam(':filial',		$this->filial);
			$stmt->bindParam(':os',			$this->os);
			$stmt->bindParam(':dtOs',		$this->dtOs);
			$stmt->bindParam(':dtFech',		$this->dtFech);
			$stmt->bindParam(':dtTerm',		$this->dtTerm);
			$stmt->bindParam(':estado',		$this->estado);
			$stmt->bindParam(':processo',	$this->processo);
			$stmt->bindParam(':status',		$this->status);
			$stmt->bindParam(':ativo',		$this->ativo);
			$stmt->bindParam(':id', 		$id);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}

	public function upProcesso($id, $processo){
		try{
			$sql  = "UPDATE $this->table SET processo = :processo WHERE id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':processo',$processo);
			$stmt->bindParam(':id'		,$id);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
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
			$sql  = "UPDATE $this->table SET dtFech = :dtFech, status = :status WHERE id = :id";
			$stmt = DB::prepare($sql);
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
	public function ultimaOs(){
		try{
			$sql  = "SELECT local, servico, categoria, MAX(data) As UltimaData FROM $this->table GROUP BY local";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':status', $status, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}

	

}
