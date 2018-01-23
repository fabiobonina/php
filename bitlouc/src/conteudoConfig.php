<!-- Full Width Column -->
<div>
  <div>
    <div>
      <main id="app">
        <div>
          <index></index>
          <configuracao></configuracao>
          <router-view></router-view>
          <rodape></rodape>
        </div>
      </main>
    </div>
        
    <?php include("src/pages/index.php");?>
    <?php include("src/pages/rodape.php");?>
    <?php include("src/pages/config.php");?>
    <!-- components proprietario -->
    <?php include("src/components/proprietario/proprietario.php");?>
    <!-- /components proprietario -->
    <!-- components loja -->
    <?php include("src/components/loja/lojas-grid.php");?>
    <?php include("src/components/loja/loja.php");?>
    <!-- /components loja -->
    <!-- components local -->
    <?php include("src/components/local/geolocalizacao.php");?>
    <?php include("src/components/local/locais-grid.php");?>
    <?php include("src/components/local/local.php");?>
    <?php include("src/components/local/localAdd.php");?>
    <!-- /components local-->
    <!-- components bem -->
    <?php include("src/components/bem/bens-grid.php");?>
    <?php include("src/components/bem/bemAdd.php");?>
    <!-- /components bem -->
    <!-- components os -->
    <?php include("src/components/os/os-grid.php");?>
    <?php include("src/components/os/osAdd.php");?>
    <!-- /components os -->
    <!-- components user -->
    <?php include("src/components/user/user.php");?>
    <!-- /components user -->
    <!-- components _uso -->
    <?php include("src/components/_uso/message.php");?>
    <!-- /components _usor -->

    <template id="naoEncrontrado">
      <h2>No encuentro: 404</h2>
    </template>
  </div>
<!-- /.container -->
</div>
<!-- /.content-wrapper -->
<script src="src/pages/index.js"></script>
<script src="src/pages/rodape.js"></script>
<script src="src/pages/config.js"></script>
<!-- components proprietario -->
<script src="src/components/proprietario/proprietario.js"></script>
<!-- /components proprietario -->
<!-- components loja -->
<script src="src/components/loja/lojas-grid.js"></script>
<script src="src/components/loja/loja.js"></script>
<!-- /components loja -->
<!-- components local-->
<script src="src/components/local/geolocalizacao.js"></script>
<script src="src/components/local/locais-grid.js"></script>
<script src="src/components/local/local.js"></script>
<script src="src/components/local/localAdd.js"></script>
<!-- /components local-->
<!-- components bem -->
<script src="src/components/bem/bens-grid.js"></script>
<script src="src/components/bem/bemAdd.js"></script>
<!-- /components bem -->
<!-- components os -->
<script src="src/components/os/os-grid.js"></script>
<script src="src/components/os/osAdd.js"></script>
<!-- /components os -->
<!-- components user -->
<script src="src/components/user/user.js"></script>
<!-- /components user -->
<!-- components _uso -->
<script src="src/components/_uso/message.js"></script>
<!-- /components _uso -->
<script src="appLoja.js"></script>
