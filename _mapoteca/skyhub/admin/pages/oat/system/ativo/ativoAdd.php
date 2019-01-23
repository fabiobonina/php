
         
            <!-- Small modal -->
            <div class="modal fade modal-ativoAdd" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel2"><?php echo $oatCliente; ?> | <?php echo $oatLocal; ?></h4>
                  </div>
                  <form id="demo-form2" data-parsley-validate method="post" action="" class="form-horizontal form-label-left">
                    <div class="modal-body">
                      <h4>Ativo Empresa</h4>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">N° Plaqueta <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="plaqueta" name="plaqueta" required="required" size=11 maxlength=11 class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="oat" value="<?php echo $oatId; ?>">
                        <input type="hidden" name="cliente" value="<?php echo $oatCliente; ?>">
                        <input type="hidden" name="localidade" value="<?php echo $oatLocalId; ?>">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                      <button type="submit" name="ativoAdd" class="btn btn-success">Enviar Ativo</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- /modals -->

            