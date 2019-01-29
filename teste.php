<?php
$senha = '981219253';
echo $password = md5($senha);

$data = '2018-01-22 21:01:00';

$email = 'fabio.bonina@gruposabara.com';
echo  $avatar = "http://www.gravatar.com/avatar/".md5($email)."?d=identicon";
//echo date("d-m-Y", $data);
// Explode a barra e retorna três arrays
//$data = explode("-", $data);
//echo date('d/m/Y', strtotime(str_replace('-','/', $data)));
// Cria três variáveis $ano $mes $dia
//echo list($dia, $mes, $ano) = $data;

//echo $DateOfRequest = date("d/m/Y H:i:s", strtotime($data));

