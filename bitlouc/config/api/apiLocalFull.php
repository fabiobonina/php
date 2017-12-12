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

  $res = array('error' => true);
  $arDados = array();
  $action = 'cadastrar';

  if(isset($_GET['action'])){
		$action = $_GET['action'];
	}
  
  if($action == 'read'){

    //Montar Array lojas------------------------------------------------------------
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
    $res['error'] = false;
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
  if($action == 'coordenadas'):
    $id = $_POST['id'];
    $lat = $_POST['latitude'];
    $long = $_POST['longitude'];

    $locais->setLat($lat);
    $locais->setLong($long);

    if($locais->geolocalizacso($id)){
      $res['error'] = false;
      $res['message']= "OK, dados salvo com sucesso";
    }else{
      $res['error'] = true; 
      $res['message'] = "Error, nao foi possivel salvar os dados";      
    }
  endif;

  #CADASTRAR
  if($action == 'cadastrar'):
    $loja = $_POST['loja'];
    $tipo = $_POST['tipo'];
    $regional = $_POST['regional'];
    $name = $_POST['name'];
    $municipio = $_POST['municipio'];
    $uf = $_POST['uf'];
    $lat = $_POST['latitude'];
    $long = $_POST['longitude'];
    $ativo = $_POST['ativo'];

    $locais->setLoja($loja);
    $locais->setTipo($tipo);
    $locais->setRegional($regional);
    $locais->setName($name);
    $locais->setMunicipio($municipio);
    $locais->setUf($uf);
    $locais->setLat($lat);
    $locais->setLong($long);
    $locais->setAtivo($ativo);
    # Insert
    if($locais->insert()){
      $res['error'] = false;
      $res['message']= "OK, dados salvo com sucesso";
    }else{
      $res['error'] = true; 
      $res['message'] = "Error, nao foi possivel salvar os dados";      
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

      $locais->setCliente($cliente);
      $locais->setRegional($regional);
      $locais->setNome($nome);
      $locais->setMunicipio($municipio);
      $locais->setUf($uf);
      $locais->setLat($lat);
      $locais->setLong($long);
      $locais->setAtivo($ativo);

      if($locais->update($id)){
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
      
      $locais->setLat($lat);
      $locais->setLong($long);

      if($locais->geolocal($id)){
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
      if($locais->delete($id)){
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