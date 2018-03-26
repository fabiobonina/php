<?php
require_once '_crud.php';

try {
class Mod extends Crud{
	

	
	protected 	$table = 'tb_mod';
	private 	$os;
	private 	$tecnico;
	private 	$dtIncio;

	public function setOs($os){
		$this->os = $os;
	}
	public function setTecnico($tecnico){
		$this->tecnico = $tecnico;
	}
	public function setDtInicio($dtIncio){
		$this->dtIncio = $dtIncio;
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
	public function setValor($valor){
		$this->valor = $valor;
	}
	public function setTipoTrajeto($tipoTrajeto){
		$this->tipoTrajeto = $tipoTrajeto;
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
		$sql  = "INSERT INTO $this->table (os, tecnico, dtInicio, dtFinal, tempo, kmInicio, kmFinal, valor, tipoTrajeto, status) ";
		$sql .= "VALUES (:os, :tecnico, :dtIncio, :dtFinal, :tempo, :kmInicio, :kmFinal, :valor, :tipoTrajeto, :status)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':os',$this->os);
		$stmt->bindParam(':tecnico',$this->tecnico);
		$stmt->bindParam(':dtIncio',$this->dtIncio);
		$stmt->bindParam(':data',$this->data);

		return $stmt->execute();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}

	}
	public function insertInicio(){
		try{
		$sql  = "INSERT INTO $this->table (os, tecnico, dtInicio, kmInicio, valor, tipoTrajeto, status) ";
		$sql .= "VALUES (:os, :tecnico, :dtIncio, :kmInicio, :valor, :tipoTrajeto, :status)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':os', 	 	 $this->os);
		$stmt->bindParam(':tecnico', 	 $this->tecnico);
		$stmt->bindParam(':dtIncio',  	 $this->dtIncio);
		$stmt->bindParam(':kmInicio', 	 $this->kmInicio);
		$stmt->bindParam(':valor',    	 $this->valor);
		$stmt->bindParam(':tipoTrajeto', $this->tipoTrajeto);
		$stmt->bindParam(':status', 	 $this->status);

		return $stmt->execute();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}

	}
	public function insertFinal($id){
		try{
			$sql  = "UPDATE $this->table SET os = :os, tecnico = :tecnico, dtFinal = :dtFinal, kmFinal = :kmFinal, tempo = :tempo, valor = :valor, tipoTrajeto = :tipoTrajeto, status = :status, ativo = :ativo WHERE id = :id ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':os', 	 	$this->os);
			$stmt->bindParam(':tecnico', 	$this->tecnico);
			$stmt->bindParam(':dtFinal',  	$this->dtFinal);
			$stmt->bindParam(':kmFinal', 	$this->kmFinal);
			$stmt->bindParam(':tempo',    	$this->tempo);
			$stmt->bindParam(':valor',    	$this->valor);
			$stmt->bindParam(':tipoTrajeto',$this->tipoTrajeto);
			$stmt->bindParam(':status', 	$this->status);
			$stmt->bindParam(':ativo', 	 	$this->ativo);
			$stmt->bindParam(':id', 		$id);
			return $stmt->execute();

		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}

	}

	public function update($id){
		try{
		$sql  = "UPDATE $this->table SET os = :os, tecnico = :tecnico, dtIncio = :dtIncio, data = :data WHERE id = :id ";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':os',$this->os);
		$stmt->bindParam(':tecnico', $this->tecnico);
		$stmt->bindParam(':dtIncio',$this->dtIncio);
		$stmt->bindParam(':data',$this->data);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
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
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}


	


}
}catch( Exception $e ) {

    echo $e->getMessage();
    return false;

}