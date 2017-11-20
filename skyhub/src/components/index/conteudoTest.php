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

      /*foreach($localidades->findAll() as $key => $value):if($value->ativo == 0 ) {

        $cont_local++;
        if( $value->latitude <> 0.00000){
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
            
            if( $cont_oatTt > 0 && $localLat <> 0.000000){
              foreach($oats->findAll() as $key => $value):if($value->ativo == 0 && $value->localidade == $localId && $value->status < 5 ) {
                $cont_oatLat++;
              }endforeach;
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

        $cont_oatLat1 = ($cont_oatLat / $cont_oat)*100;*/

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
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <?php /* foreach($lojas->findAll() as $key => $value):if($value->ativo == 0 ) { ?>
                  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="tile-stats">
                  
                    <div class="icon"><i class="fa fa fa-building-o"></i>
                    </div>
                    <?php $lojaID = $value->id; ?>
                    <h4><a href="lojaList.php"><?php echo $value->displayName; ?></a></h4>

                    <?php 
                    $i = 0;
                    $i1 = 0;
                    $locais = 0;
                    $localizado = 0;
                    
                    foreach($localidades->findAll() as $key => $value):if($value->ativo == 0 && $value->loja == $lojaID ) {
                      $i++;
                      $locais = $i;
                      if($value->latitude <> 0.00000 && $value->longitude <> 0.00000 ){
                        $i1++;
                        $localizado = $i1;
                      }
                     }endforeach;
                     if($locais > 0){
                      $status = ($localizado/$locais)*100;
                     }else{
                       $status = 0;
                     }
                     
                     
                     ?>
                    <h5>Locais:  <i class="fa fa-building-o"></i><?php echo $locais;?>/  <i class="green"><i class="fa fa-map-marker"></i><?php echo round($status, 1)."% (".$localizado.")"; ?></i></h5>
                  </div>
                  </div>
                <?php }endforeach; */?>
              </div>
            </div>
          </div>

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

          <!--div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">
                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>OAT <small>Status</small></h3>
                  </div>
                </div>
                <div class="col-md-5 col-sm-3 col-xs-12 bg-white">
                  <div id="piechart_div" style="width: 100%; height:100%;"></div>
                </div>
                <div class="col-md-7 col-sm-9 col-xs-12">
                  <div id="placeholder33" style="height: 460px; display: none" class="demo-placeholder"></div>
                  <div style="width: 100%;">
                    <div id="barchart_div" style="width: 100%; height:400px;"></div>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div-->
          <br/>
          <!--div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">
                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>OAT | Região <small>Posiçao geografica</small></h3>
                  </div>
                </div>
                <div class="col-md-10 col-sm-9 col-xs-12">
                  <div id="placeholder33" style="height: 460px; display: none" class="demo-placeholder"></div>
                  <div style="width: 100%;">
                    <div id="map" style="width: 100%; height: 460px;"></div>
                  </div>
                </div>
                <div class="col-md-2 col-sm-3 col-xs-12 bg-white">
                  <div style="width: 100%; height:100%;">OBS: Os atendimentos exibidos neste gráfico, são os que tem sua posição geografica salva por geolocalização, que corresponde a <?php echo round($cont_oatLat1, 2) ; ?>%( <?php echo $cont_oatLat ; ?> ) do total de atendimentos feitos.</div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div-->
          <br />
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">
                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Lojas <small></small></h3>
                  </div>
                </div>
                <div class="col-md-12 col-sm-9 col-xs-12">
                  <div id="placeholder33" style="height: 460px; display: none" class="demo-placeholder"></div>
                  <div style="width: 100%;">
                  <div class="">
                    <main id="app">
                      <router-view></router-view>
                    </main>
                  </div>
                  <template id="item">
                    <div>
                      <h2>{{ product.name }}</h2>
                      <b>Description: </b>
                      <div>{{ product.description }}</div>
                      <b>Price:</b>
                      <div>{{ product.price }}<span class="glyphicon glyphicon-euro"></span></div>
                      <br/>
                      <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                      <a><router-link to="/">Back to product list</router-link></a>
                    </div>
                  </template>
                  <template id="list">
                    <div>
                      <div class="actions">
                        <a class="btn btn-default" >
                        <router-link :to="{path: '/add'}">
                          <span class="glyphicon glyphicon-plus"></span>
                          Add
                        </router-link>
                        </a>
                      </div>
                      <div>
                        <p class="successMessage" v-if="successMessage">{{successMessage}}</p>
                        <p class="errorMessage" v-if="errorMessage">{{errorMessage}}</p>
                        <div class="filters row">
                          <div class="form-group col-sm-3">
                            <label for="search-element">Search</label>
                            <input v-model="searchQuery" class="form-control" id="search-element" requred/>
                          </div>
                        </div>
                        <tabela-grid
                          :data="message"
                          :columns="gridColumns"
                          :filter-key="searchQuery">
                        </tabela-grid>
                      </div>
                    </div>
                  </template>
                  <template id="grid-tabela">
                    <div class="x_content">
                      <ul class="list-unstyled msg_list">
                        <li>
                          <a>
                            <span class="image">
                              <img src="images/img.jpg" alt="img" />
                            </span>
                            <span>
                              <span>John Smith</span>
                              <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                              Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that
                            </span>
                          </a>
                        </li>
                      </ul>
                    </div>
                    <div>
                      <div class="" v-for="entry in filteredData">
                        <a :href="'#/loja/' + entry.id" class=""><h4 class="">{{entry.displayName}}</h4>
                          <p class="">{{entry.name}}</p><span class=""></span> View <span class="glyphicon glyphicon-eye-open"></span>
                        </a>
                      </div>
                    </div>
                  </template>
                  <template id="add">
                    <div>
                    <h2>Add new product</h2>
                    <form v-on:submit="createProduct">
                      <div class="form-group">
                        <label for="add-name">Name</label>
                        <input class="form-control" id="add-name" v-model="product.name" required/>
                      </div>
                      <div class="form-group">
                        <label for="add-description">Description</label>
                        <textarea class="form-control" id="add-description" rows="10" v-model="product.description"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="add-price">Price, <span class="glyphicon glyphicon-euro"></span></label>
                        <input type="number" class="form-control" id="add-price" v-model="product.price"/>
                      </div>
                      <button type="submit" class="btn btn-primary">Create</button>
                      <a class="btn btn-default"><router-link to="/">Cancel</router-link></a>
                    </form>
                    </div>
                  </template>
                  <template id="edit">
                    <div>
                    <h2>Edit product</h2>
                    <form v-on:submit="updateProduct">
                      <div class="form-group">
                        <label for="edit-name">Name</label>
                        <input class="form-control" id="edit-name" v-model="product.name" required/>
                      </div>
                      <div class="form-group">
                        <label for="edit-description">Description</label>
                        <textarea class="form-control" id="edit-description" rows="3" v-model="product.description"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="edit-price">Price, <span class="glyphicon glyphicon-euro"></span></label>
                        <input type="number" class="form-control" id="edit-price" v-model="product.price"/>
                      </div>
                      <button type="submit" class="btn btn-primary">Save</button>
                      <a class="btn btn-default"><router-link to="/">Cancel</router-link></a>
                    </form>
                    </div>
                  </template>
                  <template id="delete">
                    <div>
                    <h2>Delete product {{ product.name }}</h2>
                    <form v-on:submit="deleteProduct">
                      <p>The action cannot be undone.</p>
                      <button type="submit" class="btn btn-danger">Delete</button>
                      <a class="btn btn-default"><router-link to="/">Cancel</router-link></a>
                    </form>
                    </div>
                  </template>
                  <script src="https://unpkg.com/vue/dist/vue.js"></script>
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/vuex/2.0.0-rc.4/vuex.js"></script>
                  <script src="https://unpkg.com/vue-router@2.0.0/dist/vue-router.js"></script>
                  <script src="lib/vue-resource.min.js"></script>
                  <script src="appLoja.js"></script>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          <br />

        </div>
        </div>
        </div>
        <!-- /page content -->
        <script>
          //#### Atendimento por Região #######
          var citymap = <?php echo $out; ?>;
           function initMap() {
             // Create the map.
             var map = new google.maps.Map(document.getElementById('map'), {
               zoom: 4,
               center: {lat: -14.239104, lng: -51.925403},
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
                 radius: Math.sqrt(citymap[city].atendimento) * 3000
               });
             }
           }
        </script>
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD690bEo7B-V4nQR5T8-aiyf61bbGzrL6Q&callback=initMap">
        </script>
