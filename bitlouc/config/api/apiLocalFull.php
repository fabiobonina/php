<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');



  function __autoload($class_name){
		require_once '../classes/' . $class_name . '.php';
	}

  $usuarios = new Usuarios();
  $loja = new Loja();
  $locais = new Locais();
  $sistemas = new Sistema();
  $grupo = new Grupo();
  $lojaGrupo = new LojaGrupo();
  $descricao = new Descricao();
  $ativos = new Ativos();

  $res = array('error' => false);
  $action = 'read';

  if(isset($_GET['action'])){
		$action = $_GET['action'];
	}


  if($action == 'read'){

    //Montar Array lojas------------------------------------------------------------
    $arDados = array();
    foreach($loja->findAll() as $key => $value): {
      
      $arLoja = (array) $value; //Loja
      $lojaId = $value->id;

      //Montar Array locais-------------------------------------------------------
      $arrayLocais = array();
      $cont_localGeo = 0;
      foreach($locais->findAll() as $key => $value):if($value->loja == $lojaId) {
        $arLocal = (array) $value;
        if( $value->latitude <> 0.00000 && $value->longitude <> 0.00000){
          $cont_localGeo++;
        }
        array_push($arrayLocais, $arLocal );
      }endforeach;
      $locaisTt = count($arrayLocais);
      if($locaisTt > 0){
        $geoStatus = round(($cont_localGeo/$locaisTt)*100, 1);
       }else{
         $geoStatus = 0;
       }
      
      $arLoja['locais']= $arrayLocais;
      $arLoja['locaisQt']= $locaisTt;
      $arLoja['locaisGeoQt']= $cont_localGeo;
      $arLoja['locaisGeoStatus']= $geoStatus;
      //Montar Array locais------------------------------------------------------

      //Montar Array produtos----------------------------------------------------
      $arProdutos = array();
      foreach($lojaGrupo->findAll() as $key => $value):if($value->loja == $lojaId) {
        $grupoId = $value->produto;
        foreach($grupo->findAll() as $key => $value):if($value->id == $grupoId) {
          $arProduto = (array) $value;
          array_push($arProdutos, $arProduto );
        }endforeach;
      }endforeach;

      $arLoja['produtos']= $arProdutos;
      //Montar Array produtos----------------------------------------------------


      array_push($arDados, $arLoja);
          
    }endforeach;
    //Montar Array lojas------------------------------------------------------------

  }


  if($action == 'loja'){
    $dados = array();
    $lojaId = $_POST['lojaId'];

    foreach($loja->findAll() as $key => $value):if($value->id == $lojaId) {
      $loja = (array) $value;
      $locais = array();
      foreach($locais->findAll() as $key => $value):if($value->loja == $lojaId) {
        $local = (array) $value;
        array_push($locais, $local );
      }endforeach;

      $loja['locais']= $locais;
      $dados = $loja;
    }endforeach;
    
  }
  #GEOLOCALIZAÇÃO
  if($action == 'geolocalizacao'){
    $id = $_POST['id'];
    $geolocalizacao = $_POST['geolocalizacao'];
    $array=explode(",",$geolocalizacao); 
  
    $lat = $array[0];
    $long =$array[1];
    
    $localidades->setLat($lat);
    $localidades->setLong($long);

    if($localidades->geolocal($id)){
      $item['status']= 'OK';
      $dados = $item;
    }else{
      $res['error'] = true; 
      $res['message'] = "Error, não foi possivel salvar os dados";      
    }
  }
  $localidades = new Localidades();
  $clientes = new Clientes();

  $redirecionar_1 = 'oat-system.php?acao=localidades';
  $includ_1 = 'admin/pages/oat/system/localidade/';

    #CADASTRAR
    if($action == 'read'):
      $loja = $_POST['loja'];
      $regional = $_POST['regional'];
      $name = $_POST['name'];
      $municipio = $_POST['municipio'];
      $uf = $_POST['uf'];

      $coordenadas = $_POST['coordenadas'];
      $array=explode(",",$coordenadas); 
      $lat = $array[0];
      $long =$array[1];
      $ativo = $_POST["ativo"];

      $localidades->setLoja($loja);
      $localidades->setRegional($regional);
      $localidades->setName($name);
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

    
  $res['dados'] = $arDados;
  header("Content-Type: application/json");
  echo json_encode($res);