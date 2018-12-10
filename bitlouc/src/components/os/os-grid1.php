<template id="os-grid">
  <div>
    <v-card>
      <v-card-title>
        <v-toolbar-title>Locais</v-toolbar-title>
        <v-divider class="mx-2" inset vertical></v-divider>
        <v-spacer></v-spacer>
        <v-text-field  v-model="search" append-icon="search" label="Search" single-line hide-details></v-text-field>
      </v-card-title>
      <v-data-table :headers="headers" :items="data" :search="search" :pagination.sync="pagination">
        <template slot="items" slot-scope="props">
          <td> {{props.item.lojaNick}}
            <v-list>
              <v-list-tile :to="'/loja/' +  props.item.loja + '/local/' + props.item.id" :key="props.item.id" @click="" append activator slot>
              <v-list-tile-content>
                <v-list-tile-title> {{ props.item.tipo }} {{ props.item.name }} </v-list-tile-title>
                <v-list-tile-sub-title class="text--primary">Regional: {{ props.item.regional }} </v-list-tile-sub-title>
                </v-list-tile-content>
              </v-list-tile>
            </v-list>
          </td>
          <td>{{ props.item.municipio }}/ {{ props.item.uf }}</td>
          <td>
            <v-btn icon dark large color="primary" 
              :disabled=" 0.000000 == props.item.latitude" 
              :href="'https://maps.google.com/maps?q='+ props.item.latitude + ',' + props.item.longitude" target="_blank">
              <v-icon dark>directions</v-icon>
            </v-btn>
          </td>
          <td> {{ props.item.latitude }},{{ props.item.longitude }} </td>
          <td>
            <v-chip v-for="categoria in props.item.categoria" :key="categoria.id" small  color="green" text-color="white">
              {{ categoria.tag }}
            </v-chip>
          </td>
          <td class="text-xs-right"> 
            <os-crud :data="props.item"></os-crud>
          </td>
        </template>
        <v-alert slot="no-results" :value="true" color="error" icon="warning">
          Your search for "{{ search }}" found no results.
        </v-alert>
      </v-data-table>
    </v-card>
  <v-layout row>
    <v-flex xs12>
      <v-card>
        <v-list two-line>
          <template v-for="(item, index) in filteredData">
          <v-card>
            <v-list-tile :key="item.name" avatar ripple @click="" >
              <v-list-tile-content>
                <router-link :to="'/oss/' + item.loja + '/os/' + item.id">
                <v-list-tile-title>{{item.lojaNick}} | {{item.local.tipo}} - {{item.local.name}} ({{item.local.municipio}}/{{item.local.uf}})</v-list-tile-title>
                <v-list-tile-sub-title class="text--primary">{{item.data}} | {{item.servico.name}} {{ item.categoria.name }}</v-list-tile-sub-title>
                </router-link>
                <v-list-tile-sub-title v-if="item.bem">{{item.bem.name}} {{item.bem.modelo}}  &nbsp; #{{item.bem.fabricanteNick}}
                  <v-chip small color="green" text-color="white">
                    <v-avatar class="green darken-4">
                      <v-icon small>mdi-qrcode</v-icon>
                    </v-avatar>
                    {{item.bem.numeracao}}
                  </v-chip>
                  <v-chip small color="orange" text-color="white">
                    <v-avatar class="orange darken-4">
                      <v-icon small>mdi-barcode</v-icon>
                    </v-avatar>
                    {{item.bem.plaqueta}}
                  </v-chip>
                </v-list-tile-sub-title>
              </v-list-tile-content>
              <v-chip small color="indigo" text-color="white">
                <v-avatar class="indigo darken-4">
                  <v-icon small class="icon">mdi-wrench</v-icon>
                </v-avatar>
                OS: {{item.filial}} - {{item.os}}
              </v-chip>
              <v-btn icon dark large color="primary" :disabled=" 0.000000 == item.local.latitude" :href="'https://maps.google.com/maps?q='+ item.local.latitude + ',' + item.local.longitude" target="_blank"> 
                <v-icon>directions</v-icon>
              </v-btn>
              
            </v-list-tile>
            <div>
              <v-chip small v-for="tecnico in item.tecnicos" :key="tecnico.id">
                <v-avatar small>
                  <img :src="tecnico.avatar" alt="trevor">
                </v-avatar>
                {{tecnico.userNick}}
              </v-chip>
            </div>
            
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
  </div>
</template>

<?php require_once 'src/components/os/_crudOs.php';?>

<script>
Vue.component('os-grid', {
  template: '#os-grid',
  props: {
    data: Array,
    status: String,
  },
  data: function () {
    return {
      sortKey: '',
      selected: [2],
      pagination: {
          sortBy: 'data'
      },
      headers: [
          { text: 'Loja', align: 'left', value: 'name' },
          { text: 'Nome (Municipio/UF)', value: 'municipio' },
          { text: 'Data', value: 'data' },
          { text: 'Geolocalização', sortable: false, value: 'latitude' },
          { text: 'Categoria', sortable: false, value: 'categoria' },
          { text: 'Info', sortable: false, value: 'info' }
        ],
      configs: {
        orderBy: { name: 'Data', state: 'data' },
        order: 'desc',
        search: ''
      },
      labels: ['Em trasito', 'Atendendo', 'Retorno Viagem', 'Completo' ],
      labels2: ['Atendimento', 'Concluido', 'Fechado', 'Validado' ],
      itens: [
        { name: 'Data', state: 'data' },
        { name: 'Local', state: 'local.name' },
        { name: 'Loja', state: 'loja' }
      ],
      fab: false,
      hover: false,
    }
  },
  computed: {
    user()  {
      return store.state.user;
    },
    filteredData2: function () {
      var filterKey = 0
      var data = this.data
      return data = data.filter(function (row) {
        return row.processo === filterKey;
      });
    },
    filteredData() {
      var status = this.status;
      var filter = this.configs.search && this.configs.search.toLowerCase();
      var list = _.orderBy(this.data, this.configs.orderBy.state, this.configs.order);
      //_.filter(list, repo => repo.status.indexOf(filter) >= 0);
      if(status){
      list = list.filter(function (row) {
        return Number(row.status) === Number(status);
      });
      }else{
        list = list.filter(function (row) {
          return Number(row.status) <= 1;
        });
      }
      
      if (filter) {
        list = list.filter(function (row) {
          return Object.keys(row).some(function (key) {
            return String(row[key]).toLowerCase().indexOf(filter) > -1
          })
        })
      }
      return list;
    }
  },
  methods: {
    onAtualizar: function(){
      this.$store.dispatch('fetchLocais', this.$route.params._loja).then(() => {
        this.showModal = false;
      });
    },
  }
});

</script>

