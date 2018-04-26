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
              <v-layout justify-center align-center>
                <v-flex text-xs-center>
                  <v-tooltip left>
                    <v-btn icon large :href="source" target="_blank" slot="activator">
                      <v-icon large>code</v-icon>
                    </v-btn>
                    <span>Source</span>
                  </v-tooltip>
                </v-flex>
              </v-layout>
            </v-container>
          </v-content>
          <rodape></rodape>
        </v-app>      
      </main>
    </div>
        
    <?php require_once 'src/components/includes/top.php';?>
    <?php require_once 'src/components/includes/rodape.php';?>
    <?php require_once 'src/components/includes/config.php';?>
    <?php require_once 'src/pages/dashboard.php';?>
    <!-- components proprietario -->
    <?php require_once 'src/components/proprietario/proprietario.php';?>
    <!-- /components proprietario -->
    <!-- components loja -->
    <?php require_once 'src/components/loja/loja-add.php';?>
    <?php require_once 'src/components/loja/loja-del.php';?>
    <?php require_once 'src/components/loja/loja-edt.php';?>
    <?php require_once 'src/components/loja/loja-cat.php';?>
    <?php require_once 'src/components/loja/loja.php';?>
    <?php require_once 'src/components/loja/lojas.php';?>
    <?php require_once 'src/components/loja/lojas-grid.php';?>
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
    <?php require_once 'src/components/bem/bens-grid.php';?>
    <?php require_once 'src/components/bem/bem-add.php';?>
    <?php require_once 'src/components/bem/bem-edt.php';?>
    <?php require_once 'src/components/bem/bem-del.php';?>
    <?php require_once 'src/components/bem/bens.php';?>
    <!-- /components bem -->
    <!-- components os -->
    <?php require_once 'src/components/os/os.php';?>
    <?php require_once 'src/components/os/os-grid.php';?>
    <?php require_once 'src/components/os/os-add.php';?>
    <?php require_once 'src/components/os/os-edt.php';?>
    <?php require_once 'src/components/os/os-del.php';?>
    <?php require_once 'src/components/os/os-tec.php';?> 
    <?php require_once 'src/components/os/os-amarrac.php';?>    
    <?php require_once 'src/components/os/ossLoja.php';?>
    <?php require_once 'src/components/os/ossLocal.php';?>
    <?php require_once 'src/components/os/ossStus.php';?>
    <?php require_once 'src/components/os/ossTec.php';?>
    <?php require_once 'src/components/os/oss.php';?>
    <?php require_once 'src/components/os/ossHome.php';?>
    <!-- /components os -->
    <!-- components user -->
    <?php require_once 'src/components/user/user.php';?>
    <!-- /components user -->
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
<!-- /.content-wrapper -->
<script src="src/components/includes/top.js"></script>
<script src="src/components/includes/rodape.js"></script>
<script src="src/components/includes/config.js"></script>
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

<script src="src/components/os/os.js"></script>
<script src="src/components/os/os-add.js"></script>
<script src="src/components/os/os-edt.js"></script>
<script src="src/components/os/os-del.js"></script>
<script src="src/components/os/os-tec.js"></script>
<script src="src/components/os/os-amarrac.js"></script>
<script src="src/components/os/ossLoja.js"></script>
<script src="src/components/os/ossLocal.js"></script>
<script src="src/components/os/ossStus.js"></script>
<script src="src/components/os/ossTec.js"></script>
<script src="src/components/os/oss.js"></script>
<script src="src/components/os/ossHome.js"></script>
<!-- /components os -->
<!-- components user -->
<script src="src/components/user/user.js"></script>
<!-- /components user -->
<!-- components _uso -->
<script src="src/components/includes/message.js"></script>
<!-- /components _uso -->
<!-- components servicos -->
<script src="src/components/servicos/nota/nota-add.js"></script>
<script src="src/components/servicos/nota/nota-edt.js"></script>
<script src="src/components/servicos/tecnico/deslocamento/desloc-add.js"></script>
<script src="src/components/servicos/tecnico/deslocamento/desloc-chg.js"></script>
<script src="src/components/servicos/tecnico/deslocamento/desloc-edt.js"></script>
<script src="src/components/servicos/tecnico/mod/mod-add.js"></script>
<script src="src/components/servicos/tecnico/mod/mod-edt.js"></script>
<script src="src/components/servicos/tecnico/tecnico.js"></script>
<!-- /components servicos -->
<!-- components projeto -->
<script src="src/components/projeto/projeto.js"></script>
<!-- /components projeto -->
<!-- /components servicos -->
<script src="src/home.js"></script>
