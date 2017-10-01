<?php
    function __autoload($class_name){
      require_once 'admin/classes/' . $class_name . '.php';
    }

    $oats = new Oats();
    $usuarios = new Usuarios();
    $lojas = new Lojas();
    $localidades = new Localidades();
    $sistemas = new Sistemas();
    $servicos = new Servicos();
    $descricoes = new Descricoes();
    $ativos = new Ativos();

    $cont_oatLat = 0;
    $out = "{";

       foreach($localidades->findAll() as $key => $value):{
          $localId = $value->id;
          $localidade = $value->loja . " | " . $value->nome;
          $localLat = $value->latitude;
          $localLong = $value->longitude;
          $cont_oatTt = 0;

          foreach($oats->findAll() as $key => $value):if($value->ativo == 0 && $value->localidade == $localId && $value->status < 4 ) {
            $cont_oatTt++;
          }endforeach;

          if( $cont_oatTt > 0 && $localLat <> 0){
        		if ($out != "{") {
        			$out .= ",";
        		}
            $out .= '"'.$localidade.'": { ';
        		$out .= 'center: {lat: '.$localLat.', ';
        		$out .= 'lng: '.$localLong.'},';
            $out .= 'atendimento: '.$cont_oatTt.'}';


          }
        }endforeach;

  		$out .= "}";

 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
     <meta charset="utf-8">
     <title>Circles</title>
     <style>
       html, body {
         height: 100%;
         margin: 0;
         padding: 0;
       }
       #map {
         height: 100%;
       }
     </style>
   </head>
   <body>
     <div id="map"></div>


<script>
//var citymap = <?php echo json_encode($out) ?>;
var citymap = <?php echo $out; ?>;



 function initMap() {
   // Create the map.
   var map = new google.maps.Map(document.getElementById('map'), {
     zoom: 4,
     center: {lat: -8.063759, lng: -34.871540},
     mapTypeId: google.maps.MapTypeId.TERRAIN
   });

   // Construct the circle for each value in citymap.
   // Note: We scale the area of the circle based on the population.
   for (var city in citymap) {
     // Add the circle for this city to the map.
     var cityCircle = new google.maps.Circle({
       strokeColor: '#FF0000',
       strokeOpacity: 0.8,
       strokeWeight: 2,
       fillColor: '#FF0000',
       fillOpacity: 0.35,
       map: map,
       center: citymap[city].center,
       radius: Math.sqrt(citymap[city].atendimento) * 10000
     });
   }
 }

     </script>
     <script async defer
         src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD690bEo7B-V4nQR5T8-aiyf61bbGzrL6Q&callback=initMap"></script>
   </body>
 </html>
