<?php

$dns = "mysql:host=mysql.hostinger.com.br;dbname=u634432767_tec";
$user = "u634432767_tec";
$pass = "lYhdZ58UEU";
/*
$dns = "mysql:host=localhost;dbname=test";
$user = "root";
$pass = "";
*/
//$_GET, $_POST e $_COOKIE.

if(isset($_GET['cmd'])){
    $data = $_GET['cmd'];

    echo $data;
    //var_dump ($data);
    $objData = $data;

    try {
        $con = new PDO($dns, $user, $pass);

        if(!$con){ echo "Não foi possivel conectar com Banco de Dados!"; };
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

if(isset($_POST['cmd'])){
    $data = $_POST['cmd'];

    echo $data;
    var_dump ($data);
    $objData = $data;

    try {
        $con = new PDO($dns, $user, $pass);

        if(!$con){ echo "Não foi possivel conectar com Banco de Dados!"; };
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

if(isset($_COOKIE['cmd'])){
    $data = $_POST['cmd'];

    echo $data;
    var_dump ($data);
    $objData = $data;

    try {
        $con = new PDO($dns, $user, $pass);

        if(!$con){ echo "Não foi possivel conectar com Banco de Dados!";         };
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

if(isset($_REQUEST['cmd'])){
    $data = $_POST['cmd'];

    echo $data;
    var_dump ($data);
    $objData = $data;



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
