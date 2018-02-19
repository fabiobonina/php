<?php
require_once 'Crud.php';

	
 $table = 'tb_localides';


		$sql  = "SELECT * FROM $this->table";
		$stmt = DB::prepare($sql);
		$stmt->execute();
		$dados = $stmt->fetchAll(PDO::FETCH_OBJ);

		$json = json_encode($dados);
		echo $json;


?>