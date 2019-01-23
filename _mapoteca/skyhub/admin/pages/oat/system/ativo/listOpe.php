            <div class="row">
              <!--Tabela Ativo-->
              <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><small>Ativo </small>
                    <form data-parsley-validate method="get" action="">
                      <a type="submit" href="oat-operacao.php?acao=retorno&acao1=consulta&oat=<?php echo $oatId ?>&acao2=ativAdd" ><i class='fa  fa-plus'></i>Adicionar</a>
		                </form></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="table" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>N.Plaqueta</th>
                          <th>Ação</th>
                        </tr>
                      </thead>

                			<?php foreach($ativos->findAll() as $key => $value):if($value->cliente == $oatCliente && $value->localidade == $oatLocalId ) { 
                         $ativoId = $value->id;
                         $ativoPlaq = $value->plaqueta;
                        ?>
                      <tbody>
                        <tr>
                          <td><?php echo $ativoPlaq; ?></td>
                          <td>
                            <?php echo "<a href='oat-operacao.php?acao=retorno&acao1=consulta&oat=". $oatId ."&acao2=ativEdt&cod=".$ativoId."'><i class='fa  fa-edit'></i>Editar</a>"; ?>
                            <?php echo "<a href='oat-operacao.php?acao=retorno&acao1=consulta&oat=" . $oatId . "&acao2=ativDel&cod=".$ativoId." ' onclick='return confirm(\"Deseja realmente deletar?\")'><i class='fa  fa-trash-o'></i>Deletar</a>"; ?>
                          </td>
                        </tr>
                      </tbody>
                      <?php }endforeach; ?>

                    </table>
                  </div>
                </div>
              </div>
              <!--/Tabela Lista-->
            </div>