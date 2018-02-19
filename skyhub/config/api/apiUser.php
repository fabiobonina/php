<?php
date_default_timezone_set('America/Recife');
ob_start();
session_start();
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');

//include("_chave.php");

function __autoload($class_name){
  require_once '../classes/' . $class_name . '.php';
}
	
$usuarios = new Usuarios();

$res = array('error' => true);
$arDados = array();
$action = 'registrar';

if(isset($_GET['action'])){
  $action = $_GET['action'];
}

if($action == 'logar'):

  $email=$_POST["email"];
  $senha=$_POST["password"];
  $datalogin = date("Y-m-d H:i:s");
  $password = md5($senha);

  $usuarios->setEmail($email);
  $usuarios->setSenha($password);
  $usuarios->setDatalogin($datalogin);

  # Logar
  if($usuarios->logar()){
    echo "Logado com sucesso!";
  }

endif;

if($action == 'registrar'):
  #Novo Usuario
  $name  = $_POST['name'];
  $email = $_POST['email'];
  $user = $_POST['user'];
  $senha = $_POST['password'];

  //$name  = 'name';
  //$email = 'email';
  //$user = 'user';
  //$senha = 'password';
  
  $nivel = "0";
  $ativo = "0";
  $password = md5($senha);
  $avatar = "http://www.gravatar.com/avatar/".md5($email)."?d=identicon";
  $datacadastro = date("Y-m-d");
  $datalogin = date("Y-m-d H:i:s");

    $usuarios->setName($name);
    $usuarios->setEmail($email);
    $usuarios->setNickuser($user);
    $usuarios->setSenha($password);
    $usuarios->setAvatar($avatar);
    $usuarios->setDataCadastro($datacadastro);
    $usuarios->setDatalogin($datalogin);
    $usuarios->setNivel($nivel);
    $usuarios->setAtivo($ativo);
    # Insert
    if($usuarios->insert()){
      $res['error'] = false;
      $res['message']= "OK, dados registrado com sucesso";
    }else{
      $res['error'] = true; 
      $res['message'] = "Error, nao foi possivel salvar os dados";      
    }
endif;

#ATUALIZAR
if(isset($_POST['atualizar'])):

  
endif;

#DESLOCAMENTO
if(isset($_POST['deslocamento'])):

  
endif;

#DELETAR
if(isset($_GET['acao1']) && $_GET['acao1'] == 'deletar'):
  
endif;

$res['dados'] = $arDados;
header("Content-Type: application/json");
echo json_encode($res, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);