<?php
require_once '_crud.php';

try {
	class EquipamentoLocal extends Crud{
		protected $table = 'tb_eq_local';
		private $equipamento_id;
		private $loja_id;
		private $local_id;
		private $dataInicial;
		private $dataFinal;
		private $status;

		public function setEquipamento($equipamento_id){
			$this->equipamento_id = $equipamento_id;
		}
		public function setLoja($loja_id){
			$this->loja_id = $loja_id;
		}
		public function setLocal($local_id){
			$this->local_id = $local_id;
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
				$sql  = "INSERT INTO $this->table (equipamento_id, loja_id, local_id, dataInicial, status)";
				$sql .= "VALUES (:equipamento_id, :loja_id, :local_id, :dataInicial, :status)";
				$stmt = DB::prepare($sql);
				$stmt->bindParam(':equipamento_id',	$this->equipamento_id);
				$stmt->bindParam(':loja_id',			$this->loja_id);
				$stmt->bindParam(':local_id',			$this->local_id);
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
			$sql  = "UPDATE $this->table SET equipamento_id = :equipamento_id, loja_id = :loja_id, local_id = :local_id, dataFinal = :dataFinal, status = :status WHERE id = :id ";
			$stmt = DB::prepare($sql);
			
			$stmt->bindParam(':equipamento_id',$this->equipamento_id);
			$stmt->bindParam(':loja_id',$this->loja_id);
			$stmt->bindParam(':local_id',$this->local_id);
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