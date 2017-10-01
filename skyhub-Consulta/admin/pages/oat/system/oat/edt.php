                      <div class="modal fade modal-oatEdt<?php echo $oatId; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                              <h4 class="modal-title" id="myModalLabel">Editar Solicitação</h4>
                            </div>
                            <form id="demo-form2" data-parsley-validate method="post" action="" class="form-horizontal form-label-left">
                              <div class="modal-body">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php echo '<select id="usuario" name="usuario" class="form-control has-feedback-left" >';
                                        echo '<option value =', $oatUsuario ,'>',$oatUsuario,'</option>';
                                        foreach($usuarios->findAll() as $key => $value):if($value->ativo == 0) {
                                        echo '<option value =',$value->nickuser,'>',$value->nickuser,'</option>';
                                        }endforeach;
                                        echo '</select><span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>';
                                    ?>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                  <input type="date" id="data" name="data"  value="<?php echo $oatData; ?>" required="required" class="form-control">
                                  <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="query">Localidade <span class="required">*</span></label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="query" name="localidade" value="<?php echo $oatCliente; ?> | <?php echo $oatLocal; ?>" required="required" class="form-control col-md-3 col-xs-12">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class=" col-md-6 col-xs-12">
                                    <ul class="suggestions hideElem"></ul>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Servico <span class="required">*</span></label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <?php echo '<select id="servico" name="servico" class="form-control col-md-7 col-xs-12" >';
                                          echo '<option value =',$oatServId,'>',$oatServico,'</option>';
                                          foreach($servicos->findAll() as $key => $value):if($value->ativo == 0) {
                                          echo '<option value =',$value->id,'>',$value->descricao,'</option>';
                                          }endforeach;
                                          echo '</select></br>';
                                      ?>	
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sistema <span class="required">*</span></label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <?php echo '<select id="sistema" name="sistema" class="form-control col-md-7 col-xs-12" >';
                                          echo '<option value =',$oatSistId,'>',$oatSistema,'</option>';
                                          foreach($sistemas->findAll() as $key => $value):if($value->ativo == 0) {
                                          echo '<option value =',$value->id,'>',$value->descricao,'</option>';
                                          }endforeach;
                                          echo '</select></br>';
                                      ?>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Ativo <span class="required">*</span></label>
                                    <p>
                                      S:<input type="radio" class="flat" name="ativo" id="ativo0" value="0" <?php if($oatAtivo == 0){?>checked="" <?php }?>  required />
                                      N:<input type="radio" class="flat" name="ativo" id="ativo1" value="1" <?php if($oatAtivo == 1){?>checked="" <?php }?>/>
                                    </p>
                                </div>
                                <div class="form-group">
                                  <input type="hidden" name="localId" value="<?php echo $oatLocalId; ?>"><br />
                                  <input type="hidden" name="oatId" value="<?php echo $oatId; ?>">
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                <button type="submit" name="editar" class="btn btn-success">Salvar</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>