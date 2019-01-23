				<?php

					$localidades = new Localidades();
          $clientes = new Clientes();

          $redirecionar_1 = 'oat-system.php?acao=localidades';
          $includ_1 = 'admin/pages/oat/system/localidade/';

						#CADASTRAR
						if(isset($_POST['cadastrar'])):
              $cliente = $_POST['cliente'];
              $regional = $_POST['regional'];
              $nome = $_POST['nome'];
              $municipio = $_POST['municipio'];
              $uf = $_POST['uf'];
							$lat = $_POST['lat'];
							$long =$_POST["long"];
							$ativo = $_POST["ativo"];

							$localidades->setCliente($cliente);
							$localidades->setRegional($regional);
              $localidades->setNome($nome);
							$localidades->setMunicipio($municipio);
							$localidades->setUf($uf);
              $localidades->setLat($lat);
							$localidades->setLong($long);
							$localidades->setAtivo($ativo);
							# Insert
							if($localidades->insert()){
								echo '<div class="alert alert-success">
					          <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Inserido com sucesso!</strong> Redirecionando ...
                    </div>';
                header("Refresh: 1, ".$redirecionar_1);	
							}
						endif;
						#ATUALIZAR
						if(isset($_POST['atualizar'])):

							$id = $_POST['id'];
              $cliente = $_POST['cliente'];
              $regional = $_POST['regional'];
              $nome = $_POST['nome'];
              $municipio = $_POST['municipio'];
              $uf = $_POST['uf'];
							$lat = $_POST['lat'];
							$long =$_POST["long"];
							$ativo =$_POST["ativo"];

							$localidades->setCliente($cliente);
							$localidades->setRegional($regional);
              $localidades->setNome($nome);
							$localidades->setMunicipio($municipio);
							$localidades->setUf($uf);
              $localidades->setLat($lat);
							$localidades->setLong($long);
							$localidades->setAtivo($ativo);

							if($localidades->update($id)){
								echo '<div class="alert alert-success">
				          <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Atualizado com sucesso!</strong> Redirecionando ...
                  </div>';
                header("Refresh: 1, ".$redirecionar_1);
							}
						endif;
            #GEOLOCALIZAÇÃO
						if(isset($_POST['geolocal'])):

							$id = $_POST['localId'];
              $geolocalizacao = $_POST['geolocalizacao'];
              $array=explode(",",$geolocalizacao); 
           
							$lat = $array[0];
							$long =$array[1];
							
              $localidades->setLat($lat);
							$localidades->setLong($long);

							if($localidades->geolocal($id)){
								echo '<div class="alert alert-success">
				          <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Inserido com sucesso!</strong> Redirecionando ...
                  </div>';
                header("Refresh: 1, ".$redirecionar_1);	
							}
						endif;
						#DELETAR
						if(isset($_GET['acao1']) && $_GET['acao1'] == 'deletar'):
							$id = (int)$_GET['id'];
							if($localidades->delete($id)){
								echo '<div class="alert alert-success">
					          <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Deletado com sucesso!</strong> Redirecionando ...
                    </div>';
                header("Refresh: 1, ".$redirecionar_1);
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
                  
                if($acao=='add'){include( $includ_1."add.php");}	
                  // cadastro
                if($acao=='edt'){include( $includ_1."edt.php");}

                if($acao=='geo'){include( $includ_1."geoLocal.php");}

                }
              ?>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista<small>Clientes</small>
                    <form data-parsley-validate method="get" action="">
                      <a type="submit" href="oat-system.php?acao=localidades&acao1=add" ><i class='fa  fa-plus'></i>Adicionar</a>
		                </form></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-bars"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="oat-system.php?acao=localidades&acao1=geo"><i class="fa fa-map-marker"></i>  Localização</a>
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
                          <th>Cliente</th>
                          <th>Regional</th>
                          <th>Name</th>
                          <th>Municipio</th>
                          <th>UF</th>
                          <th>Latitude</th>
                          <th>Longitude</th>
                          <th>Ativo</th>
                          <th>Ação</th>
                        </tr>
                      </thead>
                			<?php foreach($localidades->findAll() as $key => $value): ?>
                      <tbody>
                        <tr>
                          <td><?php echo $value->id; ?></td>
                          <td><?php echo $value->cliente; ?></td>
                          <td><?php echo $value->regional; ?></td>
                          <td><?php echo $value->nome; ?></td>
                          <td><?php echo $value->municipio; ?></td>
                          <td><?php echo $value->uf; ?></td>
                          <td><?php echo $value->latitude; ?></td>
                          <td><?php echo $value->longitude; ?></td>
                          <td><?php echo $value->ativo; ?></td>
                          <td>
                            <?php echo "<a href='oat-system.php?acao=localidades&acao1=edt&id=" . $value->id . "'><i class='fa  fa-edit'></i>Editar </a>"; ?>
                            <?php echo "<a href='oat-system.php?acao=localidades&acao1=deletar&id=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'><i class='fa  fa-trash-o'></i>Deletar</a>"; ?>
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