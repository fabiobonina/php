<?php
require_once '_crud.php';

class Locais extends Crud{
	
	protected $table = 'tb_locais';
	protected $table2 = 'tb_local_categoria';
	private $loja;
	private $tipo;
	private $regional;
	private $name;
	private $municipio;
	private $uf;
	private $latitude;
	private $longitude;
	private $ativo;

	public function setName($name){
		$name = iconv('UTF-8', 'ASCII//TRANSLIT', $name);
		$this->name = strtoupper ($name);
	}
	public function getName(){
		return $this->name;
	}
	public function setLoja($loja){
		$this->loja = $loja;
	}
	public function setTipo($tipo){
		$this->tipo = $tipo;
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
	public function setCategoria($categoria){
		$this->categoria = $categoria;
	}

	public function insert(){
		try{

		$sql  = "INSERT INTO $this->table (loja, tipo, regional, name, municipio, uf, latitude, longitude, ativo) ";
		$sql .= "VALUES (:loja, :tipo, :regional, :name, :municipio, :uf, :latitude, :longitude, :ativo)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':loja',$this->loja);
		$stmt->bindParam(':tipo',$this->tipo);
		$stmt->bindParam(':regional',$this->regional);
		$stmt->bindParam(':name',$this->name);
		$stmt->bindParam(':municipio',$this->municipio);
		$stmt->bindParam(':uf',$this->uf);
		$stmt->bindParam(':latitude',$this->latitude);
		$stmt->bindParam(':longitude',$this->longitude);
		$stmt->bindParam(':ativo',$this->ativo);
		
		$categorias = json_decode( $this->categoria);
		if( isset($categorias) ){
			$stmt->execute();
			$localId = DB::getInstance()->lastInsertId();
			foreach ($categorias as $value){
				$itemId = $value->id;
				$sql  = "INSERT INTO $this->table2 ( local, categoria ) ";
				$sql .= "VALUES ( :local, :categoria )";
				$stmt = DB::prepare($sql);
				$stmt->bindParam(':local', $localId );
				$stmt->bindParam(':categoria', $itemId );
				$stmt->execute();
			}
			$res['error'] = false;
			 return $res['message']= "OK, dados salvo com sucesso";
		}else{
			return $stmt->execute();
		}

	}

	public function update($id){
		try{
		$sql  = "UPDATE $this->table SET loja = :loja, tipo = :tipo, regional = :regional, name = :name, municipio = :municipio, uf = :uf, 	latitude = :latitude, longitude = :longitude, ativo = :ativo WHERE id = :id ";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':loja',$this->loja);
		$stmt->bindParam(':regional',$this->regional);
		$stmt->bindParam(':name',$this->name);
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

	public function search($loja){
		try{
		$sql = "SELECT * from $this->table WHERE BINARY loja=:loja ";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':loja',$this->loja);

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

	public function geolocalizacso($id){
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