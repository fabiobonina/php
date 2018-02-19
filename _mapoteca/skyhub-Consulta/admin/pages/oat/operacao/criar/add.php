

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Nova Solicitação <small>Insira os dados</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a></li>
                          <li><a href="#">Settings 2</a></li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  
                  <div class="x_content">
                  <form id="demo-form2" data-parsley-validate method="post" action="" class="form-horizontal form-label-left">

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <?php echo '<select id="usuario" name="usuario" class="form-control has-feedback-left" >';
                                echo '<option value =',$userUsuario,'>',$userUsuario,'</option>';
                                foreach($usuarios->findAll() as $key => $value):if($value->ativo == 0) {
                                echo '<option value =',$value->nickuser,'>',$value->nickuser,'</option>';
                                }endforeach;
                                echo '</select><span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>';
                        ?>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="date" class="form-control" name="data" id="inputSuccess3" placeholder="Data">
                        <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="query">Localidade <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="query" name="localidade" required="required" class="form-control col-md-7 col-xs-12">
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
                                echo '<option selected>Escolha um servico...</option>';
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
                                echo '<option selected>Escolha um sistema...</option>';
                                foreach($sistemas->findAll() as $key => $value):if($value->ativo == 0) {
                                echo '<option value =',$value->id,'>',$value->descricao,'</option>';
                                }endforeach;
                                echo '</select></br>';
                            ?>
                        </div>
                      </div>

                      <input type="hidden" name="localId">
                      
		                <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a type="submit" href="oat-operacao.php?acao=criar" class="btn btn-primary">Cancelar</a>
                          <button type="submit" name="solOat" class="btn btn-success">Cadastrar</button>
                        </div>
                      </div>
		                </form>
                  </div>
                </div>
              </div>
            </div>





