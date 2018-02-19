<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');

require_once 'config.php';

try {
	$con = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);

	if(!$con){
		echo "Não foi possivel conectar com Banco de Dados!";
	}

	$query = $con->prepare('SELECT * FROM tb_oat');

		$query->execute();

		$out = "[";

		while($result = $query->fetch()){
			if ($out != "[") {
				$out .= ",";
			}
			$out .= '{"id": "'.$result["id"].'",';
			$out .= '"nickuser": "'.$result["nickuser"].'",';
			$out .= '"cliente": "'.$result["cliente"].'",';
			$out .= '"localidade": "'.$result["localidade"].'",';
			$out .= '"servico": "'.$result["servico"].'",';
			$out .= '"sistema": "'.$result["sistema"].'",';
			$out .= '"data": "'.$result["data"].'",';
			$out .= '"filial": "'.$result["filial"].'",';
			$out .= '"os": "'.$result["os"].'",';
			$out .= '"data_sol": "'.$result["data_sol"].'",';
			$out .= '"data_os": "'.$result["data_os"].'",';
			$out .= '"data_fech": "'.$result["data_fech"].'",';
			$out .= '"data_term": "'.$result["data_term"].'",';
			$out .= '"status": "'.$result["status"].'",';
			$out .= '"ativo": "'.$result["ativo"].'"}';
		}
		$out .= "]";
		echo $out;



} catch (Exception $e) {
	echo "Erro: ". $e->getMessage();
};
