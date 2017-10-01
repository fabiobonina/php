				<?php

					$oats = new Oats();
          $usuarios = new Usuarios();
          $clientes = new Clientes();
          $localidades = new Localidades();
          $sistemas = new Sistemas();
          $servicos = new Servicos();
          $descricoes = new Descricoes();
          $ativos = new Ativos();

          #ATIVO ADD
          if(isset($_POST['ativAdd'])):
            if(!isset($_POST['cliente']) OR !isset($_POST['localidade']) OR !isset($_POST['plaqueta'])){
              echo '<div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Dados incompletos!</strong> Os dados estão incorretos.
                    </div>';
            }else{
              $oat = $_POST['oat'];
              $cliente = $_POST['cliente'];
              $localidade = $_POST['localidade'];
              $plaqueta = $_POST['plaqueta'];
              $data = date("Y-m-d H:i:s");

              $ativos->setCliente($cliente);
              $ativos->setLocalidade($localidade);
              $ativos->setPlaqueta($plaqueta);
              $ativos->setData($data);
              # Insert
              if($ativos->insert()){
                echo '<div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Salva com sucesso!</strong> Redirecionando ...
                      </div>';
                header("Refresh: 1, oat-system.php?acao=oat&acao1=consulta&oat=". $oat );	
              }
            }
          endif;

          #ATIVO Editar
          if(isset($_POST['ativEdt'])):
            if(!isset($_POST['localId']) OR !isset($_POST['plaqueta']) OR !isset($_POST['ativo'])){
              echo '<div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Dados incompletos!</strong> Os dados estão incorretos.
                    </div>';
            }else{
              $id = $_POST['ativo'];
              $oat = $_POST['oat'];
              $localId = $_POST['localId'];
              foreach($localidades->findAll() as $key => $value):if($value->id == $localId) {
                $cliente = $value->cliente;
              }endforeach;       
              $plaqueta = $_POST['plaqueta'];
              $data = date("Y-m-d H:i:s");

              $ativos->setCliente($cliente);
              $ativos->setLocalidade($localId);
              $ativos->setPlaqueta($plaqueta);
              $ativos->setData($data);

              if($ativos->update($id)){
                echo '<div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Salva com sucesso!</strong> Redirecionando ...
                      </div>';
                header("Refresh: 1, oat-system.php?acao=oat&acao1=consulta&oat=". $oat);	
              }
            }
					endif;
          #ATIVO DELETAR
          	if(isset($_GET['acao2']) && $_GET['acao2'] == 'ativDel'):

							$id = $_GET['cod'];
              $oat = $_GET['oat'];
							if($ativos->delete($id)){
								echo '<div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Deletado com sucesso!</strong> Redirecionando ...
                      </div>';
                header("Refresh: 1, oat-system.php?acao=oat&acao1=consulta&oat=". $oat);	
							}
						endif;


				?>





            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista<small>Clientes</small><form data-parsley-validate method="get" action="">
                      <a type="submit" href="oat-system.php?acao=clientes&acao1=add" ><i class='fa  fa-plus'></i>Adicionar</a>
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
                    <p class="text-muted font-13 m-b-30">
                      Dados da tabela.
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                   <thead>
                        <tr>
                          <th>N.Plaqueta</th>
                          <th>Ação</th>
                        </tr>
                      </thead>

                			<?php foreach($ativos->findAll() as $key => $value): 
                         $ativoId = $value->id;
                         $ativoPlaq = $value->plaqueta;
                        ?>
                      <tbody>
                        <tr>
                          <td><?php echo $ativoPlaq; ?></td>
                          <td>
                            <?php echo "<a href='oat-system.php?acao=retorno&acao1=consulta&oat=". $oatId ."&acao2=ativEdt&cod=".$ativoId."'><i class='fa  fa-edit'></i>Editar</a>"; ?>
                            <?php echo "<a href='oat-system.php?acao=retorno&acao1=consulta&oat=" . $oatId . "&acao2=ativDel&cod=".$ativoId." ' onclick='return confirm(\"Deseja realmente deletar?\")'><i class='fa  fa-trash-o'></i>Deletar</a>"; ?>
                          </td>
                        </tr>
                      </tbody>
                      <?php endforeach; ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->