<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.php">SkyHub - System | Apoio Técnico</a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i> Opções <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="../">Visualizar Home</a></li>
              <li><a href="javascript:;">Adicionar Usuários</a></li>
              <li><a href="admin/home.php">Admintrarção do Site</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> <?php echo $userNome;?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Perfil</a></li>
              <li><a href="?sair" onClick="return confirm('Deseja realmente sair do Sistema?')">Sair</a></li>
            </ul>
          </li>
        </ul>
        <form action="index.php?acao=ver-postagens" method="post" enctype="multipart/form-data" class="navbar-search pull-right">
          <input type="text" class="search-query" name="palavra-busca" placeholder="pesquisar">
        </form>
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
<?php if(isset($_GET['acao'])){	$acao = $_GET['acao'];}else{$acao ='index';}?>    
    
      <ul class="mainnav">
        <li <?php if($acao =="welcome" || ($acao =="index")){echo 'class="active"';}?>><a href="index.php"><i class="icon-home"></i><span>Home</span> </a> </li>
        
        <?php if($userNivel >= 0){?>
        <li class="<?php if($acao =="oat-solicitar" || ($acao =="oat-ordemservico") || ($acao =="oat-finalizar") || ($acao =="oat-baixar") || ($acao =="oat-concluidas")){echo "active";}?> dropdown">
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-wrench"></i><span>Ordens de Serviços</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="index.php?acao=oat-solicitar">Solicição de Serviço</a></li>
            <li><a href="index.php?acao=oat-ordemservico">Ordem de Serviço</a></li>
            <li><a href="index.php?acao=oat-finalizar">OS-Finalizar</a></li>
            <li><a href="index.php?acao=oat-baixar">OS-Baixar</a></li>
            <li><a href="index.php?acao=oat-concluidas">OS-Concluidas</a></li>
          </ul>
        </li>
        <?php }?>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i><span>Contatos Técnicos</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Visualizar</a></li>
            <li><a href="#">Cadastrar</a></li>
            <li><a href="#">Editar Perfil</a></li>
          </ul>
        </li>
        <li><a href="#"><i class="icon-globe"></i><span>Manut. Site</span> </a></li>
        <li></li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->