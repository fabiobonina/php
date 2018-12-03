<?php
require_once '_crud.php';

class Local extends Crud{
	
	protected $table = 'tb_locais';
	private $loja_id;
	private $proprietario_id;
	private $tipo;
	private $regional;
	private $name;
	private $municipio;
	private $uf;
	private $latitude;
	private $longitude;
	private $ativo;

	public function setName($name){
		$this->name = strtoupper ($name);
	}
	public function setLoja($loja_id){
		$this->loja_id = $loja_id;
	}
	public function setProprietario($proprietario_id){
		$this->proprietario_id = $proprietario_id;
	}
	public function setTipo($tipo){
		$this->tipo = $tipo;
	}
	public function setRegional($regional){
		$this->regional = strtoupper ($regional);
	}
	public function setMunicipio($municipio){
		$this->municipio = strtoupper ($municipio);
	}
	public function setUf($uf){
		$this->uf = strtoupper ($uf);
	}
	public function setLat($latitude){
		$this->latitude = $latitude;
	}
	public function setLong($longitude){
		$this->longitude = $longitude;
	}
	public function setAtivo($ativo){
		$this->ativo = $ativo;
	}
	public function setCategoria($categoria){
		$this->categoria = $categoria;
	}

	public function insert(){
		try{
			$sql  = "INSERT INTO $this->table (loja_id, proprietario_id, tipo, regional, name, municipio, uf, ativo) ";
			$sql .= "VALUES (:loja_id, :proprietario_id, :tipo, :regional, :name, :municipio, :uf, :ativo)";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':loja_id',		$this->loja_id);
			$stmt->bindParam(':proprietario_id',$this->proprietario_id);
			$stmt->bindParam(':tipo',			$this->tipo);
			$stmt->bindParam(':regional',		$this->regional);
			$stmt->bindParam(':name',			$this->name);
			$stmt->bindParam(':municipio',		$this->municipio);
			$stmt->bindParam(':uf',				$this->uf);
			$stmt->bindParam(':ativo',			$this->ativo);
			
			$Id = DB::getInstance()->lastInsertId();
			$res['id'] = $Id;
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
			$sql  = "UPDATE $this->table SET loja_id = :loja_id, tipo = :tipo, regional = :regional, name = :name, municipio = :municipio, uf = :uf, ativo = :ativo WHERE id = :id ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':loja_id',		$this->loja_id);
			$stmt->bindParam(':tipo',			$this->tipo);
			$stmt->bindParam(':regional',		$this->regional);
			$stmt->bindParam(':name',			$this->name);
			$stmt->bindParam(':municipio',		$this->municipio);
			$stmt->bindParam(':uf',				$this->uf);
			$stmt->bindParam(':ativo',			$this->ativo);
			$stmt->bindParam(':id', 			$id);
			return $stmt->execute();
		} catch(PDOException $e) {
			$res['error'] = true; 
			$res['message'] = $e->getMessage();
			return $res;
		}
		
	}

	public function search($loja_id){
		try{
		$sql = "SELECT * from $this->table WHERE BINARY loja_id=:loja_id ";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':loja_id',$this->loja_id);

		return $stmt->execute();
		} catch(PDOException $e) {
			$res['error'] = true; 
			$res['message'] = $e->getMessage();
			return $res;
		}
		
	}

	public function buscar(){
		$sql  = "SELECT * FROM $this->table";
		$stmt = DB::prepare($sql);
		$stmt->execute();
		echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
	}

	public function geolocalizacao($id){
		try{
			$sql  = "UPDATE $this->table SET latitude = :latitude, longitude = :longitude WHERE id = :id ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':latitude',	$this->latitude);
			$stmt->bindParam(':longitude',	$this->longitude);
			$stmt->bindParam(':id', 		$id);
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

	public function contGeolocalizacaoProprietario( $proprietario_id ){
		try {
			$sql  = "SELECT COUNT(*) FROM $this->table WHERE proprietario_id  = :proprietario_id AND latitude != 0.000000";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':proprietario_id', $proprietario_id);
			$stmt->execute();
			return $stmt->fetchColumn();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}

	public function contGeolocalizacaoLoja( $loja_id ){
		try {
			$sql  = "SELECT COUNT(*) FROM $this->table WHERE loja_id  = :loja_id AND latitude != 0.000000";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':loja_id', $loja_id);
			$stmt->execute();
			return $stmt->fetchColumn();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}


}