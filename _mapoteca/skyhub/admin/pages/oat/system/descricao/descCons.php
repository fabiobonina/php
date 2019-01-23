
      <!-- Small modal -->
      <div class="modal fade modal-descCons<?php echo $descId; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Descrição <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <textarea class="form-control" name="descricao" rows="15" placeholder="Descrição do Serviço"><?php echo $resultado->descricao; ?></textarea>
                  </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                <input type="hidden" name="cod" value="<?php echo $descId; ?>" class="form-control col-md-7 col-xs-12" >
                <input type="hidden" name="oat" value="<?php echo $oatId; ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="submit" name="descCons" class="btn btn-success">Enviar Desc. Serviço</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /modals -->