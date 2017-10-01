<?php
$dns = "mysql:host=localhost;dbname=test";
$user = "root";
$pass = "";

/*


$dns = "mysql:host=mysql.hostinger.com.br;dbname=u634432767_tec";
$user = "u634432767_tec";
$pass = "lYhdZ58UEU";
*/
//$_GET, $_POST e $_COOKIE.
//RECUPERAÇÃO DO FORMULÁRIO


    //$objData = $_POST['cmd'];//'17/05/2017 16:37:00;9;ABS CEL/ETH IO (4ED/8EA/4SD);EC_1;Entrada de Contagem 1;294.000;EC_2;121.000';

    //echo $objData;
    //var_dump ($objData);
    /*
    $array=explode(";",$objData); 
           
    $data = $array[0];
    $cod1 =$array[1];
    $equip1 =$array[2];
    $tipo1 =$array[3];
    $val1 =$array[4];
    $equip2 =$array[4];
    $tipo2 =$array[5];

    foreach ($array as $key => $value) {
            if($value <> ""){
            echo "Key: $key; Value: $value<br />\n";
            $value{strlen($value)-1};
            $value = $value;
            }
        }

							
    */


if(isset($_POST['cmd'])){
    $data = $_POST['cmd'];

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

?>
