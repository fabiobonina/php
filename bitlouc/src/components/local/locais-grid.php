<template id="grid-local">
  <div>
    <v-layout row>
      <v-flex xs12>
        <v-card>
          <v-toolbar dense color="blue">
            <v-text-field v-model="configs.search" prepend-icon="search" append-icon="mic" label="Search" solo-inverted class="mx-3" flat></v-text-field>
              <v-flex xs12 sm1>
                <v-subheader v-text="'Ordernar por:'"></v-subheader>
              </v-flex>
              <v-flex xs12 sm2>
                <v-select :items="itens" v-model="configs.orderBy" item-text="name" item-value="state" return-object label="Select" solo></v-select>
              </v-flex>
            <v-flex xs12 sm1>
              <v-btn flat icon color=""
              @click.native="configs.order == 'asc'? configs.order = 'desc': configs.order = 'asc'">
              <v-icon v-if="configs.order == 'asc'" dark>arrow_downward</v-icon>
              <v-icon v-else dark>arrow_upward</v-icon>
              </v-btn>
            </v-flex>
            <v-spacer></v-spacer>
            <v-btn v-if="user.nivel > 2 && user.grupo == 'P'"  @click="modalAdd=true" color="pink" dark small absolute fab right>
              <v-icon>add</v-icon>
            </v-btn>
          </v-toolbar>
          <v-list two-line>
            <template v-for="(item, index) in filteredData" >
              <v-list-tile :key="item.name" :to="'/loja/' + item.id" append v-on:click.native="" activator slot>
                <v-list-tile-content dense>
                  <v-list-tile-title :key="item.id"> {{item.tipo}} - {{item.name}} </v-list-tile-title>
                  <v-list-tile-sub-title class="text--primary">  {{item.municipio}} /{{item.uf}} </v-list-tile-sub-title>
                </v-list-tile-content>
                <v-list-tile-action>
                  Localidades: {{ item.locaisQt }} {{ item.locaisGeoStatus }}% ({{ item.locaisGeoQt }})

                </v-list-tile-action>
                
              </v-list-tile>
              <v-list-tile @click="" light>
                <v-list-tile-content>
                  <v-chip small >Regional: {{item.regional}} </v-chip>
                </v-list-tile-content>
                <div>
                  <v-chip small v-for="categoria in item.categoria" :key="categoria.id">
                    {{ categoria.tag }}
                  </v-chip>
                </div>
                <v-btn :disabled=" 0.000000 == item.latitude" :href="'https://maps.google.com/maps?q='+ item.latitude + ',' + item.longitude" target="_blank" fab dark color="primary">
                  <v-icon dark>directions</v-icon>
                </v-btn>
                <v-list-tile-action>
                  <v-menu v-if="user.nivel > 2 && user.grupo == 'P'" open-on-hover top offset-y left  @click="">
                    <v-btn slot="activator" icon>
                      <v-icon>more_vert</v-icon>
                    </v-btn>
                    <v-list>
                      <v-list-tile @click="modalGeo = true; selecItem(item)">
                        <v-list-tile-title>
                          <span class="mdi mdi-wrench"></span>Geoposição
                        </v-list-tile-title>
                      </v-list-tile>
                      <v-list-tile @click="modalCat = true; selecItem(item)">
                        <v-list-tile-title>
                          <span class="mdi mdi-wrench"></span>Categoria
                        </v-list-tile-title>
                      </v-list-tile>
                      <v-list-tile @click="modalEdt = true; selecItem(item)">
                        <v-list-tile-title>
                          <span class="mdi mdi-pencil"></span>Editar
                        </v-list-tile-title>
                      </v-list-tile>
                      <v-list-tile v-if="user.nivel > 3" @click="modalDel = true; selecItem(item)">
                        <v-list-tile-title>
                          <span class="mdi mdi-delete"></span>Delete
                        </v-list-tile-title>
                      </v-list-tile>
                    </v-list>
                  </v-menu>
                </v-list-tile-action>
              </v-list-tile>
              <v-divider v-if="index + 1 < filteredData.length" :key="index"></v-divider>
            </template>
          </v-list>
        </v-card>
      </v-flex>
    </v-layout>
    <section>      
      <div>

        <article class="post" v-for="item in filteredData">
          <div class="columns">
            <div class="column is-6">
              <a :href="'#/loja/' + $route.params._id + '/local/' + item.id" ><p class="title is-5"> {{item.tipo}} - {{item.name}}</p></a>
              <p class="subtitle is-6" style="margin-bottom: 0;"> {{item.municipio}} /{{item.uf}}
                <span class="pull-right"  v-for="categoria in item.categoria"> <span class="tag">{{ categoria.tag }}</span> &nbsp;  </span>
              </p>
              <p>Regional:  &nbsp; <a>#{{item.regional}} </a></p>
            </div>
            <div class="column is-6">
              <nav class="level">
                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading">Local: <i class="fa fa-building-o"></i> {{ item.locaisQt }}</p>
                    <p><i class="fa fa-map-marker"></i> {{ item.locaisGeoStatus }}% ({{ item.locaisGeoQt }})</span></p>
                  </div>
                </div>
                <div class="level-item has-text-centered">
    
                </div>
                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading">Rota</p>
                    <a v-if=" 0.000000 != item.latitude"
                    :href="'https://maps.google.com/maps?q='+ item.latitude + ',' + item.longitude"
                    target="_blank">
                      <span class="title is-3 has-text-info mdi mdi-directions"></span>
                    </a>
                  </div>
                </div>
                
                </div>
              </nav>
            </div>
          </div>
        </article>
      </div>
    </section>
    <div>
      <local-add v-if="modalAdd" v-on:close="modalAdd = false" :dialog="modalAdd"></local-add>
      <local-geo v-if="modalGeo" v-on:close="modalGeo = false" :dialog="modalGeo" :data="modalItem"></local-geo>
      <local-edt v-if="modalEdt" v-on:close="modalEdt = false" :dialog="modalEdt" :data="modalItem"></local-edt>
      <local-del v-if="modalDel" v-on:close="modalDel = false" :dialog="modalDel" :data="modalItem"></local-del>
      <local-cat v-if="modalCat" v-on:close="modalCat = false" :dialog="modalCat" :data="modalItem"></local-cat>
    </div>
  </div>
</template>
<script src="src/components/local/locais-grid.js"></script>

<?php require_once 'src/components/local/_addLocal.php';?>
<?php require_once 'src/components/local/_geoLocal.php';?>
<?php require_once 'src/components/local/_edtLocal.php';?>
<?php require_once 'src/components/local/_delLocal.php';?>
<?php require_once 'src/components/local/_catLocal.php';?>