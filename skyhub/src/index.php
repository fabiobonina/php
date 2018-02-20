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
    
    <!-- /components servicos -->

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

<!-- /components servicos -->
<script src="src/index.js"></script>
