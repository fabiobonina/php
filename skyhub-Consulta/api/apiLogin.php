<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$dns = "mysql:host=localhost;dbname=system_tec";
$user = "root";
$pass = "";

//RECUPERAÇÃO DO FORMULÁRIO
$data = file_get_contents("php://input");
$objData = json_decode($data);

//$nickuser = $objData->username;
//$senha_informada = $objData->password;

//$nickuser = 'fabio.bonina';
//$senha_informada = '123abc';

$nickuser = 'fabio.bonina';
$senha = '123abc';
//$senha_informada = md5($senha);
//$senha_informada = $senha;

try {
	$con = new PDO($dns, $user, $pass);

	if(!$con){
		echo "Não foi possivel conectar com Banco de Dados!";
	};

      $query = $con->prepare("SELECT * FROM login WHERE user = '$nickuser' ");
      $query->execute();
      $result = $query->fetch();
      $resultado;
      if($nickuser == $result['user'] && $senha == $result['senha']){
            $resultado = ["permissao" => true, "nome"=>$result['nome'], "nickuser"=>$result['user']];
      };

      if($nickuser != $result['user'] || $senha != $result['senha']){
            $resultado = ["permissao" => false, "erro" => "Usuario ou senha incorretos. Tente outros ou cadastre-se!"];
      };

      echo json_encode($resultado);

} catch (Exception $e) {
	echo "Erro: ". $e->getMessage();
};
