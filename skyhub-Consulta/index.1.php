<?php
    function __autoload($class_name){
      require_once 'admin/classes/' . $class_name . '.php';
    }

    $oats = new Oats();
    $usuarios = new Usuarios();
    $clientes = new Clientes();
    $localidades = new Localidades();
    $sistemas = new Sistemas();
    $servicos = new Servicos();
    $descricoes = new Descricoes();
    $ativos = new Ativos();
 ?>
     <?php foreach($localidades->findAll() as $key => $value):if($value->ativo == 0 ) {
            $localId = $value->id;
            $localidade = $value->cliente . " | " . $value->nome;
            $latitude = $value->latitude;
            $longitude = $value->longitude;
            $cont_oatTt = 0;
            foreach($oats->findAll() as $key => $value):if($value->ativo == 0 && $value->localidade == $localId  ) {
              $cont_oatTt++;
            }endforeach;
            if( $cont_oatTt > 0 && $latitude <> 0){
    ?>


    <?php //echo $latitude; ?> <?php //echo $longitude; ?><?php //echo $localidade; ?> <?php //echo $cont_oatTt; ?>

    <?php// echo $latitude; ?> <?php //echo $longitude; ?><?php //echo $localidade; ?> <?php //echo $cont_oatTt; ?>

    <?php }
    }endforeach; ?>

   <?php
    foreach($localidades->findAll() as $key => $value):if($value->ativo == 0 ) {
      $localId = $value->id;
      $localidade = $value->cliente . " | " . $value->nome;
      $latitude = $value->latitude;
      $longitude = $value->longitude;
      $cont_oatTt = 0;
      foreach($oats->findAll() as $key => $value):if($value->ativo == 0 && $value->localidade == $localId  ) {
        $cont_oatTt++;
      }endforeach;
      if( $cont_oatTt > 0 && $latitude <> 0){
        //[ echo $latitude; ,  echo $longitude; , echo $localidade;',  echo $cont_oatTt; ],
        // Criamos um Array com algumas informações básicas
        // de uma pessoa.
      }
    }endforeach;
   ?>


  			<?php foreach($oats->ultimaOat() as $key => $value):{
            $oatLocalId = $value->localidade;
            $oatServId = $value->servico;
            $oatSistId = $value->sistema;
            $oatUltimoAtend = $value->UltimaData;
            foreach($localidades->findAll() as $key => $value):if($value->id == $oatLocalId) {
              $oatLocal = $value->nome;
            }endforeach;
            foreach($servicos->findAll() as $key => $value):if($value->id == $oatServId) {
              $oatServico = $value->descricao;
            }endforeach;
            foreach($sistemas->findAll() as $key => $value):if($value->id == $oatSistId) {
              $oatSistema =  $value->descricao;
            }endforeach;

        ?>
