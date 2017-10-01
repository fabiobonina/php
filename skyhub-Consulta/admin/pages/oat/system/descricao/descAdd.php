           <!-- Small modal -->
            <div class="modal fade modal-descAdd" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel2"><?php echo $oatCliente; ?> | <?php echo $oatLocal; ?></h4>
                  </div>
                  <form id="demo-form2" data-parsley-validate method="post" action="" class="form-horizontal form-label-left">
                    <div class="modal-body">
                      <h4>Descrição do Serviço</h4>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="hidden" name="oat" value="<?php echo $oatId; ?>"><br />
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Descrição <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea class="form-control" name="descricao" rows="15" placeholder="Descrição do Serviço">
OCORRENCIA: 
CAUSA: 
SOLUCAO: 
DATA E HORA INICIAL: 
DATA E HORA FINAL: 
KM INICIAL: 
KM FINAL: 
-----GASTOS GERAIS----
PECAS: 
ALIMENTACAO: 
HOSPEDAGEM: 
ETC: 
                          </textarea>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                      <button type="submit" name="descAdd" class="btn btn-success"> Enviar Desc. Serviço</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- /modals -->