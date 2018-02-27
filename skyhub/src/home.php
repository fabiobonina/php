<!-- Full Width Column -->
<div>
  <div>
    <div>
      <main id="app">
        <div>
          <top></top>
          <configuracao></configuracao>
            <router-view></router-view>
          <rodape></rodape>
        </div>
      </main>
    </div>
        
    <?php include("src/pages/top.php");?>
    <?php include("src/pages/rodape.php");?>
    <?php include("src/pages/config.php");?>
    <!-- components proprietario -->
    <?php include("src/components/proprietario/proprietario.php");?>
    <!-- /components proprietario -->
    <!-- components loja -->
    <?php include("src/components/loja/loja.php");?>
    <?php include("src/components/loja/lojas.php");?>
    <?php include("src/components/loja/lojas-grid.php");?>
    <?php include("src/components/os/lojaOss.php");?>
    <!-- /components loja -->
    <!-- components local -->
    <?php include("src/components/local/geolocalizacao.php");?>
    <?php include("src/components/local/locais-grid.php");?>
    <?php include("src/components/local/local.php");?>
    <?php include("src/components/local/localAdd.php");?>
    <?php include("src/components/local/maps.php");?>
    <!-- /components local-->
    <!-- components bem -->
    <?php include("src/components/bem/bens-grid.php");?>
    <?php include("src/components/bem/bemAdd.php");?>
    <!-- /components bem -->
    <!-- components os -->
    <?php include("src/components/os/oss.php");?>
    <?php include("src/components/os/os.php");?>
    <?php include("src/components/os/os-grid.php");?>
    <?php include("src/components/os/osAdd.php");?>
    
    <!-- /components os -->
    <!-- components user -->
    <?php include("src/components/user/user.php");?>
    <!-- /components user -->
    <!-- components _uso -->
    <?php include("src/components/_uso/message.php");?>
    <!-- /components _usor -->
    <!-- components servicos -->
    <?php include("src/components/servicos/descricao/descricaoAdd.php");?>
    <?php include("src/components/servicos/tecnico/deslocamento/deslocamentoAdd.php");?>
    <?php include("src/components/servicos/tecnico/tecnico.php");?>
    <!-- /components servicos -->

    <template id="naoEncrontrado">
      <h2>No encuentro: 404</h2>
    </template>
  </div>
<!-- /.container -->
</div>
<!-- /.content-wrapper -->
<script src="src/pages/top.js"></script>
<script src="src/pages/rodape.js"></script>
<script src="src/pages/config.js"></script>
<!-- components proprietario -->
<script src="src/components/proprietario/proprietario.js"></script>
<!-- /components proprietario -->
<!-- components loja -->
<script src="src/components/loja/lojas-grid.js"></script>
<script src="src/components/loja/loja.js"></script>
<script src="src/components/loja/lojas.js"></script>
<script src="src/components/os/lojaOss.js"></script>
<!-- /components loja -->
<!-- components local-->
<script src="src/components/local/geolocalizacao.js"></script>
<script src="src/components/local/locais-grid.js"></script>
<script src="src/components/local/local.js"></script>
<script src="src/components/local/localAdd.js"></script>
<script src="src/components/local/maps.js"></script>
<!-- /components local-->
<!-- components bem -->
<script src="src/components/bem/bens-grid.js"></script>
<script src="src/components/bem/bemAdd.js"></script>
<!-- /components bem -->
<!-- components os -->
<script src="src/components/os/os-grid.js"></script>
<script src="src/components/os/oss.js"></script>
<script src="src/components/os/os.js"></script>
<script src="src/components/os/osAdd.js"></script>
<!-- /components os -->
<!-- components user -->
<script src="src/components/user/user.js"></script>
<!-- /components user -->
<!-- components _uso -->
<script src="src/components/_uso/message.js"></script>
<!-- /components _uso -->
<!-- components servicos -->
<script src="src/components/servicos/descricao/descricaoAdd.js"></script>
<script src="src/components/servicos/tecnico/deslocamento/deslocamentoAdd.js"></script>
<script src="src/components/servicos/tecnico/tecnico.js"></script>
<!-- /components servicos -->

<!-- /components servicos -->
<script src="src/home.js"></script>
