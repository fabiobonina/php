<?php $oats = new Oats();
      $usuarios = new Usuarios();
      $lojas = new Lojas();
      $localidades = new Localidades();
      $sistemas = new Sistemas();
      $servicos = new Servicos();
      $descricoes = new Descricoes();
      $ativos = new Ativos();

      $cont_anarar_os = 0;
      $cont_retorno = 0;
      $cont_finalizar = 0;
      $cont_concluidas = 0;
      $cont_oat = 0;
      $cont_local = 0;
      $cont_localLat = 0;

      foreach($localidades->findAll() as $key => $value):if($value->ativo == 0 ) {

        $cont_local++;
        if( $value->latitude <> 0){
          $cont_localLat++;
        }

      }endforeach;

      foreach($oats->findAll() as $key => $value):if($value->ativo == 0   ) {

        $oatStatus = $value->status;
        if( $oatStatus == 0){
          $cont_anarar_os++;
        }elseif($oatStatus == 1){
          $cont_retorno++;
        }
        elseif($oatStatus == 2){
          $cont_finalizar++;
        }
        elseif($oatStatus == 3){
          $cont_concluidas++;
        }
        if( $oatStatus < 4){
          $cont_oat++;
        }

      }endforeach; ?>
      <?php
      $cont_oatLat = 0;
      $out = "{";

         foreach($localidades->findAll() as $key => $value):{
            $localId = $value->id;
            $localidade = $value->loja . " | " . $value->nome;
            $localLat = $value->latitude;
            $localLong = $value->longitude;
            $cont_oatTt = 0;

            foreach($oats->findAll() as $key => $value):if($value->ativo == 0 && $value->localidade == $localId && $value->status < 5 ) {
              $cont_oatTt++;
            }endforeach;

            if( $cont_oatTt > 0 && $localLat <> 0){
              $cont_oatLat++;
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

        $cont_oatLat1 = ($cont_oatLat / $cont_oat)*100;

   ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script async defer src="http://maps.google.com/maps/api/js?key=AIzaSyD690bEo7B-V4nQR5T8-aiyf61bbGzrL6Q" type="text/javascript"></script>


    <script type="text/javascript">

      // Load Charts and the corechart and barchart packages.
      google.charts.load('current', {'packages':['corechart','bar','map','geochart']});
      // Draw the pie chart and bar chart when Charts is loaded.
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawStacked);
      google.charts.setOnLoadCallback(drawChartMap);
      google.charts.setOnLoadCallback(drawMarkersMap);

      function drawChart() {
        //#### OAT Status #######
        var data2 = google.visualization.arrayToDataTable([
          ['OAT', 'Status'],
          ['Solicitação',     <?php echo $cont_anarar_os; ?>],
          ['Aberta',      <?php echo $cont_retorno; ?>],
          ['Fechada',  <?php echo $cont_finalizar; ?>],
          ['Concluida', <?php echo $cont_concluidas; ?>]
        ]);

        var piechart_options = {title:'OAT Status',
                       width:450,
                       height:400,
                      pieHole: 0.4};
        var piechart = new google.visualization.PieChart(document.getElementById('piechart_div'));
        piechart.draw(data2, piechart_options);

      }
      function drawStacked() {
        //#### OAT x Tecnico #######
        var data1 = new google.visualization.arrayToDataTable([
          ['Tecnico', 'OAT Solicitada', 'OAT Aberta'],
          <?php foreach($usuarios->findAll() as $key => $value):if($value->ativo == 0   ) {
          $usuario = $value->nickuser;
          $cont_userOatSol = 0;
          $cont_userOatAb = 0;
            foreach($oats->findAll() as $key => $value):if($value->ativo == 0  && $value->nickuser == $usuario  ) {
              if( $value->status == 0){
                $cont_userOatSol++;
              }
              if( $value->status == 1){
                $cont_userOatAb++;
              }
            }endforeach;
            if($cont_userOatAb > 0 OR $cont_userOatSol > 0){?>
              ["<?php echo $usuario; ?>", <?php echo $cont_userOatSol; ?>, <?php echo $cont_userOatAb; ?>],
          <?php }
            }endforeach; ?>
        ]);
        var barchart_options = {
        title: 'OAT x Tecnico',
        chartArea: {width: '50%'},
        isStacked: true,
        hAxis: {
          title: 'Total OAT',
          minValue: 0,
        },
        vAxis: {
          title: 'Tecnico'
        }
        };
        var barchart = new google.visualization.BarChart(document.getElementById('barchart_div'));
        barchart.draw(data1, barchart_options);

      }
      //#### GeoLocalização #######
      function drawChartMap() {
        var data_maps = google.visualization.arrayToDataTable([
          ['Lat', 'Long', 'Name'],
          <?php foreach($localidades->findAll() as $key => $value):if($value->ativo == 0 ) {
            $localidade = $value->loja . " | " . $value->nome;
            if( $value->latitude <> 0){
            ?>


          [<?php echo $value->latitude; ?>, <?php echo $value->longitude; ?>, '<?php echo $localidade; ?>'],
          <?php    }
          }endforeach; ?>
        ]);
        var options_maps = {
        showTooltip: true,
        showInfoWindow: true,
        useMapTypeControl: true,
        enableScrollWheel: true,
        mapType: 'normal',
        showLine: true,
        };
        var map = new google.visualization.Map(document.getElementById('map_div'));
        map.draw(data_maps, options_maps);
      }

    </script>


       <body class="nav-md">
       <div class="container body">
      <div class="main_container">

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-wrench"></i> Total OAT</span>
              <div class="count"><?php echo $cont_oat; ?></div>
              <span class="count_bottom"><i class="green"> </i> Ordem de Atend. Tec.</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> OAT Solicitada</span>
              <div class="count"><?php echo $cont_anarar_os; ?></div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i> </i> Aguardando OS</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-wrench"></i> OAT Aberta</span>
              <div class="count green"><?php echo $cont_retorno; ?></div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i> </i> Retorno Tec.</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-wrench"></i> OAT Fechada</span>
              <div class="count"><?php echo $cont_finalizar; ?></div>
              <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i> </i> Baixar no Sistema</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-wrench"></i> OAT Concluida</span>
              <div class="count"><?php echo $cont_concluidas; ?></div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i> </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa  fa-building"></i> Localidade</span>
              <div class="count"><?php echo $cont_local; ?></div>
              <span class="count_bottom"><i class="green"><i class="fa fa-map-marker"></i> <?php echo $cont_localLat; ?></i> Posição geografica</span>
            </div>
          </div>
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>OAT <small>Status</small></h3>
                  </div>
                </div>
                <div class="col-md-7 col-sm-9 col-xs-12">
                  <div class="row" id="app">
                    <h1>Kullanıcı Ekle</h1>
                    <form method="post" v-on:submit.prevent="onSubmit">
                      <input type="text" v-model="name" placeholder="Ad" required>
                      <input type="text" v-model="surname" placeholder="Soyad" required>
                      <button>Kaydet</button>
                    </form>
                    <h1>Kullanıcı Listesi</h1>
                    <ul>
                      <li v-for="user in users">
                        {{user.name}} {{user.surname}}
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>

          </div>
          <br />

          <br />

          <br />

        </div>
        </div>
        </div>
        <!-- /page content -->

<script src="lib/vue.min.js"></script>
<script src="lib/vue-resource.min.js"></script>
<script src="app.js"></script>