<?php

$dns = "mysql:host=mysql.hostinger.com.br;dbname=u634432767_tec";
$user = "u634432767_tec";
$pass = "lYhdZ58UEU";

if(isset($_GET['cmd'])){
    $data = $_GET['cmd'];

    echo $data;
    //var_dump ($data);
    $objData = $data;
    //$objData = "teste";

    //$nickuser = $objData->username;
    //$senha_informada = $objData->password;

    //$nickuser = 'fabio.bonina';
    //$senha_informada = '123abc';

    //$nickuser = 'fabio.bonina';
    //$senha = '123abc';
    //$senha_informada = md5($senha);
    //$senha_informada = $senha;



    try {
        $con = new PDO($dns, $user, $pass);

        if(!$con){
            echo "Não foi possivel conectar com Banco de Dados!";
        };
        $sql  = "INSERT INTO tb_teste (bem) ";
        $sql .= "VALUES (:bem)";
        $query = $con->prepare($sql);
        $query->bindParam(':bem',$objData);
        return $query->execute();

        echo "OK";
    } catch (Exception $e) {
        echo "Erro: ". $e->getMessage();
    };
}

?>
