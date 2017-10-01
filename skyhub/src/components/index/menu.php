  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>SkyHub | Web Mobi</span></a>
            </div>
            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $userNome;?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php">Home</a></li>
                      <li><a href="lojaList.php">LojaList</a></li>
                    <?php if($userNivel > 1){ ?>
                      <li><a href="index.php">Dashboard</a></li>
                    <?php } ?>
                    </ul>
                  </li>
                  <?php if($userNivel > 1){ ?>
                  <li><a><i class="fa fa-wrench"></i> OS-Ordem Serviço <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="oat-operacao.php?acao=solicitacao">OS Solicitação</a></li>
                      <li><a href="oat-operacao.php?acao=retorno">OS Retorno</a></li>
                      <?php if($userNivel > 3){ ?>
                      <li><a href="oat-operacao.php?acao=finalizar">Finalizar OAT</a></li>
                      <li><a href="oat-operacao.php?acao=concluidas">OAT Concluidas</a></li>
                      <?php } ?>
                    </ul>
                  </li>
                  <?php } ?>
                </ul>
              </div>
              <?php if($userNivel > 3){ ?>
              <div class="menu_section">
                <h3>Configuração</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-cog"></i> OAT Config <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="oat-system.php?acao=clientes">Clientes</a></li>
                      <li><a href="oat-system.php?acao=localidades">Localidades</a></li>
                      <li><a href="oat-system.php?acao=tecnicos">Tecnicos</a></li>
                      <li><a href="oat-system.php?acao=sistemas">Sistemas</a></li>
                      <li><a href="oat-system.php?acao=servicos">Serviços</a></li>
                      <li><a href="oat-system.php?acao=despesas">Tipo Despesa</a></li>
                      <li><a href="oat-system.php?acao=ativo">Ativo</a></li>
                      <li><a href="oat-system.php?acao=oat">OAT</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    </ul>
                  </li>
                  <?php if($userNivel > 3){ ?>
                  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    </ul>
                  </li>   
                  <?php }?>               
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
              </div>
              <?php } ?>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>