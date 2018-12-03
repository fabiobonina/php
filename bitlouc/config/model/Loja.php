<?php
require_once '_crud.php';

class Loja extends Crud{
	
	protected $table = 'tb_loja';

	private $name;
	private $nick;
	private $proprietario_id;
	private $grupo;
	private $seguimento;
	private $data;
	private $ativo;

	public function setName($name){
		$this->name = $name;
	}
	public function setNick($nick){
		$this->nick = $nick;
	}
	public function setProprietario($proprietario_id){
		$this->proprietario_id = $proprietario_id;
	}
	public function setGrupo($grupo){
		$this->grupo = $grupo;
	}
	public function setSeguimento($seguimento){
		$this->seguimento = $seguimento;
	}
	public function setData($data){
		$this->data = $data;
	} 
	public function setAtivo($ativo){
		$this->ativo = $ativo;
	}
	
	public function insert(){
		try{
			$sql  = "INSERT INTO $this->table (name, nick, proprietario_id, grupo, seguimento, data, ativo) ";
			$sql .= "VALUES (:name, :nick, :proprietario_id, :grupo, :seguimento, :data, :ativo)";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':name',				$this->name);
			$stmt->bindParam(':nick',				$this->nick);
			$stmt->bindParam(':proprietario_id',	$this->proprietario_id);
			$stmt->bindParam(':grupo',				$this->grupo);
			$stmt->bindParam(':seguimento',			$this->seguimento);
			$stmt->bindParam(':data',				$this->data);
			$stmt->bindParam(':ativo',				$this->ativo);
			$stmt->execute();
			
			$res['error'] = false;
			$res['message'] = 'OK, salvo com sucesso';
			return $res;
		} catch(PDOException $e) {
			$res['error'] = true; 
			$res['message'] = $e->getMessage();
			return $res;
		}

	}

	public function update($id){
		try{
			$sql  = "UPDATE $this->table SET name = :name, nick = :nick, grupo = :grupo, seguimento = :seguimento, ativo = :ativo WHERE id = :id ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':name',$this->name);
			$stmt->bindParam(':nick',$this->nick);
			$stmt->bindParam(':grupo',$this->grupo);
			$stmt->bindParam(':seguimento',$this->seguimento);
			$stmt->bindParam(':ativo',$this->ativo);
			$stmt->bindParam(':id', $id);
			$stmt->execute();

			$res['error'] = false;
			$res['message'] = 'OK, salvo com sucesso';
			return $res;
		} catch(PDOException $e) {
			$res['error'] = true; 
			$res['message'] = $e->getMessage();
			return $res;
		}
		
	}

}
