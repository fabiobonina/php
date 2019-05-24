<div>
    <div>
      <main id="app">
        <v-app id="inspire">
          <is-login></is-login>
          <configuracao></configuracao>
          <loader></loader>
          <router-view></router-view>
        </v-app>
      </main>
    </div>
    <template id="naoEncontrado">
      <div><h2>Pagina não encontrado: 404</h2></div>
    </template>
    
    <?php require_once 'src/system/index.php';?>
    <?php require_once 'src/controle_cilindro/index.html';?>
    <?php require_once 'src/atendimento/index.html';?>
    <?php require_once 'src/organizacao/index.php';?>
    <?php require_once 'src/equipamento/index.html';?>
    
    
    <?php// require_once 'src/pages/os.php';?>
    <?php// require_once 'src/pages/lojas.php';?>
    <?php// require_once 'src/pages/loja.php';?>
    <?php// require_once 'src/pages/local.php';?>
    <?php// require_once 'src/pages/os-gerencial.php';?>

</div>

<script src="src/_store/actions.js"></script>
<script src="src/_store/getters.js"></script>
<script src="src/_store/mutations.js"></script>
<script src="src/_store/state.js"></script>
<script src="src/_store/modules/user.js"></script>
<script src="src/_store/modules/productos.js"></script>
<script src="src/_store/modules/controleCilindro.js"></script>
<script src="src/_router/router.js"></script>

<script type="module" src="src/app.js"></script>


