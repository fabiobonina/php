<!-- Full Width Column -->
<div>
  <div>
    <div>
      <main id="app">
        <div>
          <configuracao></configuracao>
            <router-view></router-view>
            <br>
          <rodape></rodape>
        </div>
      </main>
    </div>
        
    <?php include("src/pages/top.php");?>
    <?php include("src/pages/rodape.php");?>
    <?php include("src/pages/config.php");?>
    <?php include("src/pages/dashboard.php");?>
    <!-- components proprietario -->
    <?php include("src/components/proprietario/proprietario.php");?>
    <!-- /components proprietario -->
    <!-- components loja -->
    <?php include("src/components/loja/loja-add.php");?>
    <?php include("src/components/loja/loja-del.php");?>
    <?php include("src/components/loja/loja-edt.php");?>
    <?php include("src/components/loja/loja-cat.php");?>
    <?php include("src/components/loja/loja.php");?>
    <?php include("src/components/loja/lojas.php");?>
    <?php include("src/components/loja/lojas-grid.php");?>
    <!-- /components loja -->
    <!-- components local -->
    <?php include("src/components/local/local-geo.php");?>
    <?php include("src/components/local/locais-grid.php");?>
    <?php include("src/components/local/local.php");?>
    <?php include("src/components/local/locais.php");?>
    <?php include("src/components/local/local-add.php");?>
    <?php include("src/components/local/local-edt.php");?>
    <?php include("src/components/local/local-del.php");?>
    <?php include("src/components/local/local-cat.php");?>
    <?php include("src/components/local/maps.php");?>
    <!-- /components local-->
    <!-- components bem -->
    <?php include("src/components/bem/bens-grid.php");?>
    <?php include("src/components/bem/bem-add.php");?>
    <?php include("src/components/bem/bem-edt.php");?>
    <?php include("src/components/bem/bem-del.php");?>
    <?php include("src/components/bem/bens.php");?>
    <!-- /components bem -->
    <!-- components os -->
    <?php include("src/components/os/oss.php");?>
    <?php include("src/components/os/os.php");?>
    <?php include("src/components/os/os-grid.php");?>
    <?php include("src/components/os/os-add.php");?>
    <?php include("src/components/os/os-edt.php");?>
    <?php include("src/components/os/os-del.php");?>
    <?php include("src/components/os/os-tec.php");?> 
    <?php include("src/components/os/os-amarrac.php");?>    
    <?php include("src/components/os/lojaOs.php");?>
    <?php include("src/components/os/localOs.php");?>
    
    <!-- /components os -->
    <!-- components user -->
    <?php include("src/components/user/user.php");?>
    <!-- /components user -->
    <!-- components _uso -->
    <?php include("src/components/_uso/message.php");?>
    <!-- /components _usor -->
    <!-- components servicos -->
    <?php include("src/components/servicos/nota/nota-add.php");?>
    <?php include("src/components/servicos/nota/nota-edt.php");?>
    <?php include("src/components/servicos/tecnico/deslocamento/desloc-add.php");?>
    <?php include("src/components/servicos/tecnico/deslocamento/desloc-chg.php");?>
    <?php include("src/components/servicos/tecnico/deslocamento/desloc-edt.php");?>
    <?php include("src/components/servicos/tecnico/tecnico.php");?>
    <!-- /components servicos -->

    <template id="naoEncontrado">
      <div><h2>No encuentro: 404</h2></div>
      
    </template>
  </div>
<!-- /.container -->
</div>
<!-- /.content-wrapper -->
<script src="src/pages/top.js"></script>
<script src="src/pages/rodape.js"></script>
<script src="src/pages/config.js"></script>
<script src="src/pages/dashboard.js"></script>
<!-- components proprietario -->
<script src="src/components/proprietario/proprietario.js"></script>
<!-- /components proprietario -->
<!-- components loja -->
<script src="src/components/loja/lojas-grid.js"></script>
<script src="src/components/loja/loja-add.js"></script>
<script src="src/components/loja/loja-del.js"></script>
<script src="src/components/loja/loja-edt.js"></script>
<script src="src/components/loja/loja-cat.js"></script>
<script src="src/components/loja/loja.js"></script>
<script src="src/components/loja/lojas.js"></script>
<!-- /components loja -->
<!-- components local-->
<script src="src/components/local/local-geo.js"></script>
<script src="src/components/local/locais-grid.js"></script>
<script src="src/components/local/local.js"></script>
<script src="src/components/local/locais.js"></script>
<script src="src/components/local/local-add.js"></script>
<script src="src/components/local/local-edt.js"></script>
<script src="src/components/local/local-del.js"></script>
<script src="src/components/local/local-cat.js"></script>
<script src="src/components/local/maps.js"></script>
<!-- /components local-->
<!-- components bem -->
<script src="src/components/bem/bens-grid.js"></script>
<script src="src/components/bem/bem-add.js"></script>
<script src="src/components/bem/bem-edt.js"></script>
<script src="src/components/bem/bem-del.js"></script>
<script src="src/components/bem/bens.js"></script>
<!-- /components bem -->
<!-- components os -->
<script src="src/components/os/os-grid.js"></script>
<script src="src/components/os/oss.js"></script>
<script src="src/components/os/os.js"></script>
<script src="src/components/os/os-add.js"></script>
<script src="src/components/os/os-edt.js"></script>
<script src="src/components/os/os-del.js"></script>
<script src="src/components/os/os-tec.js"></script>
<script src="src/components/os/os-amarrac.js"></script>
<script src="src/components/os/lojaOs.js"></script>
<script src="src/components/os/localOs.js"></script>
<!-- /components os -->
<!-- components user -->
<script src="src/components/user/user.js"></script>
<!-- /components user -->
<!-- components _uso -->
<script src="src/components/_uso/message.js"></script>
<!-- /components _uso -->
<!-- components servicos -->
<script src="src/components/servicos/nota/nota-add.js"></script>
<script src="src/components/servicos/nota/nota-edt.js"></script>
<script src="src/components/servicos/tecnico/deslocamento/desloc-add.js"></script>
<script src="src/components/servicos/tecnico/deslocamento/desloc-chg.js"></script>
<script src="src/components/servicos/tecnico/deslocamento/desloc-edt.js"></script>
<script src="src/components/servicos/tecnico/tecnico.js"></script>
<!-- /components servicos -->

<!-- /components servicos -->
<script src="src/home.js"></script>
