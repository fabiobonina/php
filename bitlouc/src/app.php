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
    <?php require_once 'src/components/includes/loader.php';?>
    <?php require_once 'src/pages/home.php';?>
    <?php require_once 'src/pages/oss.php';?>
    <?php require_once 'src/pages/lojas.php';?>
    <?php require_once 'src/pages/loja.php';?>
    <?php require_once 'src/pages/local.php';?>
    <?php require_once 'src/pages/proprietario.php';?>
    <?php require_once 'src/pages/ocorrencia.php';?>

    <?php require_once 'src/components/includes/message.php';?>
</div>

<script src="src/store/actions.js"></script>
<script src="src/store/getters.js"></script>
<script src="src/store/mutations.js"></script>
<script src="src/store/state.js"></script>
<script src="src/router/router.js"></script>

<script src="src/app.js"></script>


