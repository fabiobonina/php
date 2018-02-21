<?php
date_default_timezone_set('America/Recife');
ob_start();
session_start();
if(isset($_SESSION['loginEmail']) && (isset($_SESSION['loginNivel']))){
	header("Location: index.php");exit;
}
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
    <link rel="stylesheet" href="./dist/css/bulma.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <script src="dist/lib/vue.js"></script>
    <script src="dist/lib/vuex.js"></script>
    <!--script src="dist/lib/vue-router.js"></script-->
    <script src="dist/lib/vue-resource.js"></script>
    
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      
      <main id="app">
        <home></home>
      </main>
    </div>
    <template id="home">
      <div>
        <section class="hero is-fullheight is-dark is-bold">
          <div class="hero-body">
            <div class="container">
              <div class="login-logo has-text-centered">
                <h1 class="title is-1"> <a href="./index.php" class="subtitle is-1 has-text-info"><b class="title is-1 has-text-white">Bit</b>LOUC</a></h1>
              </div>
              <br>
              <login v-if="!novo" v-on:close="novo = true" ></login>
              <register v-if="novo" v-on:close="novo = false" ></register>
            </div>
          </div>
        </section>
      </div>
    </template>

    <template id="login">
      <!-- /.login-logo -->
      <div>
        <div class="columns is-vcentered">
          <div class="column is-6 is-offset-3">
            <div class="box">
              <p class="has-text-centered">Faça login para iniciar sua sessão</p>
              <message :success="successMessage" :error="errorMessage"></message>
              <br>
              <!--#INICIO -->
              <div class="field">
                <p class="control has-icons-right">
                  <input v-model="email" class="input" type="email" placeholder="Email">
                  <span class="icon is-small is-right">
                    <i class="material-icons">email</i>
                  </span>
                </p>
              </div>
              <div class="field">
                <p class="control has-icons-right">
                  <input v-model="password" class="input" type="password" placeholder="Password">
                  <span class="icon is-small is-right">
                    <i class="material-icons">lock</i>
                  </span>
                </p>
              </div>
              <hr>
              <p class="control field is-grouped is-grouped-right">
                <button :class="isLoading ? 'button is-info is-loading' : 'button is-info'" v-on:click="logar()">logar</button>
              </p>
            </div>
            <p class="has-text-centered">
              <a v-on:click="$emit('close')">Criar uma conta</a> | <a href="#">Forgot password</a>
            </p>
          </div>
        </div>

      </div>
      <!-- /.login-box-body -->
    </template>
        
    <template id="register">
      <!-- /.form-box -->
      <div>
        <div class="columns is-vcentered">
          <div class="column is-6 is-offset-3">
            <!--#CONTEUDO -->
            <div class="box">
              <p class="has-text-centered">Registre-se</p>
              <message :success="successMessage" :error="errorMessage"></message>
              <br>
              <!--#INICIO -->
              <div class="field">
                <p class="control has-icons-right">
                  <input v-model="name" class="input" type="text" placeholder="Nome completo">
                  <span class="icon is-small is-right">
                    <i class="material-icons">account_box</i>
                  </span>
                </p>
              </div>
              <div class="field">
                <p class="control has-icons-right">
                  <input v-model="user" class="input" type="text" placeholder="Usuario">
                  <span class="icon is-small is-right">
                    <i class="material-icons">account_circle</i>
                  </span>
                </p>
              </div>
              <div class="field">
                <p class="control has-icons-right">
                  <input v-model="email" class="input" type="email" placeholder="Email">
                  <span class="icon is-small is-right">
                    <i class="material-icons">email</i>
                  </span>
                </p>
              </div>
              <div class="field">
                <p class="control has-icons-right">
                  <input v-model="emailR" class="input" type="email" placeholder="Email confimer">
                  <span class="icon is-small is-right">
                    <i class="material-icons">email</i>
                  </span>
                </p>
              </div>
              <div class="field">
                <p class="control has-icons-right">
                  <input v-model="password" class="input" type="password" placeholder="Password">
                  <span class="icon is-small is-right">
                    <i class="material-icons">lock</i>
                  </span>
                </p>
              </div>
              <div class="field">
                <p class="control has-icons-right">
                  <input v-model="passwordR" class="input" type="password" placeholder="Password retype">
                  <span class="icon is-small is-right">
                    <i class="material-icons">lock</i>
                  </span>
                </p>
              </div>
              <hr>
              <p class="control field is-grouped is-grouped-right">
                <button :class="isLoading ? 'button is-info is-loading' : 'button is-info'" v-on:click="registrar()">Registrar</button>
              </p>
            </div>
            <p class="has-text-centered">
              <a v-on:click="$emit('close')">Eu já sou cadastrado</a>
            </p>
          </div>
        </div>
      </div>
      <!-- /.form-box -->
    </template>
    <?php include("src/components/_uso/message.php");?>
    <!-- components _uso -->
    <script src="src/components/_uso/message.js"></script>
    <!-- /components _uso -->
    <script src="login.js"></script>
  
  </body>
</html>
