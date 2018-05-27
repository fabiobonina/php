<!-- Full Width Column -->
<div>
  <div>
    <div>
      <main id="app">
        <v-app id="inspire">
            <configuracao></configuracao>
            <router-view></router-view>
        </v-app>
      </main>
    </div>
    <?php require_once 'src/components/includes/config.php';?>
    <?php require_once 'src/pages/home.php';?>
    <?php require_once 'src/pages/oss.php';?>
    <?php require_once 'src/pages/lojas.php';?>
    <?php require_once 'src/pages/locais.php';?>
    <?php require_once 'src/pages/loja.php';?>

    <?php require_once 'src/components/includes/message.php';?>

    <template id="naoEncontrado">
      <div><h2>Pagina não encontrado: 404</h2></div>
    </template>
  </div>
<!-- /.container -->
</div>
<!-- components servicos -->

<!-- /components projeto -->
<!-- /components servicos -->
<script src="src/app.js"></script>
