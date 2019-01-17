<?php
$senha = '';
//echo $password = md5($senha);

$data = '2018-01-22 21:01:00';
//echo date("d-m-Y", $data);
// Explode a barra e retorna três arrays
//$data = explode("-", $data);
echo date('d/m/Y', strtotime(str_replace('-','/', $data)));
// Cria três variáveis $ano $mes $dia
//echo list($dia, $mes, $ano) = $data;

echo $DateOfRequest = date("d/m/Y H:i:s", strtotime($data));

body: "<br />↵<b>Fatal error</b>:  
Cannot redeclare __autoload() (previously declared in E:\xampp\htdocs\codephp\php\bitlouc\config\control\_global.php:3) in <b>E:\xampp\htdocs\codephp\php\bitlouc\config\control\_global.php</b> on line <b>5</b><br />↵"
body