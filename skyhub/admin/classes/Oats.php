<?php

require_once 'Crud.php';

class Oats extends Crud{
	
	protected $table = 'tb_oat';
	private $nickUser;
	private $cliente;
	private $localidade;
	private $servico;
	private $sistema;
	private $dataOat;
	private $filial;
	private $os;
	private $data;
	private $dataUltimoAt;
	private $dataOS;
	private $dataFech;
	private $dataTerm;
	private $status;
	private $ativo;

	public function setUser($nickUser){
		$this->nickUser = $nickUser;
	}
	public function getUser(){
		return $this->nickUser;
	}
	public function setCliente($cliente){
		$this->cliente = $cliente;
	}
	public function setLocalidade($localidade){
		$this->localidade = $localidade;
	}
	public function setServico($servico){
		$this->servico = $servico;
	}
	public function setSistema($sistema){
		$this->sistema = $sistema;
	}
	
	public function setDataOat($dataOat){
		$this->dataOat = $dataOat;
	}
	public function setFilial($filial){
		$this->filial = $filial;
	}
	public function setOs($os){
		$this->os = $os;
	}
	public function setDataUltimoAl($data){
		$this->data = $data;
	}
	public function setData($dataUltimoAt){
		$this->dataUltimoAt = $dataUltimoAt;
	}
	public function setDataOs($dataOs){
		$this->dataOs = $dataOs;
	}
	public function setDataFech($dataFech){
		$this->dataFech = $dataFech;
	}
	public function setDataTerm($dataTerm){
		$this->dataTerm = $dataTerm;
	}
	public function setStatus($status){
		$this->status = $status;
	}
	public function setAtivo($ativo){
		$this->ativo = $ativo;
	}

	public function insert(){
		try{
			$sql  = "INSERT INTO $this->table (nickuser, cliente, localidade, servico, sistema, data, dtUltimoAt, data_sol, filial, os, data_os, data_fech, data_term, status, ativo) ";
			$sql .= "VALUES (:nickuser, :cliente, :localidade, :servico, :sistema, :data, :dtUltimoAt, :data_sol, :filial, :os, :data_os, :data_fech, :data_term, :status, :ativo)";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':nickuser',$this->nickUser);
			$stmt->bindParam(':cliente',$this->cliente);
			$stmt->bindParam(':localidade',$this->localidade);
			$stmt->bindParam(':servico',$this->servico);
			$stmt->bindParam(':sistema',$this->sistema);
			$stmt->bindParam(':data',$this->data);
			$stmt->bindParam(':dtUltimoAt',$this->dataUltimoAt);
			$stmt->bindParam(':data_sol',$this->dataOat);
			$stmt->bindParam(':filial',$this->filial);
			$stmt->bindParam(':os',$this->os);
			$stmt->bindParam(':data_os',$this->dataOs);
			$stmt->bindParam(':data_fech',$this->dataFech);
			$stmt->bindParam(':data_term',$this->dataTerm);
			$stmt->bindParam(':status',$this->status);
			$stmt->bindParam(':ativo',$this->ativo);

			return $stmt->execute();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}

	}

	public function update($id){
		try{
		$sql  = "UPDATE $this->table SET nickuser = :nickuser, cliente = :cliente, localidade = :localidade, servico = :servico, sistema = :sistema, data = :data, data_sol = :data_sol, filial = :filial, os = :os, data_os = :data_os, data_fech = :data_fech, data_term = :data_term, status = :status, ativo = :ativo WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nickuser',$this->nickUser);
		$stmt->bindParam(':cliente',$this->cliente);
		$stmt->bindParam(':localidade',$this->localidade);
		$stmt->bindParam(':servico',$this->servico);
		$stmt->bindParam(':sistema',$this->sistema);
		$stmt->bindParam(':data',$this->data);
		$stmt->bindParam(':data_sol',$this->dataOat);
		$stmt->bindParam(':filial',$this->filial);
		$stmt->bindParam(':os',$this->os);
		$stmt->bindParam(':data_os',$this->dataOs);
		$stmt->bindParam(':data_fech',$this->dataFech);
		$stmt->bindParam(':data_term',$this->dataTerm);
		$stmt->bindParam(':status',$this->status);
		$stmt->bindParam(':ativo',$this->ativo);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}

	public function amarar($id){
		try{
		$sql  = "UPDATE $this->table SET filial = :filial, os = :os, data_os = :data_os, status = :status WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':filial',$this->filial);
		$stmt->bindParam(':os',$this->os);
		$stmt->bindParam(':data_os',$this->dataOs);
		$stmt->bindParam(':status',$this->status);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}

	}
	public function retorno($id){
		try{
		$sql  = "UPDATE $this->table SET data_fech = :data_fech, status = :status WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':data_fech',$this->dataFech);
		$stmt->bindParam(':status',$this->status);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}	
	}


	public function finalizar($id){
		try{
		$sql  = "UPDATE $this->table SET data_term = :data_term, status = :status WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':data_term',$this->dataTerm);
		$stmt->bindParam(':status',$this->status);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}	
	}
	public function concluidas($id){
		try{
		$sql  = "UPDATE $this->table SET status = :status WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':status',$this->status);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}	
	}
	public function findOat($status){
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

		public function ultimaOat(){
		try{
		$sql  = "SELECT localidade, servico, sistema, MAX(data) As UltimaData FROM $this->table GROUP BY localidade";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':status', $status, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}

	

}
