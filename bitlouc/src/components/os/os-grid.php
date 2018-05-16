<template id="os-grid">
  <div>
  <v-layout row>
    <v-flex xs12>
      <v-card>
        <v-toolbar  dense >
          <v-text-field v-model="configs.search" prepend-icon="search" append-icon="mic" label="Search" solo-inverted class="mx-3" flat></v-text-field>
          <v-btn  color="blue"  class="white--text" 
          @click.native="configs.order == 'asc'? configs.order = 'desc': configs.order = 'asc'">
            <v-icon v-if="configs.order == 'asc'" right dark>arrow_downward</v-icon>
            <v-icon v-else right dark>arrow_upward</v-icon>
          </v-btn>
          <p><a>Ordernar por:</a></p>
                <span>
                  <select v-model="configs.orderBy">
                    <option value="data">Data</option>
                    <option value="local.name">Local</option>
                    <option value="loja">Loja</option>
                  </select>
                </span>
          <v-spacer></v-spacer>
          <v-btn icon>
            <v-icon>search</v-icon>
          </v-btn>
          <v-btn icon>
            <v-icon>check_circle</v-icon>
          </v-btn>
        </v-toolbar>
        <v-list two-line>
          <template v-for="(item, index) in filteredData">
            <v-list-tile :key="item.name" avatar ripple :href="'#/oss/' + item.loja + '/os/' + item.id" @click="" >
              <v-list-tile-content>
                <v-list-tile-title>{{item.lojaNick}} | {{item.local.tipo}} - {{item.local.name}} ({{item.local.municipio}}/{{item.local.uf}})</v-list-tile-title>
              </v-list-tile-content>
              <v-list-tile-action>
                <v-list-tile-action>{{item.filial}} - {{item.os}}</v-list-tile-action>
              </v-list-tile-action>
            </v-list-tile>
            <v-list-tile :key="item.name" avatar ripple @click="" >
              <v-list-tile-content>
                <v-list-tile-sub-title class="text--primary">{{item.data}} | {{item.servico.name}} {{ item.categoria.name }}</v-list-tile-sub-title>
                <v-list-tile-sub-title v-if="item.bem">{{item.bem.name}} {{item.bem.modelo}}  &nbsp; #{{item.bem.fabricanteNick}} </v-list-tile-sub-title>
              
              </v-list-tile-content>
              <div>
              <v-chip small v-if="item.bem">Ativo: {{ item.bem.plaqueta }}</v-chip>
              </div>
              <v-list-tile-action>
              
                <a v-if=" 0.000000 != item.local.latitude"
                :href="'https://maps.google.com/maps?q='+ item.local.latitude + ',' + item.local.longitude"
                target="_blank">
                  <v-icon>directions</v-icon>
                </a>

              </v-list-tile-action>
              <v-menu v-if="user.nivel > 2 && user.grupo == 'P'" bottom left  @click="">
                <v-btn slot="activator" icon>
                  <v-icon>more_vert</v-icon>
                </v-btn>
                <v-list>
                  <v-list-tile @click="modalOs = true; selecItem(item)">
                    <v-list-tile-title>
                      <span class="mdi mdi-wrench"></span>Amarrar OS
                    </v-list-tile-title>
                  </v-list-tile>
                  <v-list-tile @click="modalTec = true; selecItem(item)">
                    <v-list-tile-title>
                      <span class="mdi mdi-worker"></span>Tecnicos
                    </v-list-tile-title>
                  </v-list-tile>
                  <v-list-tile @click="modalEdt = true; selecItem(item)">
                    <v-list-tile-title>
                      <span class="mdi mdi-pencil"></span>Editar
                    </v-list-tile-title>
                  </v-list-tile>
                  <v-list-tile v-if="item.status == '0' && item.processo == '0' || user.nivel > 3" @click="modalDel = true; selecItem(item)">
                    <v-list-tile-title>
                      <span class="mdi mdi-delete"></span>Delete
                    </v-list-tile-title>
                  </v-list-tile>
                </v-list>
              </v-menu>
            </v-list-tile>
            <div>
              <v-chip small v-for="tecnico in item.tecnicos">
                <v-avatar small>
                  <img :src="tecnico.avatar" alt="trevor">
                </v-avatar>
                {{tecnico.userNick}}
              </v-chip>
            </div>
            <!--v-container fluid class="pa-0">
              <v-layout row wrap>
                <v-flex xs12 sm3>
                  <v-btn block color="blue">
                    <v-icon>favorite</v-icon>
                  </v-btn>
                </v-flex>
                <v-flex xs12 sm3>
                  <v-btn block color="blue">
                    <v-icon>star</v-icon>
                  </v-btn>
                </v-flex>
                <v-flex xs12 sm3>
                  <v-btn block color="blue">
                    <v-icon>cached</v-icon>
                  </v-btn>
                </v-flex>
                <v-flex xs12 sm3>
                  <v-btn block color="blue">
                    <v-icon>thumb_up</v-icon>
                  </v-btn>
                </v-flex>
              </v-layout>
            </v-container-->
            <v-card>
              <v-card-text>
                <v-slider :tick-labels="labels" v-model="item.processo" thumb-color="green" :max="3" :disabled="item.processo === '0'" always-dirty></v-slider>
              </v-card-text>
            </v-card>
            <v-divider v-if="index + 1 < filteredData.length" :key="index"></v-divider>
          </template>
        </v-list>
      </v-card>
    </v-flex>
  </v-layout>
    
    <div>
      <os-tec v-if="modalTec" v-on:close="modalTec = false" :data="modalItem"></os-tec>
      <os-edt v-if="modalEdt" v-on:close="modalEdt = false" :data="modalItem"></os-edt>
      <os-del v-if="modalDel" v-on:close="modalDel = false" :data="modalItem"></os-del>
      <os-amarrac v-if="modalOs" v-on:close="modalOs = false" :data="modalItem"></os-amarrac>
    </div>
  </div>
</template>
<script src="src/components/os/os-grid.js"></script>