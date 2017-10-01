<?php
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
                header("Refresh: 1, $redirecionar_1&acao1=consulta&oat=". $oat );	
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
                header("Refresh: 1, $redirecionar_1&acao1=consulta&oat=". $oat);	
              }
            }
            
		    endif;
?>