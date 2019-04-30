<?php
date_default_timezone_set('America/Recife');
ob_start();
//session_start();
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');

//include("_chave.php");

require_once '../control/user.control.php';

//function __autoload($class_name){
//  require_once '../model/' . $class_name . '.php';
//}

//$globalControl  = new GlobalControl();
$userControl    = new UserControl();

$res = array('error' => true);
$arDados = array();
$arErros = array();
$action = 'logout';

if(isset($_GET['action'])){
  $action = $_GET['action'];
}

if($action == 'logout'){
  $userControl->logout();
}

if($action == 'logar'):
  if(isset($_POST['email'], $_POST["password"] ) ){
  
    $email= $_POST["email"];
    $senha= $_POST["password"];
    $res = $userControl->logar( $email, $senha );
  }
endif;


#REGISTRAR
if($action == 'registrar'):
  #Novo Usuario
  $chave  = $_POST['chave'];
  $name   = $_POST['name'];
  $email  = $_POST['email'];
  $user   = $_POST['user'];
  $senha  = $_POST['password'];

  //$name  = 'Fabio';
  //$email = 'fabiobonina@gmail.com';
  //$user = 'Fabio Bonina';
  //$senha = 'password';

  #USUARIOS-------------------------------------------------------------------------------------------
  

  foreach($usuarios->findAll() as $key => $value): {
    
    if($value->email == $email ):
      $duplicado = true;
      $res['error'] = true;
      $arError = "Error, email já cadastrado!";
      array_push($arErros, $arError);
    endif;

    if( $check = $globalControl->checkDuplicity($user, $value->user) ):
      $duplicado = true;
      $res['error'] = true;
      $arError = "Error, Nome do Usuario já ultilizado!";
      array_push($arErros, $arError);
    endif;
    
  }endforeach;
  #USUARIOS-------------------------------------------------------------------------------------------
  
  $nivel = "0";
  $ativo = "0";
  $password = md5($senha);
  $avatar = "http://www.gravatar.com/avatar/".md5($email)."?d=identicon";
  $datacadastro = date("Y-m-d");
  $datalogin = date("Y-m-d H:i:s");
  if($duplicado == false):
    $usuarios->setName($name);
    $usuarios->setEmail($email);
    $usuarios->setNickuser($user);
    $usuarios->setSenha($password);
    $usuarios->setAvatar($avatar);
    $usuarios->setChave($chave);
    $usuarios->setDataCadastro($datacadastro);
    $usuarios->setDatalogin($datalogin);
    $usuarios->setNivel($nivel);
    $usuarios->setAtivo($ativo);
    # Insert
    if($usuarios->insert()){
      $res['error'] = false;
      $arDados = "OK, dados registrado com sucesso";
      $res['message']= $arDados;
    }else{
      $res['error'] = true; 
      $arError = "Error, nao foi possivel salvar os dados";
      array_push($arErros, $arError);
    }
  endif;

  if($res['error'] == true){
    $res['message']= $arErros;
  }

endif;


//$res['dados'] = $arDados;
header("Content-Type: application/json");
echo json_encode($res, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);