<!-- Full Width Column -->
<div>
    <div>
      <main id="app">
        <v-app id="inspire">
          <configuracao></configuracao>
          <router-view></router-view>
        </v-app>
      </main>
    </div>
    <template id="naoEncontrado">
      <div><h2>Pagina não encontrado: 404</h2></div>
    </template>
    <?php require_once 'src/components/includes/config.php';?>
    <?php require_once 'src/pages/home.php';?>
    <?php require_once 'src/pages/oss.php';?>
    <?php require_once 'src/pages/lojas.php';?>
    <?php require_once 'src/pages/loja.php';?>
    <?php require_once 'src/pages/local.php';?>
    <?php require_once 'src/pages/proprietario.php';?>

    <?php require_once 'src/components/includes/message.php';?>
</div>

<script src="src/app.js"></script>


