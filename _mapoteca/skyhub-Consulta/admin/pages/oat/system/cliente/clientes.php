				<?php

					$clientes = new Clientes();
						#CADASTRAR
						if(isset($_POST['cadastrar'])):
							$nome = $_POST['nome'];
							$nick =$_POST["nick"];
							$ativo =$_POST["ativo"];

							$clientes->setNome($nome);
							$clientes->setNick($nick);
							$clientes->setAtivo($ativo);
							# Insert
							if($clientes->insert()){
								echo '<div class="alert alert-success">
					          <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Inserido com sucesso!</strong> Redirecionando ...
                    </div>';
                header("Refresh: 1, oat-system.php?acao=clientes");
							}
						endif;
						#ATUALIZAR
						if(isset($_POST['atualizar'])):

							$id = $_POST['id'];
							$nome = $_POST['nome'];
							$nick =$_POST["nick"];
							$ativo =$_POST["ativo"];

							$clientes->setNome($nome);
							$clientes->setNick($nick);
							$clientes->setAtivo($ativo);

							if($clientes->update($id)){
								echo '<div class="alert alert-success">
					          <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Atualizado com sucesso!</strong> Redirecionando ...
                    </div>';
                header("Refresh: 1, oat-system.php?acao=clientes");
							}
						endif;
						#DELETAR
						if(isset($_GET['acao1']) && $_GET['acao1'] == 'deletar'):
							$id = $_GET['id'];
							if($clientes->delete($id)){
								echo '<div class="alert alert-success">
					          <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Deletado com sucesso!</strong> Redirecionando ...
                    </div>';
                header("Refresh: 1, oat-system.php?acao=clientes");
							}
						endif;
				?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Clientes <small>Lista de dados</small></h3>
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
                
                // edt
              if($acao=='edt'){include("admin/pages/oat/system/cliente/edt.php");}	
                // add
              if($acao=='add'){include("admin/pages/oat/system/cliente/add.php");}
              
              }
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
                          <th>#</th>
                          <th>Name</th>
                          <th>Nome Fantasia</th>
                          <th>Ativo</th>
                          <th>Ação</th>
                        </tr>
                      </thead>

                			<?php foreach($clientes->findAll() as $key => $value): ?>
                      <tbody>
                        <tr>
                          <td><?php echo $value->id; ?></td>
                          <td><?php echo $value->nome; ?></td>
                          <td><?php echo $value->nick; ?></td>
                          <td><?php echo $value->ativo; ?></td>
                          <td>
                            <?php echo "<a href='oat-system.php?acao=clientes&acao1=edt&id=" . $value->id . "'><i class='fa  fa-edit'></i>Editar </a>"; ?>
                            <?php echo "<a href='oat-system.php?acao=clientes&acao1=deletar&id=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'><i class='fa  fa-trash-o'></i>Deletar</a>"; ?>
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