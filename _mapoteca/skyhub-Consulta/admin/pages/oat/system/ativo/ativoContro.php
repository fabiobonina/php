          <?php 
            #ATIVO ADD
            if(isset($_POST['ativoAdd'])):
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
                  header("Refresh: 1, $redirecionar_1&acao1=consulta&oat=". $oat );	
                }
              }

            endif;

            #ATIVO Editar
            if(isset($_POST['ativoEdt'])):
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
                  header("Refresh: 1, $redirecionar_1&acao1=consulta&oat=". $oat);	
                }
              }
              
            endif;
            #DELETAR
          	if(isset($_GET['acao2']) && $_GET['acao2'] == 'ativoDel'):

							$id = (int)$_GET['cod'];
              $oat = $_GET['oat'];
							if($ativos->delete($id)){
								echo '<div class="alert alert-success">
					          <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Deletado com sucesso!</strong> Redirecionando ...
                    </div>';
                header("Refresh: 1, $redirecionar_1&acao1=consulta&oat=". $oat);	
							}
						endif;
          ?>