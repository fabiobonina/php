<?php
require_once '_crud.php';

try {
class Equipamentos extends Crud{
	
	protected $table = 'tb_bem';
	protected $table2 = 'tb_bem_localizacao';
	private $produto;
	private $produtoTag;
	private $name;
	private $modelo;
	private $numeracao;
	private $fabricante;
	private $fabricanteNick;
	private $proprietario;
	private $proprietarioNick;
	private $proprietarioLoja;
	private $categoria;
	private $plaqueta;
	private $dataFab;
	private $dataCompra;
	private $loja;
	private $local;
	private $ativo;

	public function setProduto($produto){
		$this->produto = $produto;
	}
	public function setTag($tag){
		$this->tag = $tag;
	}
	public function setName($name){
		$this->name = $name;
	}
	public function setModelo($modelo){
		$this->modelo = $modelo;
	}
	public function setNumeracao($numeracao){
		$this->numeracao = $numeracao;
	}
	public function setFabricante($fabricante){
		$this->fabricante = $fabricante;
	}
	public function setFabricanteNick($fabricanteNick){
		$this->fabricanteNick = $fabricanteNick;
	}
	public function setProprietario($proprietario){
		$this->proprietario = $proprietario;
	}
	public function setProprietarioNick($proprietarioNick){
		$this->proprietarioNick = $proprietarioNick;
	}
	public function setProprietarioLocal($proprietarioLocal){
		$this->proprietarioLocal = $proprietarioLocal;
	}
	public function setCategoria($categoria){
		$this->categoria = $categoria;
	}
	public function setPlaqueta($plaqueta){
		$this->plaqueta = $plaqueta;
	}
	public function setDataFabricacao($dataFrabricacao){
		$this->dataFrabricacao = $dataFrabricacao;
	}
	public function setDataCompra($dataCompra){
		$this->dataCompra = $dataCompra;
	}
	public function setLoja($loja){
		$this->loja = $loja;
	}
	public function setLocal($local){
		$this->local = $local;
	}	
	public function setAtivo($ativo){
		$this->ativo = $ativo;
	}

	public function insert(){
		try{
			$sql  = "INSERT INTO $this->table (produto, tag, name, modelo, numeracao, fabricante, fabricanteNick, proprietario, proprietarioNick, proprietarioLocal, categoria, plaqueta, dataFrabricacao, dataCompra, loja, local) ";
			$sql .= "VALUES (:produto, :tag, :name, :modelo, :numeracao, :fabricante, :fabricanteNick, :proprietario, :proprietarioNick, :proprietarioLocal, :categoria, :plaqueta, :dataFrabricacao, :dataCompra, :loja, :local)";
			$stmt = DB::prepare($sql);
			try{
				$stmt->bindParam(':produto',$this->produto);
				$stmt->bindParam(':tag',$this->tag);
				$stmt->bindParam(':name',$this->name);
				$stmt->bindParam(':modelo',$this->modelo);
				$stmt->bindParam(':numeracao',$this->numeracao);
				$stmt->bindParam(':fabricante',$this->fabricante);
				$stmt->bindParam(':fabricanteNick',$this->fabricanteNick);
				$stmt->bindParam(':proprietario',$this->proprietario);
				$stmt->bindParam(':proprietarioNick',$this->proprietarioNick);
				$stmt->bindParam(':proprietarioLocal',$this->proprietarioLocal);
				$stmt->bindParam(':categoria',$this->categoria);
				$stmt->bindParam(':plaqueta',$this->plaqueta);
				$stmt->bindParam(':dataFrabricacao',$this->dataFrabricacao);
				$stmt->bindParam(':dataCompra',$this->dataCompra);
				$stmt->bindParam(':loja',$this->loja);
				$stmt->bindParam(':local',$this->local);
				$stmt->execute();
				
				$bemId = DB::getInstance()->lastInsertId();

				$res['id'] = $osId;
				$res['error'] = false;
				$res['message'] = "OK, inserido com sucesso";
				$status = '0';
				try{
					$sql  = "INSERT INTO $this->table2 (bem, loja, local, dataInicial, status)";
					$sql .= "VALUES (:bem, :loja, :local, :dataInicial, :status)";
					$stmt = DB::prepare($sql);
					$stmt->bindParam(':bem',$bemId);
					$stmt->bindParam(':loja',$this->loja);
					$stmt->bindParam(':local',$this->local);
					$stmt->bindParam(':dataInicial',$this->dataCompra);
					$stmt->bindParam(':status',$status);
					return $stmt->execute();
				} catch(PDOExecption $e){
					echo "Error!: " . $e->getMessage() . "</br>";
				}
			} catch(PDOExecption $e){
				echo "Error!: " . $e->getMessage() . "</br>";
			}
		} catch(PDOException $e) {
			echo "Error!: " . $e->getMessage() . "</br>";
		}
	}

	public function update($id){
		try{
			$sql  = "UPDATE $this->table SET cliente = :cliente, localidade = :localidade, plaqueta = :plaqueta, data = :data WHERE id = :id ";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':cliente',$this->cliente);
			$stmt->bindParam(':localidade', $this->localidade);
			$stmt->bindParam(':plaqueta',$this->plaqueta);
			$stmt->bindParam(':data',$this->data);
			$stmt->bindParam(':id', $id);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
		
	}

	public function findAtiv($Cod){
		try{
		$sql  = "SELECT * FROM $this->table WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id', $Cod, PDO::PARAM_INT);
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