<?php
require_once '_crud.php';

try {
	class EquipamentoLocal extends Crud{
		protected $table = 'tb_equipamento_local';
		private $bem;
		private $loja;
		private $local;
		private $data;
		private $status;

		public function setBem($bem){
			$this->bem = $bem;
		}
		public function setLoja($loja){
			$this->loja = $loja;
		}
		public function setLocal($local){
			$this->local = $local;
		}
		public function setData($data){
			$this->data = $data;
		}
		public function setStatus($status){
			$this->status = $status;
		}

		public function insert(){
			try{
				$sql  = "INSERT INTO $this->table (bem, loja, local, data, status)";
				$sql .= "VALUES (:bem, :loja, :local, :data, :status)";
				$stmt = DB::prepare($sql);
				$stmt->bindParam(':bem',$this->bem);
				$stmt->bindParam(':loja',$this->loja);
				$stmt->bindParam(':local',$this->local);
				$stmt->bindParam(':data',$this->data);
				$stmt->bindParam(':status',$status);
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
			$sql  = "UPDATE $this->table SET bem = :bem, loja = :loja, local = :local, data = :data, status = :status WHERE id = :id ";
			$stmt = DB::prepare($sql);
			
			$stmt->bindParam(':bem',$this->bem);
			$stmt->bindParam(':loja',$this->loja);
			$stmt->bindParam(':local',$this->local);
			$stmt->bindParam(':data',$this->data);
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
	}
}catch( Exception $e ) {
    $res['error']	= true;
	$res['message'] = $e->getMessage();
	return $res;
}