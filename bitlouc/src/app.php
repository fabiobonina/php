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
    
    <?php require_once 'src/system/home.php';?>
    <?php require_once 'src/controlecilindro/pages/controle-cilindros.php';?>
    <?php require_once 'src/atendimento/pages/oss.php';?>
    <?php require_once 'src/organizacao/pages/gerencial.php';?>
    
    <?php require_once 'src/system/components/includes/config.php';?>
    <?php require_once 'src/system/components/includes/loader.php';?>
    <?php require_once 'src/system/components/includes/_copia.php';?>
    <?php require_once 'src/pages/os.php';?>
    <?php require_once 'src/pages/lojas.php';?>
    <?php require_once 'src/pages/loja.php';?>
    <?php require_once 'src/pages/local.php';?>
    <?php require_once 'src/pages/os-gerencial.php';?>

    <?php require_once 'src/components/includes/message.php';?>
</div>

<script src="src/_store/actions.js"></script>
<script src="src/_store/getters.js"></script>
<script src="src/_store/mutations.js"></script>
<script src="src/_store/state.js"></script>
<script src="src/_store/modules/productos.js"></script>
<script src="src/_store/modules/controleCilindro.js"></script>
<script src="src/_router/router.js"></script>

<script type="module" src="src/app.js"></script>


