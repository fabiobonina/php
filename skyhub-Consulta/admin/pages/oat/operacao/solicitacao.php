        <?php

          $redirecionar_1 = 'oat-operacao.php?acao=solicitacao';
          $includ_1 = 'admin/pages/oat/system/oat/';
          $tabAcao = 'oat-operacao.php?acao=solicitacao';
          $oatStatus = 0;

          include( "admin/pages/oat/system/oat/oatContr.php");

				?>
        
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>OS <small>Solicitação</small></h3>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
              <div class="clearfix"></div>
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal-oatAdd"><i class='fa  fa-wrench'></i> Solicitar OS</button>
                  </div>
                </div>

                <?php // cadastro
                    include( $includ_1."add.php");
                ?>
                <?php // cadastro
                    include( $includ_1."oatCard.php");
                ?>


              </div>
            </div>
            <!-- /page content -->

