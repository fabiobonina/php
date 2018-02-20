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
$arErros = array();
$action = 'logar';

if(isset($_GET['action'])){
  $action = $_GET['action'];
}

if($action == 'logar'):

  $email=$_POST["email"];
  $senha=$_POST["password"];

  $datalogin = date("Y-m-d H:i:s");
  $password = md5($senha);

  #USUARIOS-------------------------------------------------------------------------------------------
  $userValido = '0';
  foreach($usuarios->findAll() as $key => $value):if( $value->email == $email ) {
    $value->password;
    $userValido++;
    if($password == $value->password){
      
      $loginAtivo = $value->ativo;

      if($loginAtivo == 0){
        $loginId = $value->id;
        $loginName = $value->name;
        $loginEmail = $value->email;
        $loginUser = $value->user;
        $loginAvatar = $value->avatar;
        $loginProprietario = $value->proprietario;
        $loginGrupo = $value->grupoLoja;
        $loginLoja = $value->loja;
        $loginNivel = $value->nivel;
        $loginDtCadastro = $value->data_cadastro;
        $loginDtUltimoLogin = $value->data_ultimo_login;

        $usuarios->setDatalogin($datalogin);

        if($usuarios->updateLogar($loginId)){
          $res['error'] = false;
          $arDados = "Logado com sucesso!";
          $res['message']= $arDados;
        }else{
          $arError = "Atenção, data não atualizada";
          array_push($arErros, $arError);
        }

        $_SESSION['loginId'] = $loginId;
        $_SESSION['loginName'] = $loginName;
        $_SESSION['loginEmail'] = $loginEmail;
        $_SESSION['loginUser'] = $loginUser;
        $_SESSION['loginAvatar'] = $loginAvatar;
        $_SESSION['loginProprietario'] = $loginProprietario;
        $_SESSION['loginGrupo'] = $loginGrupo;
        $_SESSION['loginLoja'] = $loginLoja;
        $_SESSION['loginNivel'] = $loginNivel;
        $_SESSION['loginDtCadastro'] = $loginDtCadastro;
        $_SESSION['loginDtUltimoLogin'] = $loginDtUltimoLogin;

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
  #USUARIOS-------------------------------------------------------------------------------------------
  
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
  $name  = $_POST['name'];
  $email = $_POST['email'];
  $user = $_POST['user'];
  $senha = $_POST['password'];

  //$name  = 'Fabio';
  //$email = 'fabiobonina@gmail.com';
  //$user = 'Fabio Bonina';
  //$senha = 'password';

  #USUARIOS-------------------------------------------------------------------------------------------
  $duplicado = false;
  $acentos = array(
    'À', 'Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ò','Ó','Ô','Õ','Ö','Ù','Ú','Û','Ü','Ý',
    'à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ð','ò','ó','ô','õ','ö','ù','ú','û','ü','ý','ÿ', ' '
  );
  $sem_acentos = array(
    'A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','O','O','O','O','O','U','U','U','U','Y',
    'a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','o','o','o','o','o','o','u','u','u','u','y','y', '_'
  );
  foreach($usuarios->findAll() as $key => $value): {
    $txtnome2 = $value->user;
    $txtnome1 = str_replace($acentos, $sem_acentos, $user);
    $txtnome2 = str_replace($acentos, $sem_acentos, $txtnome2);
    
    if($value->email == $email ):
      $duplicado = true;
      $res['error'] = true;
      $arError = "Error, email já cadastrado!";
      array_push($arErros, $arError);
    endif;

    if(strtolower(utf8_decode($txtnome1)) == strtolower(utf8_decode($txtnome2))):
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

$res['dados'] = $arDados;
header("Content-Type: application/json");
echo json_encode($res, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);