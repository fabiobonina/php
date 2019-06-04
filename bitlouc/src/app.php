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
    <?php require_once 'src/atendimento/index.html';?>
    <?php require_once 'src/organizacao/index.php';?>
    <?php require_once 'src/equipamento/index.html';?>
    <?php require_once 'src/controle_cilindro/controle-cilindros.html';?>
    
    
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

<script src="src/system/modules/user.js"></script>
<script src="src/controle_cilindro/modules/cilindro.js"></script>
<script src="src/controle_cilindro/modules/config.js"></script>
<script src="src/controle_cilindro/modules/programacao.js"></script>


<script src="https://unpkg.com/vue-bootstrap4-table@1.0.3/dist/vue-bootstrap4-table.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="src/_router/router.js"></script>

<script type="module" src="src/app.js"></script>


