<?php
date_default_timezone_set('America/Recife');
ob_start();
session_start();
if(isset($_SESSION['loginEmail']) && (isset($_SESSION['loginNivel']))){
	header("Location: index.php");exit;
}

function __autoload($class_name){
  require_once 'config/api/' . $class_name . '.php';
}
	
$usuario = new Usuarios();

if(isset($_POST['logar'])):

  $email=$_POST["email"];
  $senha=$_POST["password"];
  $datalogin = date("Y-m-d H:i:s");
  $password = md5($senha);

  $usuario->setEmail($email);
  $usuario->setSenha($password);
  $usuario->setDatalogin($datalogin);

  # Logar
  if($usuario->logar()){
    echo "Logado com sucesso!";
  }

endif;

if(isset($_GET['acao'])){
	
	if(!isset($_POST['logar'])){
	
		$acao = $_GET['acao'];
		if($acao=='negado'){
			echo '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> Erro ao acessar!</h4>
        Você precisa estar logado p/ acessar o Sistema.
        </div>';	
		}
	}
}
if(isset($_POST['registrar'])):
  #Novo Usuario
  $name  = $_POST['name'];
  $email = $_POST['email'];
  $emailR = $_POST['emailR'];
  $user=$_POST["user"];
  $senha=$_POST["password"];
  $senhaR=$_POST["passwordR"];
  $nivel = "0";
  $ativo = "0";
  $password = md5($senha);
  $avatar = "http://www.gravatar.com/avatar/".md5($email)."?d=identicon";
  $datacadastro = date("Y-m-d");
  $datalogin = date("Y-m-d H:i:s");

  if($email == $emailR && $senha == $senhaR){
    $usuario->setName($name);
    $usuario->setEmail($email);
    $usuario->setNickuser($user);
    $usuario->setSenha($password);
    $usuario->setAvatar($avatar);
    $usuario->setDataCadastro($datacadastro);
    $usuario->setDatalogin($datalogin);
    $usuario->setNivel($nivel);
    $usuario->setAtivo($ativo);
    # Insert
    if($usuario->insert()){
      echo '<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-check"></i> Registrado!</h4>
      Agora digite seu email e password.
      </div>';
    }

  }else{
    echo '<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i> Erro nos dados!</h4>
    Verefique email ou senha.
    </div>';
  }
endif;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BitLOUC</title>
    <link href="./img/bit-louc.png" rel="icon" type="image/png"/>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="./bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="./bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="./plugins/iCheck/square/blue.css">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="./index.php"><b>Bit</b>LOUC</a>
      </div>
      <main id="app">
        <router-view></router-view>
      </main>
    </div>
        
    <template id="login">
      <!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Faça login para iniciar sua sessão</p>

        <form action="#" method="post">
          <div class="form-group has-feedback">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Lembre de mim
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" name="logar" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <!-- /.social-auth-links -->

        <a href="#">Esqueci a minha senha</a><br>
        <a href="register.php" class="text-center">
          <router-link :to="{path: '/register'}">Criar uma conta</router-link>  
        </a>

      </div>
      <!-- /.login-box-body -->
    </template>
        
    <template id="register">
      <!-- /.form-box -->
      <div class="register-box-body">
        <p class="login-box-msg">Registre-se</p>

        <form action="#" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="name" class="form-control" placeholder="Full name">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" name="user" class="form-control" placeholder="User">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="email" name="emailR" class="form-control" placeholder="Retype email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="passwordR" class="form-control" placeholder="Retype password">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" name="registrar" class="btn btn-primary btn-block btn-flat">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <a class="text-center"><router-link to="/">Eu já sou cadastrado</router-link></a>
      </div>
      <!-- /.form-box -->
    </template>
    
    </template>
    <script src="https://unpkg.com/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vuex/2.0.0-rc.4/vuex.js"></script>
    <script src="https://unpkg.com/vue-router@2.0.0/dist/vue-router.js"></script>
    <script src="lib/vue-resource.min.js"></script>
    <script src="appLogin.js"></script>

  </body>
</html>
