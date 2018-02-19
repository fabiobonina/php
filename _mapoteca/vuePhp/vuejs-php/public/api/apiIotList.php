<?php
/**
 * Vue.js with PHP Api
 * @author Gökhan Kaya <0x90kh4n@gmail.com>
 */

 function multiexplode ($delimiters,$string) {
  
  $ready = str_replace($delimiters, $delimiters[0], $string);
  $launch = explode($delimiters[0], $ready);
  return  $launch;
}

// Veritabanı bağlantısı
$db = new PDO("mysql:host=localhost;dbname=system_tec;charset=utf8", "root", "");

// Yardımcı fonksiyon
function safeInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);

  return $data;
}

$json = ['status' => 'ok'];

// Post Request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $name = safeInput($_POST['name']);
  $surname = safeInput($_POST['surname']);

  if ($name && $surname) {

    $query = $db->prepare("INSERT INTO users (name, surname)
      VALUES (:name, :surname)");
    $query->execute(['name' => $name, 'surname' => $surname]);

    $json['users'] = [
      'id' => $db->lastInsertId(),
      'name' => $name,
      'surname' => $surname
    ];

  }else{
    $json['status'] = 'fail';
  }

// Get Request
} else {

  $query = $db->query("SELECT * FROM tb_teste");

  if ($query->rowCount() > 0) {

    $dados = $query->fetchAll(PDO::FETCH_OBJ);

    foreach ($dados as $dado) {
      $exploded2 = multiexplode(array(";"),$dado->bem);
      $tipo1 = "EA_1";
      $value1 = "";
      $tipo2 = "EA_2";
      $value2 = "";
      $tipo3 = "EA_3";
      $value3 = "";
      $tipo4 = "EA_4";
      $value4 = "";
      //contador de variavel, exemplo: strlen($exploded2[4]);
      for ($i=0;$i<sizeof($exploded2);$i++){
        if($exploded2[$i] == "EA_1"){
          $ii = $i +1;
          $iii = $ii +1;
          if(strlen($exploded2[$ii]) < 6){
            $tipo1 = $exploded2[$i];
            $value1 = $exploded2[$iii].' '.$exploded2[$ii];
          }else{
            $tipo1 = $exploded2[$i];
            $value1 = $exploded2[$iii];
          }
        }
        if($exploded2[$i] == "EA_2"){
          $ii = $i +1;
          if(strlen($exploded2[$ii]) < 6){
            $tipo2 = $exploded2[$i];
            $value2 = $exploded2[$ii];
          }
        }
        if($exploded2[$i] == "EA_3"){
          $ii = $i +1;
          if(strlen($exploded2[$ii]) < 6){
            $tipo3 = $exploded2[$i];
            $value3 = $exploded2[$ii];
          }
        }
        if($exploded2[$i] == "EA_4"){
          $ii = $i +1;
          if(strlen($exploded2[$ii]) < 6){
            $tipo4 = $exploded2[$i];
            $value4 = $exploded2[$ii];
          }
        }
      }

      //Mundar formato de date: 'd/m/Y H:i:s' para 'Y-m-d H:i:s'
      $date = $exploded2[0];
      $show_date = DateTime::createFromFormat('d/m/Y H:i:s', $date)->format('Y-m-d H:i:s');
      $json['dados'][] = [
        'id' => $dado->id,
        'data' => $show_date,
        'item' => $exploded2[1],
        'local' => $exploded2[2],
        ''.$tipo1.'' => $value1,
        ''.$tipo2.'' => $value2,
        ''.$tipo3.'' => $value3,
        ''.$tipo4.'' => $value4
      ];
    }

  }
}

echo json_encode($json, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
