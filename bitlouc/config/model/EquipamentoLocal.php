<?php
require_once '_crud.php';

try {
	class EquipamentoLocal extends Crud{
		protected $table = 'tb_eq_localizacao';
		private $equipamento;
		private $loja;
		private $local;
		private $dataInicial;
		private $dataFinal;
		private $status;

		public function setEquipamento($equipamento){
			$this->equipamento = $equipamento;
		}
		public function setLoja($loja){
			$this->loja = $loja;
		}
		public function setLocal($local){
			$this->local = $local;
		}
		public function setDataInicial($dataInicial){
			$this->dataInicial = $dataInicial;
		}
		public function setDataFinal($dataFinal){
			$this->dataFinal = $dataFinal;
		}
		public function setStatus($status){
			$this->status = $status;
		}

		public function insert(){
			try{
				$sql  = "INSERT INTO $this->table (equipamento, loja, local, dataInicial, status)";
				$sql .= "VALUES (:equipamento, :loja, :local, :dataInicial, :status)";
				$stmt = DB::prepare($sql);
				$stmt->bindParam(':equipamento',	$this->equipamento);
				$stmt->bindParam(':loja',			$this->loja);
				$stmt->bindParam(':local',			$this->local);
				$stmt->bindParam(':dataInicial',	$this->dataInicial);
				$stmt->bindParam(':status',			$this->status);
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

		public function update($id){
			try{
			$sql  = "UPDATE $this->table SET equipamento = :equipamento, loja = :loja, local = :local, dataFinal = :dataFinal, status = :status WHERE id = :id ";
			$stmt = DB::prepare($sql);
			
			$stmt->bindParam(':equipamento',$this->equipamento);
			$stmt->bindParam(':loja',$this->loja);
			$stmt->bindParam(':local',$this->local);
			$stmt->bindParam(':dataFinal',$this->dataFinal);
			$stmt->bindParam(':status',$status);
			$stmt->bindParam(':id', $id);
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
		
	}
}catch( Exception $e ) {
    $res['error']	= true;
	$res['message'] = $e->getMessage();
	return $res;
}