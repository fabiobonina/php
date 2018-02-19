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
                header("Refresh: 1, oat-operacao.php?acao=retorno&acao1=consulta&oat=". $oat );	
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
                header("Refresh: 1, oat-operacao.php?acao=retorno&acao1=consulta&oat=". $oat);	
              }
            }
            
					endif;
          #DELETAR
          	if(isset($_GET['acao2']) && $_GET['acao2'] == 'ativDel'):

							$id = (int)$_GET['cod'];
              $oat = $_GET['oat'];
							if($ativos->delete($id)){
								echo '<div class="alert alert-success">
					          <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Deletado com sucesso!</strong> Redirecionando ...
                    </div>';
                header("Refresh: 1, oat-operacao.php?acao=retorno&acao1=consulta&oat=". $oat);	
							}
						endif;

          #DESCRICAO ADD
          if(isset($_POST['descAdd'])):
            if(!isset($_POST['oat']) OR !isset($_POST['descricao'])){
              echo '<div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Dados incompletos!</strong> Os dados estão incorretos.
                    </div>';
            }else{
              $oat = $_POST['oat'];
              $descricao = $_POST['descricao'];

              $descricoes->setOat($oat);
              $descricoes->setDescricao($descricao);
              # Insert
              if($descricoes->insert()){
                echo '<div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Salva com sucesso!</strong> Redirecionando ...
                      </div>';
                header("Refresh: 1, oat-operacao.php?acao=retorno&acao1=consulta&oat=". $oat );	
              }
            }
          endif;

          #DESCRICAO Editar
          if(isset($_POST['descEdt'])):
            if(!isset($_POST['oat']) OR !isset($_POST['descricao']) OR !isset($_POST['cod'])){
              echo '<div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Dados incompletos!</strong> Os dados estão incorretos.
                    </div>';
            }else{
              $id = $_POST['cod'];
              $oat = $_POST['oat'];
              $descricao = $_POST['descricao'];

              $descricoes->setOat($oat);
              $descricoes->setDescricao($descricao);

              if($descricoes->update($id)){
                echo '<div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Salva com sucesso!</strong> Redirecionando ...
                      </div>';
                header("Refresh: 1, oat-operacao.php?acao=retorno&acao1=consulta&oat=". $oat);	
              }
            }
            
					endif;
          #RETORNAR
          if(isset($_POST['fechar'])):
          if(!isset($_POST['oat'])){
            echo '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Dados incompletos!</strong> Os dados estão incorretos.
                  </div>';
          }else{
            $id = $_POST['oat'];
            $dataFech = date("Y-m-d H:i:s");
            $status = "2";

            $oats->setDataFech($dataFech);
            $oats->setStatus($status);

            if($oats->retorno($id)){
              echo '<div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>OAT Fechada!</strong> Redirecionando ...
                  </div>';
              header("Refresh: 1, oat-operacao.php?acao=retorno");	
            }
          }
            
          endif;

				?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>OAT <small>Abertas</small></h3>
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

            <?php
              if(isset($_GET['acao1'])){
              $acao = $_GET['acao1'];	
              if($acao=='consulta'){include("admin/pages/oat/operacao/retorno/consulta.php");}
              }else{
                  include("admin/pages/oat/operacao/retorno/retorno.php");
              }
            ?>

          </div>
        </div>
        <!-- /page content -->

