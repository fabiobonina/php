<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BitLLOC</title>
    <link href="./img/bit-llouc.jpg" rel="icon" type="image/jpg" />
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
        <a href="./index.php"><b>Bit</b>LLOC</a>
      </div>
      <main id="app">
        <router-view></router-view>
      </main>
    </div>
        
    <template id="login">
      <!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Faça login para iniciar sua sessão</p>

        <form action="../../index2.html" method="post">
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password">
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
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
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

        <form action="../../index.html" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Full name">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="User">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Retype password">
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
              <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <a href="login.php" class="text-center">Eu já sou cadastrado</a>
      </div>
      <!-- /.form-box -->
    </template>
        

        
    </template>
    <script src="https://unpkg.com/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vuex/2.0.0-rc.4/vuex.js"></script>
    <script src="https://unpkg.com/vue-router@2.0.0/dist/vue-router.js"></script>
    <script src="lib/vue-resource.min.js"></script>
    <script src="appLoja.js"></script>

  </body>
</html>
