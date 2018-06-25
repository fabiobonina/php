<template id="os-grid">
  <div>
  <v-layout row>
    <v-flex xs12>
      <v-card>
        <v-toolbar  dense >
          <v-text-field v-model="configs.search" prepend-icon="search" append-icon="mic" label="Search" solo-inverted class="mx-3" flat></v-text-field>
            <v-flex xs12 sm2>
              <v-subheader v-text="'Ordernar por:'"></v-subheader>
            </v-flex>
            <v-flex xs12 sm2>
            <v-select
            :items="itens"
            v-model="configs.orderBy"
            item-text="name"
            item-value="state"
            return-object
            label="Select"
            solo
          ></v-select>
          </v-flex>
          <v-flex xs12 sm1>
            <v-btn flat icon color="blue"
            @click.native="configs.order == 'asc'? configs.order = 'desc': configs.order = 'asc'">
            <v-icon v-if="configs.order == 'asc'" dark>arrow_downward</v-icon>
            <v-icon v-else dark>arrow_upward</v-icon>
            </v-btn>
          </v-flex>
          <v-spacer></v-spacer>
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
              <v-chip small v-for="tecnico in item.tecnicos" :key="tecnico.id">
                <v-avatar small>
                  <img :src="tecnico.avatar" alt="trevor">
                </v-avatar>
                {{tecnico.userNick}}
              </v-chip>
            </div>
            <v-card>
              <v-card-text>
              <progresso-os :data="item.processo"></progresso-os>
              </v-card-text>
            </v-card>
            <v-divider v-if="index + 1 < filteredData.length" :key="index"></v-divider>
          </template>
        </v-list>
      </v-card>
    </v-flex>
  </v-layout>
    
    <div>
      <os-tec v-if="modalTec" v-on:close="modalTec = false" :dialog="modalTec" data="modalItem" :data="modalItem"></os-tec>
      <os-edt v-if="modalEdt" v-on:close="modalEdt = false" :dialog="modalEdt" :data="modalItem"></os-edt>
      <os-del v-if="modalDel" v-on:close="modalDel = false" :dialog="modalDel" :data="modalItem"></os-del>
      <os-amarrac v-if="modalOs" v-on:close="modalOs = false" :dialog="modalOs" :data="modalItem"></os-amarrac>
    </div>
  </div>
</template>
<script src="src/components/os/os-grid.js"></script>

<?php require_once 'src/components/os/_addOs.php';?>
<?php require_once 'src/components/os/_edtOs.php';?>
<?php require_once 'src/components/os/_delOs.php';?>
<?php require_once 'src/components/os/_tecOs.php';?> 
<?php require_once 'src/components/os/_amarracOs.php';?>