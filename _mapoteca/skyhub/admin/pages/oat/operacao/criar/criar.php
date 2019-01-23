				<?php

					$oat = new Oats();
          $usuarios = new Usuarios();
          $clientes = new Clientes();
          $localidades = new Localidades();
          $sistemas = new Sistemas();
          $servicos = new Servicos();
						#ADD
						if(isset($_POST['cadastrar'])):
              $user = $_POST['usuario'];
							$localidade = $_POST['localId'];
              foreach($localidades->findAll() as $key => $value):if($value->id == $localidade) {
              $cliente = $value->cliente;
              }endforeach;
              $servico = $_POST['servico'];
              $sistema = $_POST['sistema'];
              $data = $_POST['data'];
              $dataOat = date("Y-m-d H:i:s");
              $status = "0";
              $ativo = "0";

              $oat->setUser($user);
              $oat->setCliente($cliente);
              $oat->setLocalidade($localidade);
              $oat->setServico($servico);
              $oat->setSistema($sistema);
              $oat->setData($data);
              $oat->setDataOat($dataOat);
              $oat->setStatus($status);
              $oat->setAtivo($ativo);
              # Insert
              if($oat->insert()){
                echo '<div class="alert alert-success">
					          <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Inserido com sucesso!</strong> Redirecionando ...
                    </div>';
                 header("Refresh: 1, oat-operacao.php?acao=criar");	
              }

						endif;
						#ATUALIZAR
						if(isset($_POST['editar'])):
              $oatId = $_POST['oatId'];
              $user = $_POST['usuario'];
							$data = $_POST['data'];
							$localidade = $_POST['localId'];
              foreach($localidades->findAll() as $key => $value):if($value->id == $localidade) {
              $cliente = $value->cliente;
              }endforeach;
              $servico = $_POST['servico'];
              $sistema = $_POST['sistema'];
              $dataOat = date("Y-m-d H:i:s");
              $status = "0";
              $ativo = "0";

                $oat->setUser($user);
                $oat->setCliente($cliente);
                $oat->setLocalidade($localidade);
                $oat->setServico($servico);
                $oat->setSistema($sistema);
                $oat->setData($data);
                $oat->setDataOat($dataOat);
                $oat->setStatus($status);
                $oat->setAtivo($ativo);

                if($oat->update($oatId)){
                  echo '<div class="alert alert-success">
					          <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Atualizada com sucesso!</strong> Redirecionando ...
                    </div>';
                  header("Refresh: 1, oat-operacao.php?acao=criar");	
                }
						endif;
						#DELETAR
						if(isset($_GET['acao1']) && $_GET['acao1'] == 'deletar'):
							$oatId = (int)$_GET['oatId'];
							if($oat->delete($oatId)){
								echo '<div class="alert alert-success">
					          <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Deletada com sucesso!</strong> Redirecionando ...
                    </div>';
                header("Refresh: 1, oat-operacao.php?acao=criar");	
							}
						endif;
            
				?>


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>OAT <small>Solicitar</small></h3>
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
            
            // cadastro
           if($acao=='edt'){include("admin/pages/oat/operacao/criar/edt.php");}	
            // exibicao
           if($acao=='add'){include("admin/pages/oat/operacao/criar/add.php");
           }
          
          }
        ?>

            <div class="row">
              <!--Tabela Lista-->
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><small>Solicitadas</small><form data-parsley-validate method="get" action="">
                      <a type="submit" href="oat-operacao.php?acao=criar&acao1=add" ><i class='fa  fa-plus'></i>Adicionar</a>
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
                    <?php
                      if($userNivel == 0){include("admin/pages/oat/operacao/criar/oatUser.php");}
                      else{include("admin/pages/oat/operacao/criar/oatAdm.php");}
                    ?>
                  </div>
                </div>
              </div>
              <!--/Tabela Lista-->
            </div>
          </div>
        </div>
        <!-- /page content -->

