<?php
ob_start();
session_start();
if(isset($_SESSION['loginUser']) && (isset($_SESSION['loginSenha']))){
	header("Location: index.php");exit;
}

function __autoload($class_name){
  require_once 'admin/classes/' . $class_name . '.php';
}

	
$usuario = new Usuarios();

if(isset($_POST['logar'])):

  $nickuser=$_POST["nickuser"];
  $senha=$_POST["senha"];
  //$datalogin = date("Y-m-d H:i:s");

  $usuario->setNickuser($nickuser);
  $usuario->setSenha($senha);
  //$usuario->setDatalogin($datalogin);

  # Logar
  if($usuario->logar()){
    echo "Logado com sucesso!";
  }

endif;

if(isset($_GET['acao'])){
	
	if(!isset($_POST['logar'])){
	
		$acao = $_GET['acao'];
		if($acao=='negado'){
			echo '<div class="alert alert-danger">
						  <button type="button" class="close" data-dismiss="alert">×</button>
						  <strong>Erro ao acessar!</strong> Você precisa estar logado p/ acessar o Sistema.
					</div>';	
		}
	}
}
if(isset($_POST['cadastrar'])):

    #Novo Usuario
			$nome  = $_POST['nome'];
			$email = $_POST['email'];
      $emailR = $_POST['emailR'];
			$nickuser=$_POST["nickuser"];
			$senha=$_POST["senha"];
      $senhaR=$_POST["senhaR"];
			$nivel_usuario = "0";
			$ativo = "0";
			$datacadastro = date("Y-m-d H:i:s");
			$datalogin = date("Y-m-d H:i:s");

  if($email == $emailR && $senha == $senhaR){

			$usuario->setNome($nome);
			$usuario->setEmail($email);
			$usuario->setNickuser($nickuser);
			$usuario->setSenha($senha);
			$usuario->setDataCadastro($datacadastro);
			$usuario->setDatalogin($datalogin);
			$usuario->setNivel($nivel_usuario);
			$usuario->setAtivo($ativo);
			# Insert
			if($usuario->insert()){
				echo "Inserido com sucesso!";
			}

    }else{
            echo '<div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>Erro nos dados!</strong> Verefique email ou senha.
              </div>';
    }
  endif;

		?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  

    <title>SkyHub | Web Mobi</title>
    <link href="admin/img/fa-paw.png" rel="icon" type="image/png" />

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="#" method="post">
              <h1>Login</h1>
              <div>
                <input type="text" name="nickuser" class="form-control" placeholder="Usuário" required="" />
              </div>
              <div>
                <input type="password" name="senha" class="form-control" placeholder="Senha" required="" />
              </div>
              <div>
                <input type="submit" name="logar" value="Logar" class="btn btn-default submit">
                <a class="reset_pass" href="#">Esqueceu sua senha?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">É novo aqui?
                  <a href="#signup" class="to_register">Criar Conta</a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> SkyHub | Web Mobi</h1>
                  <p>©2016 Todos os direitos reservados. SkyHub | Web Mobi. </p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form method="post" action="">
              <h1>Novo Usuario</h1>
              <div>
                <input type="text" name="nome" class="form-control" placeholder="Nome" required="" />
              </div>
              <div>
                <input type="text" name="nickuser" class="form-control" placeholder="Usuário" required="" />
              </div>
              <div>
                <input type="email" name="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="email" name="emailR" class="form-control" placeholder="Confirmar Email" />
              </div>
              <div>
                <input type="password" name="senha" class="form-control" placeholder="Senha" required="" />
              </div>
              <div>    			
      			    <input type="password" name="senhaR" class="form-control" placeholder="Confirmar Senha" />
  			      </div>
              <div>
                <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-default submit">
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Já é usuario ?
                  <a href="#signin" class="to_register"> Logar </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> SkyHub | Web Mobi</h1>
                  <p>©2016 Todos os direitos reservados. SkyHub | Web Mobi.</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>