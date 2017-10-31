<?php
/**
 * Vue.js with PHP Api
 * @author Fabio Bonina <faiobonina@gmail.com>
 */

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

  $query = $db->query("SELECT * FROM login");

  if ($query->rowCount() > 0) {
    //$users = $query->fetchAll(PDO::FETCH_OBJ);
    $resultado = array();
    while($result = $query->fetch()) {
      array_push($resultado, $result);
    }

    /*foreach ($users as $user) {
      $json['users'][] = [
        'id' => $user->id,
        'name' => $user->nome,
        'surname' => $user->nickuser
      ];
    }*/
    $json['users'] = $resultado;

  }

}

echo json_encode($json);
