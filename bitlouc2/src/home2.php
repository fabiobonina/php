<!-- Full Width Column -->
<div>
  <div>
    <div>
      <main id="app">
        <v-app id="inspire">
          
          <top></top>
          <v-content>
            <v-container fluid fill-height>
              <configuracao></configuracao>
              <router-view></router-view>
            </v-container>
          </v-content>
          <rodape></rodape>
          
        </v-app>      
      </main>
    </div>

    <!-- components proprietario -->
    <?php require_once 'src/components/proprietario/proprietario.php';?>
    <!-- /components proprietario -->
    <!-- components loja -->    
    
    <!-- /components loja -->
    <!-- components local -->
    <?php require_once 'src/components/local/local-geo.php';?>
    <?php require_once 'src/components/local/locais-grid.php';?>
    <?php require_once 'src/components/local/local.php';?>
    <?php require_once 'src/components/local/locais.php';?>
    <?php require_once 'src/components/local/local-add.php';?>
    <?php require_once 'src/components/local/local-edt.php';?>
    <?php require_once 'src/components/local/local-del.php';?>
    <?php require_once 'src/components/local/local-cat.php';?>
    <?php require_once 'src/components/local/maps.php';?>
    <!-- /components local-->
    <!-- components bem -->
    
    <!-- /components bem -->
    <!-- components os -->
    <?php require_once 'src/components/atendimento/os/os.php';?>
    <?php require_once 'src/components/atendimento/os/os-grid.php';?>
    <?php require_once 'src/components/atendimento/os/os-add.php';?>
    <?php require_once 'src/components/atendimento/os/os-edt.php';?>
    <?php require_once 'src/components/atendimento/os/os-del.php';?>
    <?php require_once 'src/components/atendimento/os/os-tec.php';?> 
    <?php require_once 'src/components/atendimento/os/os-amarrac.php';?>    
    <?php require_once 'src/components/atendimento/os/ossLoja.php';?>
    <?php require_once 'src/components/atendimento/os/ossLocal.php';?>
    <!-- /components os -->
    <!-- components _uso -->
    <?php require_once 'src/components/includes/message.php';?>
    <!-- /components _usor -->
    <!-- components servicos -->
    <?php require_once 'src/components/servicos/nota/nota-add.php';?>
    <?php require_once 'src/components/servicos/nota/nota-edt.php';?>
    <?php require_once 'src/components/servicos/tecnico/deslocamento/desloc-add.php';?>
    <?php require_once 'src/components/servicos/tecnico/deslocamento/desloc-chg.php';?>
    <?php require_once 'src/components/servicos/tecnico/deslocamento/desloc-edt.php';?>
    <?php require_once 'src/components/servicos/tecnico/mod/mod-add.php';?>
    <?php require_once 'src/components/servicos/tecnico/mod/mod-edt.php';?>
    <?php require_once 'src/components/servicos/tecnico/tecnico.php';?>
    <!-- /components servicos -->
    <!-- components projeto -->
    <?php require_once 'src/components/projeto/projeto.php';?>
    <!-- /components projeto -->

    <template id="naoEncontrado">
      <div><h2>Pagina não encontrado: 404</h2></div>
    </template>
  </div>
<!-- /.container -->
</div>

<script src="src/components/servicos/tecnico/tecnico.js"></script>
<script src="src/home.js"></script>
