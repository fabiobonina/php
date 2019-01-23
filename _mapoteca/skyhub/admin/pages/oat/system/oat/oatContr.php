<?php
    $oats = new Oats();
    $usuarios = new Usuarios();
    $clientes = new Clientes();
    $localidades = new Localidades();
    $sistemas = new Sistemas();
    $servicos = new Servicos();
    $descricoes = new Descricoes();
    $ativos = new Ativos();
    
    #ADD
    if(isset($_POST['solOat'])):
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

    $oats->setUser($user);
    $oats->setCliente($cliente);
    $oats->setLocalidade($localidade);
    $oats->setServico($servico);
    $oats->setSistema($sistema);
    $oats->setData($data);
    $oats->setDataOat($dataOat);
    $oats->setStatus($status);
    $oats->setAtivo($ativo);
    # Insert
    if($oats->insert()){
    echo '<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Inserido com sucesso!</strong> Redirecionando ...
    </div>';
    header("Refresh: 1, $redirecionar_1");
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

    $oats->setUser($user);
    $oats->setCliente($cliente);
    $oats->setLocalidade($localidade);
    $oats->setServico($servico);
    $oats->setSistema($sistema);
    $oats->setData($data);
    $oats->setDataOat($dataOat);
    $oats->setStatus($status);
    $oats->setAtivo($ativo);

    if($oats->update($oatId)){
    echo '<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Atualizada com sucesso!</strong> Redirecionando ...
    </div>';
    header("Refresh: 1, $redirecionar_1");	
    }
    endif;
    #AMARAR
    if(isset($_POST['amarar'])):
        if(!isset($_POST['filial']) OR !isset($_POST['os'])){
              echo '<div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Dados incompletos!</strong> Os dados estão incorretos.
                    </div>';
        }else{
            $id = $_POST['id'];
            $filial = $_POST['filial'];
            $os = $_POST['os'];
            $dataOs = date("Y-m-d H:i:s");
            $status = "1";

            $oats->setFilial($filial);
            $oats->setOs($os);
            $oats->setDataOs($dataOs);
            $oats->setStatus($status);

            if($oats->amarar($id)){
            echo '<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>OS amarada com sucesso!</strong> Redirecionando ...
                </div>';
            header("Refresh: 1, $redirecionar_1");
            }
        }
    endif;

    #DELETAR
    if(isset($_GET['acao1']) && $_GET['acao1'] == 'deletar'):
    $oatId = (int)$_GET['oatId'];
    if($oats->delete($oatId)){
    echo '<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Deletada com sucesso!</strong> Redirecionando ...
    </div>';
    header("Refresh: 1, $redirecionar_1");	
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