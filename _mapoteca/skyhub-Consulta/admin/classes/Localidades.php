<?php
require_once 'Crud.php';

class Localidades extends Crud{
	
	protected $table = 'tb_localidades';
	private $cliente;
	private $regional;
	private $nome;
	private $municipio;
	private $uf;
	private $latitude;
	private $longitude;
	private $ativo;

	public function setNome($nome){
		$nome = iconv('UTF-8', 'ASCII//TRANSLIT', $nome);
		$this->nome = strtoupper ($nome);
	}
	public function getNome(){
		return $this->nome;
	}
	public function setCliente($cliente){
		$this->cliente = $cliente;
	}
	public function setRegional($regional){
		$regional = iconv('UTF-8', 'ASCII//TRANSLIT', $regional);
		$this->regional = strtoupper ($regional);
	}
	public function setMunicipio($municipio){
		$municipio = iconv('UTF-8', 'ASCII//TRANSLIT', $municipio);
		$this->municipio = strtoupper ($municipio);
	}
	public function setUf($uf){
		$uf = iconv('UTF-8', 'ASCII//TRANSLIT', $uf);
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

	public function insert(){
		try{

		$sql  = "INSERT INTO $this->table (cliente, regional, nome, municipio, uf, latitude, longitude, ativo) ";
		$sql .= "VALUES (:cliente, :regional, :nome, :municipio, :uf, :latitude, :longitude, :ativo)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':cliente',$this->cliente);
		$stmt->bindParam(':regional',$this->regional);
		$stmt->bindParam(':nome',$this->nome);
		$stmt->bindParam(':municipio',$this->municipio);
		$stmt->bindParam(':uf',$this->uf);
		$stmt->bindParam(':latitude',$this->latitude);
		$stmt->bindParam(':longitude',$this->longitude);
		$stmt->bindParam(':ativo',$this->ativo);

		return $stmt->execute();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}

	}

	public function update($id){
		try{
		$sql  = "UPDATE $this->table SET cliente = :cliente, regional = :regional, nome = :nome, municipio = :municipio, uf = :uf, 	latitude = :latitude, longitude = :longitude, ativo = :ativo WHERE id = :id ";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':cliente',$this->cliente);
		$stmt->bindParam(':regional',$this->regional);
		$stmt->bindParam(':nome',$this->nome);
		$stmt->bindParam(':municipio',$this->municipio);
		$stmt->bindParam(':uf',$this->uf);
		$stmt->bindParam(':latitude',$this->latitude);
		$stmt->bindParam(':longitude',$this->longitude);
		$stmt->bindParam(':ativo',$this->ativo);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
		
	}

	public function search($cliente){
		try{
		$sql = "SELECT * from $this->table WHERE BINARY cliente=:cliente ";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':cliente',$this->cliente);

		return $stmt->execute();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
		
	}

		public function buscar(){
		$sql  = "SELECT * FROM $this->table";
		$stmt = DB::prepare($sql);
		$stmt->execute();
		echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
	}

	public function geolocal($id){
		try{
		$sql  = "UPDATE $this->table SET latitude = :latitude, longitude = :longitude WHERE id = :id ";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':latitude',$this->latitude);
		$stmt->bindParam(':longitude',$this->longitude);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
		
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
		
	}

}