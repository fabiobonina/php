      <?php

      $oatId = $_GET['oat'];
      $resultado = $oats->find($oatId);
      $oatUsuario = $resultado->nickuser;
      $oatFilial = $resultado->filial;
      $oatOs = $resultado->os;
      $oatCliente = $resultado->cliente;
      $oatLocalId = $resultado->localidade;           
      $oatServId = $resultado->servico;
      $oatSistId = $resultado->sistema;
      $oatData = $resultado->data;
      $oatAtivo = $resultado->ativo;
      $oatDataSol = $resultado->data_sol;
      $oatStatus = $resultado->status;
      foreach($localidades->findAll() as $key => $value):if($value->id == $oatLocalId) {
          $oatLocal = $value->nome;
          $oatLat = $value->latitude;
          $oatLong = $value->longitude;
      }endforeach;             
      foreach($servicos->findAll() as $key => $value):if($value->id == $oatServId) {
        $oatServico = $value->descricao;
      }endforeach;
      foreach($sistemas->findAll() as $key => $value):if($value->id == $oatSistId) {
        $oatSistema =  $value->descricao;
      }endforeach;
      
      $oatDataSol = $resultado->data_sol; 

      ?>

                  <div class="col-md-5 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2><?php echo $oatCliente; ?> | <?php echo $oatLocal; ?></h2>
                          <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <div class="dashboard-widget-content">
                          <ul class="quick-list">
                            <li><a href="#"><?php echo $oatSistema; ?></a></li>
                            <li><a href="#"><?php echo $oatServico; ?></a></li>
                            <li><a href="#"><?php echo $oatUsuario; ?></a></li>
                            <li><a href="#">Sol. <?php echo $oatDataSol; ?></a></li>
                            <li><a href="#">N° AOT: <?php echo $oatId; ?></a></li>
                          </ul>
                          <div class="sidebar-widget">
                            <h3><?php echo $oatFilial; ?> | <?php echo $oatOs; ?></h3>
                            <canvas width="150" height="80" id="foo" class="" style="width: 70px; height: 20px;"></canvas>
                            <div class="goal-wrapper">
                              <span class="gauge-value pull-left"></span>
                              <span id="gauge-text" class="gauge-value pull"><?php echo $oatData; ?></span>
                              <span id="goal-text" class="goal-value pull-right"></span>
                            </div>
                              <?php 
                              if($oatLat <> 0 && $oatLong <> 0){
                              echo "<a href='https://maps.google.com/maps?q=". $oatLat ."%2C". $oatLong ."&z=17&hl=pt-BR' target='_blank'><img src='images/geolocation.png' alt=''></a>";
                              }else{
                              echo "<a ><img src='images/geolocation-sem.png'></a>";
                              }
                              ?>
                          </div>
                        </div>
                          <div class="ln_solid"></div>
                        <ul class="nav navbar-right panel_toolbox">
                          <form id="demo-form2" data-parsley-validate method="post" action="" class="form-horizontal form-label-left">
                            <input type="hidden" name="oat" value="<?php echo $oatId; ?>"><br />
                            <a href="<?php echo $redirecionar_1; ?>" class="btn btn-primary btn-xs">Voltar</a>
                            <?php if($oatStatus == 1){ ?>
                            <?php echo "<button type='submit' name='fechar' ' onclick='return confirm(\"Deseja realmente Fechar OAT?\")' class='btn btn-success btn-xs'><i class='fa  fa-check-square-o'></i>Encerrar OAT</button>"; ?>
                            <?php } ?>
                          </form>
                        </ul>
                      </div>
                      <?php include( $includ_1."edt.php"); ?>
                    </div>
                  </div>


                  <div class="col-md-5 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Ativos da Empresa</h2>
                          <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <div class="dashboard-widget-content">
                              <?php foreach($ativos->findAll() as $key => $value):if($value->cliente == $oatCliente && $value->localidade == $oatLocalId ) { 
                                $ativoId = $value->id;
                                $ativoPlaq = $value->plaqueta;
                                ?>
                                  <li>
                                    <?php echo $ativoPlaq; ?>
                                    <button type="button" class="btn btn-dark btn-xs" data-toggle="modal" data-target=".modal-ativoEdt<?php echo $ativoId; ?>"><i class='fa  fa-edit'></i> EDT</a></button>
                                    <?php echo "<a href='". $redirecionar_1 ."&acao1=consulta&oat=" . $oatId . "&acao2=ativoDel&cod=".$ativoId." ' class='btn btn-danger btn-xs'' onclick='return confirm(\"Deseja realmente deletar?\")'><i class='fa  fa-trash-o'></i> DEL</a>"; ?>
                                  </li>
                                  <?php include( $includ_ativo."ativoEdt.php"); ?>
                                <?php }endforeach; ?>
                        </div>
                          <div class="ln_solid"></div>
                        <ul class="nav navbar-right panel_toolbox">
                        </ul>
                      </div>
                    </div>
                  </div>
               <!-- Small modal -->
                   

        <?php
          if(isset($_GET['acao2'])){
            $acao = $_GET['acao2'];
           if($acao=='descCons'){include("admin/pages/oat/operacao/finalizar/descCons.php");}	
            // cadastro
           if($acao=='descEdt'){include("admin/pages/oat/operacao/finalizar/descEdt.php");}
          }else{
        ?>
            <div class="row">
              <!--Tabela Lista-->
              <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Descrição do Serviço</h2>
                      <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="dashboard-widget-content">
                          <?php foreach($descricoes->findAll() as $key => $value):if($value->oat == $oatId ) { 
                            $descId = $value->id;
                            $descDescricao =  $value->descricao;
                            ?>

                              <li>
                              <?php echo $value->id; ?>
                              <?php echo $value->descricao; ?>
                              </li>
                              <li>
                                <button type="button" class="btn btn-dark btn-xs" data-toggle="modal" data-target=".modal-descEdt<?php echo $descId; ?>"><i class='fa  fa-edit'></i> EDT</button>
                              </li>
                              <?php include( $includ_desc."descEdt.php"); ?>
                            <?php }endforeach; ?>
                    </div>
                      <div class="ln_solid"></div>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                  </div>
                </div>
              </div>
              <!--/Tabela Lista-->


            </div>
         <?php  }
         include( $includ_ativo."ativoAdd.php");
         ?>

         