<style>
  .vue-modal-mask {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, .5);
    display: table;
    transition: opacity .3s ease;
  }
  
  .vue-modal-wrapper {
    display: table-cell;
    vertical-align: middle;
  }
  
  .vue-modal-container {
    width: auto;
    max-width: 70%;
    margin: 0px auto;
    padding: 20px 30px;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
    transition: all .3s ease;
    font-family: Helvetica, Arial, sans-serif;
  }
  
  .vue-modal-header h3 {
    margin-top: 0;
    color: #3270ad;
  }
  
  .vue-modal-body {
    margin: 25px 0;
    h4 {
      color: #52575d;
    }
  }
  
  .vue-modal-footer {
    min-height: 20px;
  }
  
  .vue-modal-default-button {
    float: right;
  }
  
  #unsupported-banner {
    z-index: 999999;
    position: fixed;
    top: 0;
    right: 0;
    left: 0;
    background: #ea3030;
    width: 100%;
    border-bottom: 1px solid #EEEEEE;
    padding: 10px;
    box-sizing: border-box;
    transform: translateY(-150%);
    color: #FFFFFF;
    font-family: "Open Sans", sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    animation: vue-banner-slide-in 0.8s ease forwards;
  }
  
  .modal-enter {
    opacity: 0;
  }
  
  .modal-leave-active {
    opacity: 0;
  }
  
  .modal-enter .modal-container,
  .modal-leave-active .modal-container {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
  }
  
  @keyframes vue-banner-slide-in {
    0% {
      transform: translateY(-150%);
    }
    
    100% {
      transform: translateY(0%);
    }
  }
</style>
<!-- Full Width Column -->
<div class="content-wrapper">
  <div class="container">
    <div>
      <main id="app">
        <div>
          <index></index>
          <configuracao></configuracao>
          <router-view></router-view>
        </div>    
      </main>
    </div>
        
    <?php include("src/pages/index.php");?>
    <?php include("src/pages/config.php");?>
    <!-- components local -->
    <?php include("src/components/local/geolocalizacao.php");?>
    <?php include("src/components/local/locais-grid.php");?>
    <?php include("src/components/local/local.php");?>
    <?php include("src/components/local/localAdd.php");?>
    <!-- /components local-->
    <!-- components loja -->
    <?php include("src/components/loja/lojas.php");?>
    <?php include("src/components/loja/lojas-grid.php");?>
    <?php include("src/components/loja/loja.php");?>
    <!-- /components loja -->
    <!-- components bem -->
    <?php include("src/components/bem/bens-grid.php");?>
    <?php include("src/components/bem/bemAdd.php");?>
    <!-- /components bem -->

    <template id="naoEncrontrado">
      <h2>No encuentro: 404</h2>
    </template>
  </div>
<!-- /.container -->
</div>
<!-- /.content-wrapper -->
<script src="src/pages/index.js"></script>
<script src="src/pages/config.js"></script>
<!-- components local-->
<script src="src/components/local/geolocalizacao.js"></script>
<script src="src/components/local/locais-grid.js"></script>
<script src="src/components/local/local.js"></script>
<script src="src/components/local/localAdd.js"></script>
<!-- /components local-->
<!-- components loja -->
<script src="src/components/loja/lojas-grid.js"></script>
<script src="src/components/loja/loja.js"></script>
<script src="src/components/loja/lojas.js"></script>
<!-- /components loja -->
<!-- components bem -->
<script src="src/components/bem/bens-grid.js"></script>
<script src="src/components/bem/bemAdd.js"></script>
<!-- /components bem -->
<script src="appLoja.js"></script>
