<?php

require_once '_crud.php';

class Cilindro extends Crud{
	
	protected $table = 'tb_cilindro';	
	
	private $numero;
	private $fabricante;
	private $capacidade;
	private $dt_fabric;
	private $tara_inicial;
	private $dt_validade;
	private $tara_atual;
	private $condenado;
	
	private $grupo;
	private $loja_id;
	private $loja_nick;
	private $local_id;
	private $proprietario_id;
	
	private $cod_barras;
	private $dt_cadastro;
	private $dt_revisado;
	private $status;
	private $ativo;


	public function setNumero($numero){
		$this->numero = $numero;
	}
	public function setFabricante($fabricante){
		$this->fabricante = $fabricante;
	}
	public function setCapacidade($capacidade){
		$this->capacidade = $capacidade;
	}
	public function setDtFabric($dt_fabric){
		$this->dt_fabric = $dt_fabric;
	}
	public function setTaraInicial($tara_inicial){
		$this->tara_inicial = $tara_inicial;
	}
	public function setDtValidade($dt_validade){
		$this->dt_validade = $dt_validade;
	}
	public function setTaraAtual($tara_atual){
		$this->tara_atual = $tara_atual;
	}
	public function setCondenado($condenado){
		$this->condenado = $condenado;
	}
	public function setGrupo($grupo){
		$this->grupo = $grupo;
	}
	public function setLoja($loja_id){
		$this->loja_id = $loja_id;
	}
	public function setLojaNick($loja_nick){
		$this->loja_nick = $loja_nick;
	}
	public function setLocal($local_id){
		$this->local_id = $local_id;
	}
	public function setProprietario($proprietario_id){
		$this->proprietario_id = $proprietario_id;
	}
	public function setCodBarras($cod_barras){
		$this->cod_barras = $cod_barras;
	}
	public function setDtCadastro($dt_cadastro){
		$this->dt_cadastro = $dt_cadastro;
	}
	public function setDtRevisado($dt_revisado){
		$this->dt_revisado = $dt_revisado;
	}
	public function setStatus($status){
		$this->status = $status;
	}
	public function setAtivo($ativo){
		$this->ativo = $ativo;
	}

	public function insert(){
		try{
			$sql  = "INSERT INTO $this->table ( numero, fabricante, capacidade, dt_fabric, tara_inicial, dt_validade, tara_atual, condenado, grupo, loja_id, loja_nick, local_id, proprietario_id, cod_barras, dt_cadastro, dt_revisado, ativo, status) ";
			$sql .= "VALUES (:numero, :fabricante, :capacidade, :dt_fabric, tara_inicial, :dt_validade, :tara_atual, :condenado, :grupo, :loja_id, :loja_nick, :local_id, :proprietario_id, :cod_barras, :dt_cadastro, :dt_revisado, :ativo, :status)";
			$stmt = DB::prepare($sql);
			
			$stmt->bindParam(':numero',				$this->numero);
			$stmt->bindParam(':fabrcante',			$this->fabrcante);
			$stmt->bindParam(':capacidade',			$this->capacidade);
			$stmt->bindParam(':dt_fabric',			$this->dt_fabric);
			$stmt->bindParam(':tara_inicial',		$this->tara_inicial);
			$stmt->bindParam(':dt_validade',		$this->dt_validade);
			$stmt->bindParam(':tara_atual',			$this->tara_atual);
			$stmt->bindParam(':condenado',			$this->condenado);
			$stmt->bindParam(':grupo',				$this->grupo);
			$stmt->bindParam(':proprietario_id',	$this->proprietario_id);
			$stmt->bindParam(':loja_id',			$this->loja_id);
			$stmt->bindParam(':loja_nick',			$this->loja_nick);
			$stmt->bindParam(':local_id',			$this->local_id);
			$stmt->bindParam(':cod_barros',			$this->cod_barros);
			$stmt->bindParam(':dt_cadastro',		$this->dt_cadastro);
			$stmt->bindParam(':dt_revisado',		$this->dt_revisado);
			$stmt->bindParam(':status',				$this->status);
			$stmt->bindParam(':ativo',				$this->ativo);
			$stmt->execute();
			$osId = DB::getInstance()->lastInsertId();

			$res['id'] = $osId;
			$res['error'] = false;
			$res['message'] = "OK, Dados salvo com sucesso";
			return $res;
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}

	}

	public function update($id){
		try{
			$sql  = "UPDATE $this->table SET numero = :numero, fabricante = :fabricante, capacidade = :capacidade, ";
			$sql .= " dt_fabric = :dt_fabric, tara_inicial = :tara_inicial, dt_validade = :dt_validade, tara_atual = :tara_atual, condenado = :condenado,"; 
			$sql .= " grupo = :grupo, loja_id = :loja_id, loja_nick = :loja_nick, local_id = :local_id, proprietario_id = :proprietario_id, ";
			$sql .= " cod_barras = :cod_barras, dt_cadastro = :dt_cadastro, dt_revisado = :dt_revisado, ativo = :ativo, status = :status  WHERE id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':numero',				$this->numero);
			$stmt->bindParam(':fabrcante',			$this->fabrcante);
			$stmt->bindParam(':capacidade',			$this->capacidade);
			$stmt->bindParam(':dt_fabric',			$this->dt_fabric);
			$stmt->bindParam(':tara_inicial',		$this->tara_inicial);
			$stmt->bindParam(':dt_validade',		$this->dt_validade);
			$stmt->bindParam(':tara_atual',			$this->tara_atual);
			$stmt->bindParam(':condenado',			$this->condenado);
			$stmt->bindParam(':grupo',				$this->grupo);
			$stmt->bindParam(':proprietario_id',	$this->proprietario_id);
			$stmt->bindParam(':loja_id',			$this->loja_id);
			$stmt->bindParam(':loja_nick',			$this->loja_nick);
			$stmt->bindParam(':local_id',			$this->local_id);
			$stmt->bindParam(':cod_barros',			$this->cod_barros);
			$stmt->bindParam(':dt_cadastro',		$this->dt_cadastro);
			$stmt->bindParam(':dt_revisado',		$this->dt_revisado);
			$stmt->bindParam(':status',				$this->status);
			$stmt->bindParam(':ativo',				$this->ativo);
			$stmt->bindParam(':id', 				$id);
			$stmt->execute();

			$res['error'] 	= false;
			$res['message'] = "OK, Dados atualizado com sucesso";
			return $res;
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}
	public function statusI($id){
		try{
			$sql  = "UPDATE $this->table SET status = :status WHERE id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':status', $this->status);
			$stmt->bindParam(':id', $id);
			$stmt->execute();

			$res['error'] = false;
			$res['message'] = "OK, salvo com sucesso";
			return $res;
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}
	public function concluir($id){
		try{
			$sql  = "UPDATE $this->table SET dtConcluido = :dtConcluido, status = :status WHERE id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':dtConcluido', $this->dtConcluido);
			$stmt->bindParam(':status', $this->status);
			$stmt->bindParam(':id', $id);
			$stmt->execute();

			$res['error'] = false;
			$res['message'] = "OK, salvo com sucesso";
			return $res;
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}	
	}
	public function fechar($id){
		try{
			$sql  = "UPDATE $this->table SET dtFech = :dtFech, status = :status WHERE id = :id ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':dtFech',	$this->dtFech);
			$stmt->bindParam(':status',	$this->status);
			$stmt->bindParam(':id', $id);
			$stmt->execute();

			$res['error'] = false;
			$res['message'] = "OK, salvo com sucesso";
			return $res;
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}
	
	public function ultimaOs( $local_id, $categoria_id ){
		try{
			$sql  = "SELECT id, local_id, categoria_id, MAX(data) AS dtUltimo FROM $this->table  WHERE BINARY local_id=:local_id AND categoria_id=:categoria_id GROUP BY local_id=:local_id, categoria_id=:categoria_id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':local_id', $local_id, PDO::PARAM_INT);
			$stmt->bindParam(':categoria_id', $categoria_id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}

	public function visitadoLocal( $local_id ){
		try{
			$sql  = "SELECT MAX(data) AS dtVisitado FROM $this->table  WHERE BINARY local_id=:local_id GROUP BY local_id=:local_id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':local_id', $local_id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}

	public function validar( $loja_id, $numero, $fabricante, $capaciade, $dt_fabric, $id ){
		try{
			$sql  = "SELECT * FROM $this->table  WHERE BINARY loja_id = :loja_id AND numero = :numero AND  fabricante = :fabricante AND capacidade = :capacidade AND dt_fabric = :dt_fabric AND id  <> :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':loja_id', 	$loja_id);
			$stmt->bindParam(':numero',		$numero);
			$stmt->bindParam(':fabricante',	$fabricante);
			$stmt->bindParam(':capaciade',	$capaciade);
			$stmt->bindParam(':dt_fabric',	$dt_fabric);
			$stmt->bindParam(':id',			$id);
			$stmt->execute();
			return $stmt->fetch();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}
	public function osLoja( $loja_id ){
		try{
			$sql  = "SELECT * FROM $this->table  WHERE loja_id = :loja_id ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':loja_id', $loja_id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}
	public function contOsStatusUF( $uf, $status ){
		try {
			$sql  = "SELECT COUNT(*) FROM $this->table WHERE uf  = :uf AND status = :status";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':uf', $uf);
			$stmt->bindParam(':status', $status);
			$stmt->execute();
			return $stmt->fetchColumn();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}

	public function contOsStatusProprietario( $proprietario_id, $status ){
		try {
			$sql  = "SELECT COUNT(*) FROM $this->table WHERE proprietario_id  = :proprietario_id AND status = :status";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':proprietario_id', $proprietario_id);
			$stmt->bindParam(':status', $status);
			$stmt->execute();
			return $stmt->fetchColumn();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}

	public function contOsStatusLoja( $loja_id, $status ){
		try {
			$sql  = "SELECT COUNT(*) FROM $this->table WHERE loja_id  = :loja_id AND status = :status";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':loja_id', $loja_id);
			$stmt->bindParam(':status', $status);
			$stmt->execute();
			return $stmt->fetchColumn();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}

	public function findIIIProprietario( $proprietario_id  ){
		try{
			$sql  = "SELECT * FROM $this->table WHERE proprietario_id  = :proprietario_id AND status < '4' ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':proprietario_id', $proprietario_id);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}

	public function findIIILoja( $loja_id ){
		try{
			$sql  = "SELECT * FROM $this->table WHERE loja_id  = :loja_id AND status < '4' ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':loja_id', $loja_id);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}
	
	public function ajuste($id, $uf){
		try{
			$sql  = "UPDATE $this->table SET uf = :uf WHERE id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':uf',	$uf);
			$stmt->bindParam(':id', $id);
			$stmt->execute();

			$res['error'] = false;
			$res['message'] = "OK, OS atualizado com sucesso";
			return $res;
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}
	public function findUF( $uf ){
		try {
			$sql  = "SELECT COUNT(*) FROM $this->table WHERE uf  = :uf AND status < 4";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':uf', $uf);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}
	public function findStatus($status){
		try{
			$sql  = "SELECT * FROM $this->table WHERE BINARY status=:status ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':status', $status);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch(PDOException $e) {
			$res['error']	= true;
			$res['message'] = $e->getMessage();
			return $res;
		}
	}

	public function contOsStatusUFProprietario( $proprietario_id, $uf, $status ){
		try{
			$sql  = "SELECT COUNT(*) FROM $this->table ";
			$sql  .="WHERE proprietario_id = :proprietario_id AND uf = :uf AND status = :status ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':uf', $uf);
			$stmt->bindParam(':proprietario_id', $proprietario_id);
			$stmt->bindParam(':status', $status);
			$stmt->execute();
			return $stmt->fetchColumn();
		} catch(PDOException $e) {
			$res['error'] = true; 
			$res['message'] = $e->getMessage();
			return $res;
		}
	}

	public function contOsStatusUFLoja( $loja_id, $uf, $status ){
		try{
			$sql  = "SELECT COUNT(*) FROM $this->table ";
			$sql  .="WHERE uf = :uf  AND loja_id = :loja_id AND status = :status ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':uf', $uf);
			$stmt->bindParam(':loja_id', $loja_id);
			$stmt->bindParam(':status', $status, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchColumn();
		} catch(PDOException $e) {
			$res['error'] = true; 
			$res['message'] = $e->getMessage();
			return $res;
		}
	}
	

}
