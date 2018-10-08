<?php
require_once '_crud.php';

try {
	class Mod extends Crud{
		
		protected 	$table = 'tb_mod';
		private 	$os_id;
		private 	$tecnico_id;
		private 	$dtInicio;

		public function setOs($os_id){
			$this->os = $os_id;
		}
		public function setTecnico($tecnico_id){
			$this->tecnico = $tecnico_id;
		}
		public function setDtInicio($dtInicio){
			$this->dtInicio = $dtInicio;
		}
		public function setDtFinal($dtFinal){
			$this->dtFinal = $dtFinal;
		}
		public function setTempo($tempo){
			$this->tempo = $tempo;
		}
		public function setdtServInicio($dtServInicio){
			$this->dtServInicio = $dtServInicio;
		}
		public function setdtServFinal($dtServFinal){
			$this->dtServFinal = $dtServFinal;
		}
		public function setHhValor($hhValor){
			$this->hhValor = $hhValor;
		}
		public function setValor($valor){
			$this->valor = $valor;
		}
		public function setTrajeto($trajeto){
			$this->trajeto = $trajeto;
		}
		public function setStatus($status){
			$this->status = $status;
		}
		public function setTipo($tipo){
			$this->tipo = $tipo;
		}
		public function setAtivo($ativo){
			$this->ativo = $ativo;
		}

		public function insert(){
			try{
				$sql  = "INSERT INTO $this->table (os_id, tecnico_id, dtInicio, dtFinal, tempo, dtServInicio, dtServFinal, hhValor, valor, trajeto, status, ativo)";
				$sql .= 				"VALUES (:os_id, :tecnico_id, :dtInicio, :dtFinal, :tempo, :dtServInicio, :dtServFinal, :hhValor, :valor, :trajeto, :status, :ativo)";
				$stmt = DB::prepare($sql);
				$stmt->bindParam(':os_id',			$this->os_id);
				$stmt->bindParam(':tecnico_id',		$this->tecnico_id);
				$stmt->bindParam(':dtInicio',  		$this->dtInicio);
				$stmt->bindParam(':dtFinal',  		$this->dtFinal);
				$stmt->bindParam(':dtServInicio', 	$this->dtServInicio);
				$stmt->bindParam(':dtServFinal', 	$this->dtServFinal);
				$stmt->bindParam(':tempo',    		$this->tempo);
				$stmt->bindParam(':hhValor',    	$this->hhValor);
				$stmt->bindParam(':valor',    		$this->valor);
				$stmt->bindParam(':trajeto',		$this->trajeto);
				$stmt->bindParam(':status', 		$this->status);
				$stmt->bindParam(':ativo', 	 		$this->ativo);
				$stmt->execute();

				$res['success'] = true;
				$res['message'] = "OK, atividade salva!";
				return $res;
			} catch(PDOException $e) {
				$res['success']	= false;
				$res['message'] = $e->getMessage();
				return $res;
			}

		}
		public function insertInicio(){
			try{
				$sql  = "INSERT INTO $this->table ( os_id, tecnico_id, dtInicio, dtServInicio, status)";
				$sql .= "VALUES ( :os_id, :tecnico_id, :dtInicio, :dtServInicio, :status)";
				$stmt = DB::prepare($sql);
				$stmt->bindParam(':os_id',			$this->os_id);
				$stmt->bindParam(':tecnico_id',		$this->tecnico_id);
				$stmt->bindParam(':dtInicio',  		$this->dtInicio);
				$stmt->bindParam(':dtServInicio', 	$this->dtServInicio);
				$stmt->bindParam(':status', 		$this->status);
				$stmt->execute();
				
				$res['success'] = true;
				$res['message'] = "OK, atividade salva";
				return $res;
			} catch(PDOException $e) {
				$res['success']	= false;
				$res['message'] = $e->getMessage();
				return $res;
			}

		}
		public function insertFinal($id){
			try{
				$sql  = "UPDATE $this->table SET  dtFinal = :dtFinal, dtServFinal = :dtServFinal, tempo = :tempo, hhValor = :hhValor, valor = :valor, trajeto = :trajeto, ativo = :ativo WHERE id = :id ";
				$stmt = DB::prepare($sql);
				$stmt->bindParam(':dtFinal',  	$this->dtFinal);
				$stmt->bindParam(':dtServFinal', 	$this->dtServFinal);
				$stmt->bindParam(':tempo',    	$this->tempo);
				$stmt->bindParam(':hhValor',    $this->hhValor);
				$stmt->bindParam(':valor',    	$this->valor);
				$stmt->bindParam(':trajeto',	$this->trajeto);
				$stmt->bindParam(':ativo', 	 	$this->ativo);
				$stmt->bindParam(':id', 		$id);
				$stmt->execute();

				$res['success'] = true;
				$res['message'] = "OK, deslocamento fechado com sucesso";
				return $res;
			} catch(PDOException $e) {
				$res['success']	= false;
				$res['message'] = $e->getMessage();
				return $res;
			}

		}
		public function update($id){
			try{
				$sql  = "UPDATE $this->table SET dtInicio = :dtInicio, dtFinal = :dtFinal, dtServInicio = :dtServInicio, dtServFinal = :dtServFinal, tempo = :tempo, hhValor = :hhValor, valor = :valor, trajeto = :trajeto, status = :status, ativo = :ativo WHERE id = :id ";
				$stmt = DB::prepare($sql);
				$stmt->bindParam(':dtInicio',  	$this->dtInicio);
				$stmt->bindParam(':dtFinal',  	$this->dtFinal);
				$stmt->bindParam(':dtServInicio', 	$this->dtServInicio);
				$stmt->bindParam(':dtServFinal', 	$this->dtServFinal);
				$stmt->bindParam(':tempo',    	$this->tempo);
				$stmt->bindParam(':hhValor',    $this->hhValor);
				$stmt->bindParam(':valor',    	$this->valor);
				$stmt->bindParam(':trajeto',	$this->trajeto);
				$stmt->bindParam(':status', 	$this->status);
				$stmt->bindParam(':ativo', 	 	$this->ativo);
				$stmt->bindParam(':id', 		$id);
				$stmt->execute();

				$res['success'] = true;
				$res['message'] = "OK, atividade alterado com sucesso";
				return $res;
			} catch(PDOException $e) {
				$res['success']	= false;
				$res['message'] = $e->getMessage();
				return $res;
			}
			
		}
		public function findOsTec($os_id, $tecnico_id){
			try{
			$sql  = "SELECT * FROM $this->table WHERE os_id = :os_id AND tecnico_id = :tecnico_id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':os_id', $os_id, PDO::PARAM_INT);
			$stmt->bindParam(':tecnico_id', $tecnico_id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();
			} catch(PDOException $e) {
				echo 'ERROR: ' . $e->getMessage();
			}
		}
		public function findOsTecAtiv($os_id, $tecnico_id, $ativo){
			try{
			$sql  = "SELECT * FROM $this->table WHERE  os=:os AND tecnico=:tecnico AND ativo = :ativo";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':os', $os_id );
			$stmt->bindParam(':tecnico', $tecnico_id );
			$stmt->bindParam(':ativo', $ativo );
			$stmt->execute();
			return $stmt->fetchAll();

			//$res['message'] = false;
			//$res['message'] = "OK, deslocamento fechado com sucesso";
			//return $res;
			} catch(PDOException $e) {
				//$res['success']	= false;
				$res = $e->getMessage();
				return $res;
			}
		}
		public function ModValido( $tecnico_id, $date ){
			
			$ativo 	= '1';
			try{
				//dtInicio >= :dtInicio AND dtFinal <=:dtFinal AND
				$sql  = "SELECT * FROM $this->table  WHERE tecnico_id=:tecnico_id AND ativo=:ativo AND dtInicio < :dtInicio AND dtFinal > :dtFinal ORDER BY dtInicio ";
				$stmt = DB::prepare($sql);
				$stmt->bindParam(':tecnico_id', 	$tecnico_id, PDO::PARAM_INT);
				$stmt->bindParam(':ativo',		$ativo, PDO::PARAM_INT);
				$stmt->bindParam(':dtInicio', 	$date);
				$stmt->bindParam(':dtFinal', 	$date);
				$stmt->execute();
				return $stmt->fetch();
			} catch(PDOException $e) {
				echo 'ERROR: ' . $e->getMessage();
			}
		}
		public function ModValidoII( $tecnico_id, $modId, $dtInicio, $dtFinal ){
			
			$ativo 	= '1';
			try{
				//dtInicio >= :dtInicio AND dtFinal <=:dtFinal AND
				$sql  = "SELECT * FROM $this->table  WHERE tecnico_id=:tecnico_id AND ativo=:ativo AND dtInicio > :dtInicio AND dtFinal < :dtFinal  AND id != :id ORDER BY dtInicio ";
				$stmt = DB::prepare($sql);
				$stmt->bindParam(':id', 		$modId);
				$stmt->bindParam(':tecnico_id', 	$tecnico_id, PDO::PARAM_INT);
				$stmt->bindParam(':ativo',		$ativo, PDO::PARAM_INT);
				$stmt->bindParam(':dtInicio', 	$dtInicio);
				$stmt->bindParam(':dtFinal', 	$dtFinal);
				$stmt->execute();
				return $stmt->fetch();
			} catch(PDOException $e) {
				echo 'ERROR: ' . $e->getMessage();
			}
		}
		public function ModValidoIII( $tecnico_id, $modId, $dtInicio, $dtFinal ){
			
			$ativo 	= '1';
			try{
				//dtInicio >= :dtInicio AND dtFinal <=:dtFinal AND
				$sql  = "SELECT * FROM $this->table  WHERE dtInicio = :dtInicio AND dtFinal = :dtFinal AND tecnico_id=:tecnico_id AND ativo=:ativo AND id != :id ORDER BY dtInicio ";
				$stmt = DB::prepare($sql);
				$stmt->bindParam(':id', 		$modId);
				$stmt->bindParam(':tecnico_id', 	$tecnico_id, PDO::PARAM_INT);
				$stmt->bindParam(':ativo',		$ativo, PDO::PARAM_INT);
				$stmt->bindParam(':dtInicio', 	$dtInicio);
				$stmt->bindParam(':dtFinal', 	$dtFinal);
				$stmt->execute();
				return $stmt->fetch();
			} catch(PDOException $e) {
				echo 'ERROR: ' . $e->getMessage();
			}
			
		}
		
	}
}catch( Exception $e ) {

	echo $e->getMessage();
	return false;

}