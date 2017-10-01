                    <?php
                    $oatId = $value->id;
                    $oatUsuario = $value->nickuser;
                    $oatCliente = $value->cliente;
                    $oatLocalId = $value->localidade;
                    $oatFilial = $value->filial;
                    $oatOs = $value->os;
                    $oatServId = $value->servico;
                    $oatSistId = $value->sistema;
                    $oatData = $value->data;
                    $oatAtivo = $value->ativo;
                    $oatDataSol = $value->data_sol;
                    $oatStatus = $value->status;
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
                    }endforeach; ?>
                  <div class="col-md-4 col-sm-12 col-xs-12">
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
                          <?php if($oatStatus == 1){ ?>
                          <?php echo "<a href='". $redirecionar_1 ."&acao1=consulta&oat=" . $oatId . "' class='btn btn-primary btn-xs'><i class='fa  fa-edit'></i>Consulta</a>"; ?>
                          <?php }else{
                            if($userNivel > 1){
                            ?>
                          <li><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-sm<?php echo $oatId; ?>"><i class='fa  fa-sign-in'></i> OS</button></li>
                          <?php } ?>
                          <li><button type="button" class="btn btn-dark btn-xs" data-toggle="modal" data-target=".modal-oatEdt<?php echo $oatId; ?>"><i class='fa  fa-edit'></i> EDT</a></button></li>
                          <?php echo "<a href='". $redirecionar_1 ."&acao1=deletar&oatId=" . $oatId . "' class='btn btn-danger btn-xs' onclick='return confirm(\"Deseja realmente deletar?\")'><i class='fa  fa-trash-o'></i> DEL</a>"; ?>
                          <?php } ?>
                        </ul>
                      </div>
                      <?php include( $includ_1."amarar.php"); ?>
                      <?php include( $includ_1."edt.php"); ?>
                    </div>
                  </div>