<?php
require_once '_crud.php';

try {
class Mod extends Crud{
	

	
	protected 	$table = 'tb_mod';
	private 	$os;
	private 	$tecnico;
	private 	$dtInicio;

	public function setOs($os){
		$this->os = $os;
	}
	public function setTecnico($tecnico){
		$this->tecnico = $tecnico;
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
	public function setKmInicio($kmInicio){
		$this->kmInicio = $kmInicio;
	}
	public function setKmFinal($kmFinal){
		$this->kmFinal = $kmFinal;
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
		$sql  = "INSERT INTO $this->table (os, tecnico, dtInicio, dtFinal, tempo, kmInicio, kmFinal, valor, trajeto, status) ";
		$sql .= "VALUES (:os, :tecnico, :dtInicio, :dtFinal, :tempo, :kmInicio, :kmFinal, :valor, :trajeto, :status)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':os',$this->os);
		$stmt->bindParam(':tecnico',$this->tecnico);
		$stmt->bindParam(':dtInicio',$this->dtInicio);
		$stmt->bindParam(':data',$this->data);

		return $stmt->execute();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}

	}
	public function insertInicio(){
		try{
			$sql  = "INSERT INTO $this->table ( os, tecnico, dtInicio, kmInicio, valor, trajeto, status) ";
			$sql .= "VALUES ( :os, :tecnico, :dtInicio, :kmInicio, :valor, :trajeto, :status)";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':os', 	 	$this->os);
			$stmt->bindParam(':tecnico', 	$this->tecnico);
			$stmt->bindParam(':dtInicio',  	 $this->dtInicio);
			$stmt->bindParam(':kmInicio', 	 $this->kmInicio);
			$stmt->bindParam(':valor',    	 $this->valor);
			$stmt->bindParam(':trajeto', 	$this->trajeto);
			$stmt->bindParam(':status', 	 $this->status);
			$stmt->execute();
			
			$res['error'] = false;
			$res['message'] = "OK, deslocamento aberto com sucesso";
			return $res;
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}

	}
	public function insertFinal($id){
		try{
			$sql  = "UPDATE $this->table SET  dtFinal = :dtFinal, kmFinal = :kmFinal, tempo = :tempo, hhValor = :hhValor, valor = :valor, trajeto = :trajeto, ativo = :ativo WHERE id = :id ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':dtFinal',  	$this->dtFinal);
			$stmt->bindParam(':kmFinal', 	$this->kmFinal);
			$stmt->bindParam(':tempo',    	$this->tempo);
			$stmt->bindParam(':hhValor',    $this->hhValor);
			$stmt->bindParam(':valor',    	$this->valor);
			$stmt->bindParam(':trajeto',	$this->trajeto);
			$stmt->bindParam(':ativo', 	 	$this->ativo);
			$stmt->bindParam(':id', 		$id);
			$stmt->execute();

			$res['error'] = false;
			$res['message'] = "OK, deslocamento fechado com sucesso";
			return $res;
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}

	}

	public function update($id){
		try{
			$sql  = "UPDATE $this->table SET dtInicio = :dtInicio, dtFinal = :dtFinal, kmInicio = :kmInicio, kmFinal = :kmFinal, tempo = :tempo, hhValor = :hhValor, valor = :valor, trajeto = :trajeto, status = :status, ativo = :ativo WHERE id = :id ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':dtInicio',  	$this->dtInicio);
			$stmt->bindParam(':dtFinal',  	$this->dtFinal);
			$stmt->bindParam(':kmInicio', 	$this->kmInicio);
			$stmt->bindParam(':kmFinal', 	$this->kmFinal);
			$stmt->bindParam(':tempo',    	$this->tempo);
			$stmt->bindParam(':hhValor',    $this->hhValor);
			$stmt->bindParam(':valor',    	$this->valor);
			$stmt->bindParam(':trajeto',	$this->trajeto);
			$stmt->bindParam(':ativo', 	 	$this->ativo);
			$stmt->bindParam(':status', 	$this->status);
			$stmt->bindParam(':id', 		$id);
			$stmt->execute();

			$res['error'] = false;
			$res['message'] = "OK, atividade alterado com sucesso";
			return $res;
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
		
	}

	public function findOsTec($osId, $tecId){
		try{
		$sql  = "SELECT * FROM $this->table WHERE os = :os AND tecnico = :tecnico";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':os', $osId, PDO::PARAM_INT);
		$stmt->bindParam(':tecnico', $tecId, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}

	public function findOsTecAtiv($osId, $tecId, $ativo){
		try{
		$sql  = "SELECT * FROM $this->table WHERE  os=:os AND tecnico=:tecnico AND ativo = :ativo";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':os', $osId );
		$stmt->bindParam(':tecnico', $tecId );
		$stmt->bindParam(':ativo', $ativo );
		$stmt->execute();
		return $stmt->fetchAll();

		//$res['message'] = false;
		//$res['message'] = "OK, deslocamento fechado com sucesso";
		//return $res;
		} catch(PDOException $e) {
			//$res['error']	= true;
			$res = $e->getMessage();
			return $res;
		}
	}


	


}
}catch( Exception $e ) {

    echo $e->getMessage();
    return false;

}