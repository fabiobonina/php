<?php
  header("Access-Control-Allow-Origin: *");
  header('Content-Type: text/html; charset=utf-8');

  require_once '_chave.php';

  function __autoload($class_name){
    require_once '../model/' . $class_name . '.php';
  }

  $lojas            = new Loja();
  $lojaCategorias   = new LojaCategorias();
  $locais           = new Local();
  $localCategorias  = new LocalCategorias();
  $categorias       = new Categorias();

  $res = array('error' => false);
  $arDados = array();
  $arErros = array();
  $arLojas = array();
  $action = 'read';

  if(isset($_GET['action'])){
    $action = $_GET['action'];
  }

  if($action == 'read'){

    //Montar Array lojas------------------------------------------------------------
    foreach($lojas->findAll() as $key => $value): {
      
      $arLoja = (array) $value; //Loja
      $lojaId = $value->id;

      //Montar Array locais-------------------------------------------------------
      $arrayLocais = array();
      $cont_localGeo = 0;
      $arLocalCategoria = array();
      foreach($locais->findAll() as $key => $value):if($value->loja == $lojaId) {
        
        $arLocal = (array) $value;
        $localId = $value->id;

        if( $value->latitude <> 0.00000 && $value->longitude <> 0.00000){
          $cont_localGeo++;
        }

        //Montar Array categoria----------------------------------------------------
        $arCategorias = array();
        foreach($localCategorias->findAll() as $key => $value):if($value->local == $localId) {
          $categoriaId = $value->categoria;
          foreach($categorias->findAll() as $key => $value):if($value->id == $categoriaId) {
            $arCategoria = (array) $value;
            array_push($arCategorias, $arCategoria );
          }endforeach;
        }endforeach;

        $arLocal['categoria']= $arCategorias;
        //Montar Array categoria----------------------------------------------------
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

      //Montar Array categorias----------------------------------------------------
      $arCategorias = array();
      foreach($lojaCategorias->findAll() as $key => $value):if($value->loja == $lojaId) {
        $categoriasId = $value->categoria;
        foreach($categorias->findAll() as $key => $value):if($value->id == $categoriasId) {
          $arCategoria = (array) $value;
          array_push($arCategorias, $arCategoria );
        }endforeach;
      }endforeach;

      $arLoja['categoria']= $arCategorias;
      //Montar Array categorias----------------------------------------------------


      array_push($arLojas, $arLoja);
          
    }endforeach;
    //Montar Array lojas------------------------------------------------------------
  }
  #CADASTRAR-----------------------------------------------------------------------------
  if($action == 'cadastrar'):
    #Novo Usuario
    $name  = $_POST['name'];
    $nick = $_POST['nick'];
    $proprietario = $_POST['proprietario'];
    $grupo = $_POST['grupo'];
    $seguimento = $_POST['seguimento'];
    $categoria = '';
    if( isset($_POST['categoria']) ):
      $categoria = json_encode($_POST['categoria'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    endif;
    $ativo = $_POST['ativo'];

    //$name  = 'Fabio';
    //$email = 'fabiobonina@gmail.com';
    //$user = 'Fabio Bonina';
    //$senha = 'password';

    #LOJAS-------------------------------------------------------------------------------------------
    $duplicado = false;
    $acentos = array(
      'À', 'Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ò','Ó','Ô','Õ','Ö','Ù','Ú','Û','Ü','Ý',
      'à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ð','ò','ó','ô','õ','ö','ù','ú','û','ü','ý','ÿ', ' '
    );
    $sem_acentos = array(
      'A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','O','O','O','O','O','U','U','U','U','Y',
      'a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','o','o','o','o','o','o','u','u','u','u','y','y', '_'
    );
    foreach($lojas->findAll() as $key => $value): {
      $txtnome2 = $value->nick;
      $txtnome1 = str_replace($acentos, $sem_acentos, $nick);
      $txtnome2 = str_replace($acentos, $sem_acentos, $txtnome2);
      
      if(strtolower(utf8_decode($txtnome1)) == strtolower(utf8_decode($txtnome2))):
        $duplicado = true;
        $res['error'] = true;
        $arError = "Error, Nome Fantasia da loja já ultilizado!";
        array_push($arErros, $arError);
      endif;
    }endforeach;
    #LOJAS-------------------------------------------------------------------------------------------
      
    $data = date("Y-m-d");
    
    if($duplicado == false):
      $lojas->setName($name);
      $lojas->setNick($nick);
      $lojas->setProprietario($proprietario);
      $lojas->setGrupo($grupo);
      $lojas->setSeguimento($seguimento);
      $lojas->setData($data);
      $lojas->setAtivo($ativo);
      $lojas->setCategoria($categoria);
      # Insert
      if($lojas->insert()){
        $res['error'] = false;
        $arDados = "OK, dados registrado com sucesso";
        $res['message']= $arDados;
      }else{
        $res['error'] = true; 
        $arError = "Error, nao foi possivel salvar os dados";
        array_push($arErros, $arError);
      }
    endif;

    if($res['error'] == true){
      $res['message']= $arErros;
    }

  endif;
  #CADASTRAR-----------------------------------------------------------------------------

  #EDITAR-------------------------------------------------------------------------------
  if($action == 'editar'):
    #editar
    $name  = $_POST['name'];
    $nick = $_POST['nick'];
    $grupo = $_POST['grupo'];
    $seguimento = $_POST['seguimento'];
    $ativo = $_POST['ativo'];
    $id = $_POST['id'];

    #LOJAS-------------------------------------------------------------------------------------------
    $duplicado = false;
    $acentos = array(
      'À', 'Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ò','Ó','Ô','Õ','Ö','Ù','Ú','Û','Ü','Ý',
      'à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ð','ò','ó','ô','õ','ö','ù','ú','û','ü','ý','ÿ', ' '
    );
    $sem_acentos = array(
      'A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','O','O','O','O','O','U','U','U','U','Y',
      'a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','o','o','o','o','o','o','u','u','u','u','y','y', '_'
    );
    foreach($lojas->findAll() as $key => $value): {
      $txtnome2 = $value->nick;
      $itemId = $value->id;
      $txtnome1 = str_replace($acentos, $sem_acentos, $nick);
      $txtnome2 = str_replace($acentos, $sem_acentos, $txtnome2);
      
      if(($id != $itemId ) && ( strtolower(utf8_decode($txtnome1)) == strtolower(utf8_decode($txtnome2)) ) ):
        $duplicado = true;
        $res['error'] = true;
        $arError = "Error, Nome Fantasia da loja já ultilizado!";
        array_push($arErros, $arError);
      endif;
    }endforeach;
    #LOJAS-------------------------------------------------------------------------------------------
    
    if($duplicado == false):
      $lojas->setName($name);
      $lojas->setNick($nick);
      $lojas->setGrupo($grupo);
      $lojas->setSeguimento($seguimento);
      $lojas->setAtivo($ativo);
      # Insert
      if($lojas->update($id)){
        $res['error'] = false;
        $arDados = "OK, dados registrado com sucesso";
        $res['message']= $arDados;
      }else{
        $res['error'] = true; 
        $arError = "Error, nao foi possivel salvar os dados";
        array_push($arErros, $arError);
      }
    endif;

    if( ($res['error'] == true) && (isset($arErros)) ){
      $res['message']= $arErros;
    }

  endif;
  #EDITAR-------------------------------------------------------------------------------

  #DELETAR-----------------------------------------------------------------------------
  if($action == 'deletar'):
    #delete
    $id = $_POST['id'];
    if($lojas->delete($id)){
      if($lojaCategorias->deleteLoja($id)){
      $res['error'] = false;
      $arDados = "OK, registro deletado";
      $res['message']= $arDados;
      }else{
        $res['error'] = true; 
        $arError = "Error, nao foi possivel deletar os dados";
        array_push($arErros, $arError);
      }
    }else{
      $res['error'] = true; 
      $arError = "Error, nao foi possivel deletar os dados";
      array_push($arErros, $arError);
    }

    if( ($res['error'] == true) && (isset($arErros)) ){
      $res['message']= $arErros;
    }

  endif;
  #DELETAR-----------------------------------------------------------------------------

  #CATEGORIA-ATIVO----------------------------------------------------------------------
  if($action == 'catStatus'):
    $ativo = $_POST['ativo'];
    $id     = $_POST['id'];

    $lojaCategorias->setAtivo($ativo);

    if($lojaCategorias->update($id)){
      $res['error'] = false;
      $arDados = "OK, dados atualisado com sucesso";
      $res['message']= $arDados;
    }else{
      $res['error'] = true; 
      $arError = "Error, nao foi possivel salvar os dados";
      array_push($arErros, $arError);
    }
  endif;
  #CATEGORIA-ATIVO----------------------------------------------------------------------
  
  #CATEGORIA-DELETAR----------------------------------------------------------------------
  if($action == 'catDelete'):
    $id = $_POST['id'];

    if($lojaCategorias->delete($id)){
      $res['error'] = false;
      $arDados = "OK, dados deleto com sucesso";
      $res['message']= $arDados;
    }else{
      $res['error'] = true; 
      $arError = "Error, nao foi possivel realisar operação";
      array_push($arErros, $arError);
    }
  endif;
  #CATEGORIA-DELETAR----------------------------------------------------------------------
  
  #CATEGORIA-CADASTRAR----------------------------------------------------------------------
  if($action == 'catCadastrar'):
    #Novo
    $loja  = $_POST['loja'];
    $categoria = $_POST['categoria'];
    foreach ( $categoria as $data){
      $itemId = $data['id'];
      $duplicado = false;
      foreach($lojaCategorias->findAll() as $key => $value): {
        $catLjCategoria = $value->categoria;
        $catLjLoja = $value->loja;
        
        if($loja == $catLjLoja){
          if($itemId == $catLjCategoria ):
            $duplicado = true;
          endif;
        }          
      }endforeach;
      if( !$duplicado ){
        $lojaCategorias->setLoja($loja);
        $lojaCategorias->setCategoria($itemId);
        # Insert
        if($lojaCategorias->insert()){
          $res['error'] = false;
          $res['message']= "OK, dados salvo com sucesso";
        }else{
          $res['error'] = true; 
          $arError = "Error, nao foi possivel salvar os dados";
          array_push($arErros, $arError);
        }
      }else{
        $res['error'] = true; 
        $arError = "Error, item já cadastrado";
        array_push($arErros, $arError);
      }
    }
      
    if($res['error'] == true){
      $res['message']= $arErros;
    }

  endif;
  #CATEGORIA-CADASTRAR----------------------------------------------------------------------
  
  if($action == 'loja'):
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
    
  endif;

  $res['dados'] = $arLojas;
  header("Content-Type: application/json");
  echo json_encode($res, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);