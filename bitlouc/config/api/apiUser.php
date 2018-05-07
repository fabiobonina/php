<?php
date_default_timezone_set('America/Recife');
ob_start();
session_start();
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');

//include("_chave.php");

require_once '../function/_usoFunction.php';

function __autoload($class_name){
  require_once '../classes/' . $class_name . '.php';
}

$usoFunction = new UsoFunction();
$usuarios = new Usuarios();

$res = array('error' => true);
$arDados = array();
$arErros = array();
$action = 'logar';

if(isset($_GET['action'])){
  $action = $_GET['action'];
}

if($action == 'logar'):

  $email= $_POST["email"];
  $senha= $_POST["password"];

  $datalogin = date("Y-m-d H:i:s");
  $password = md5($senha);

  #CONFIRMAÇÃO-LOGIN-------------------------------------------------------------------------------------------
  #CONFINAÇÃO EMAIL
  $userValido = '0';
  foreach($usuarios->findAll() as $key => $value):if( $value->email == $email ) {
    
    #CONFINAÇÃO SENHA
    $value->password;
    $userValido++;
    if($password == $value->password){
      
      #CONFINAÇÃO ATIVO
      $loginAtivo = $value->ativo;
      if($loginAtivo == 0){
        //$login = array();
        $login['id']            = $value->id;
        $login['name']          = $value->name;
        $login['email']         = $value->email;
        $login['user']          = $value->user;
        $login['avatar']        = $value->avatar;
        $login['token']         = $value->chave;
        $login['proprietario']  = $value->proprietario;
        $login['grupo']         = $value->grupo;
        $login['loja']          = $value->loja;
        $login['nivel']         = $value->nivel;
        $login['dtCadastro']    = $value->data_cadastro;
        $login['dtUltimoLogin'] = $value->data_ultimo_login;
        
        #ATUALIZAÇÃO ULTIMO LOGIN
        if($usuarios->updateLogar($login['id'], $datalogin)){
          $res['error'] = false;
          $res['isLoggedIn']= true;
          $res['dados']= $login;
          $res['token']= $value->chave;
          $res['message']= 'Logado com sucesso!';
        }else{
          $arError = "Atenção, data não atualizada";
          array_push($arErros, $arError);
        }

        #CRIAR SESSÃO
        $_SESSION['loginId']            = $login['id'];
        $_SESSION['loginName']          = $login['name'];
        $_SESSION['loginEmail']         = $login['email'];
        $_SESSION['loginUser']          = $login['user'];
        $_SESSION['loginToken']         = $login['token'];
        $_SESSION['loginAvatar']        = $login['avatar'];
        $_SESSION['loginProprietario']  = $login['proprietario'];
        $_SESSION['loginGrupo']         = $login['grupo'];
        $_SESSION['loginLoja']          = $login['loja'];
        $_SESSION['loginNivel']         = $login['nivel'];
        $_SESSION['loginDtCadastro']    = $login['dtCadastro'];
        $_SESSION['loginDtUltimoLogin'] = $login['dtUltimoLogin'];

      }else{
        $res['error'] = true;
        $arError = "Error ao logar! Contate o administrador do sistema.";
        array_push($arErros, $arError);
      }
    }else{
      $res['error'] = true;
      $arError = "Error ao logar! Senha invalida!";
      array_push($arErros, $arError);
    }
  }endforeach;
  #CONFIRMAÇÃO-LOGIN-------------------------------------------------------------------------------------------
  
  if($userValido == 0){
    $res['error'] = true;
    $arError = "Error ao logar! Usuario não encontrado!";
    array_push($arErros, $arError);
  }
  if($res['error'] == true){
    $res['message']= $arErros;
  }
  
endif;



#REGISTRAR
if($action == 'registrar'):
  #Novo Usuario
  $chave = $_POST['cahve'];
  $name  = $_POST['name'];
  $email = $_POST['email'];
  $user = $_POST['user'];
  $senha = $_POST['password'];

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

    if( $check = $usoFunction->checkDuplicity($user, $value->user) ):
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

#ATUALIZAR
if(isset($_POST['atualizar'])):

endif;

#DESLOCAMENTO
if(isset($_POST['deslocamento'])):

endif;

#DELETAR
if(isset($_GET['acao1']) && $_GET['acao1'] == 'deletar'):
  
endif;

//$res['dados'] = $arDados;
header("Content-Type: application/json");
echo json_encode($res, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);