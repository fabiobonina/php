<template id="atend-grid">
  <div>
    <v-card>
      <v-card-title>
        <v-toolbar-title>OS</v-toolbar-title>
        <v-divider class="mx-2" inset vertical></v-divider>
        <v-spacer></v-spacer>
        <v-text-field  v-model="search" append-icon="search" label="Search" single-line hide-details></v-text-field>
        <v-btn v-if="user.nivel > 2 && user.grupo == 'P'"  @click="modalAdd=true" color="pink" fab small dark>
          <v-icon>add</v-icon>
        </v-btn>
      </v-card-title>
      <v-data-table :headers="headers" :items="filteredData" :pagination.sync="pagination">
        <template slot="items" slot-scope="props">
          <td style="padding:0 10px">
            <router-link :to="'/os/'+ props.item.id" :key="props.item.id">
              <v-list-tile-title> {{props.item.local_tipo}} {{props.item.local_name}}</v-list-tile-title>
              <v-list-tile-sub-title>{{props.item.local_municipio}}-{{props.item.uf}}</v-list-tile-sub-title>
              <v-list-tile-sub-title> {{ props.item.loja_nick }} </v-list-tile-sub-title>
            </router-link>
          </td>
          <td style="padding:0 10px">
            <v-list-tile-content>
              <v-list-tile-title> {{ props.item.data }}</v-list-tile-title>
              <v-list-tile-sub-title class="text--primary"> {{props.item.servico.name}}</v-list-tile-sub-title>
              <v-chip small color="indigo" text-color="white">
                OS: {{ props.item.filial}}-{{ props.item.os}}
              </v-chip> 
            </v-list-tile-content>
          </td>
          
          <td style="padding:0 10px">
            <router-link :to="$route.path + props.item.id" :key="props.item.id">
              <v-list-tile-title> {{ props.item.categoria.name }} </v-list-tile-title>
              <v-list-tile-sub-title v-if="props.item.bem">{{props.item.bem.name}} {{props.item.bem.modelo}}  &nbsp; #{{props.item.bem.fabricante}}
                <v-chip small color="green" text-color="white">
                  <v-avatar class="green darken-4">
                    <v-icon small>mdi-qrcode</v-icon>
                  </v-avatar>
                  {{ props.item.bem.numeracao }}
                </v-chip>
                <v-chip small color="orange" text-color="white">
                  <v-avatar class="orange darken-4">
                    <v-icon small>mdi-barcode</v-icon>
                  </v-avatar>
                  {{props.item.bem.plaqueta}}
                </v-chip>
              </v-list-tile-sub-title>
            </router-link>
            <div>
              <v-chip small v-for="tecnico in props.item.tecnicos" :key="tecnico.id">
                <v-avatar small>
                  <img :src="tecnico.avatar" alt="trevor">
                </v-avatar>
                {{tecnico.user_nick}}
              </v-chip>
            </div>
          </td>

          <td>
            <os-crud :data="props.item" v-on:atualizar="atualizar()"></os-crud>
          </td>
          <td class="text-xs-right"> {{ props.item.id }} </td>
          
        </template>
        <v-alert slot="no-results" :value="true" color="error" icon="warning">
          Your search for "{{ search }}" found no results.
        </v-alert>
      </v-data-table>
    </v-card>
    <div>
    </div>
  </div>
</template>

<?php require_once 'src/components/os/_crudOs.php';?>

<script>
  Vue.component('atend-grid', {
    template: '#atend-grid',
    props: {
      data: Array,
      status: String,
    },
    data: function () {
      return {
        modalAdd: false,
        search: '',
        pagination: {
          sortBy: 'data'
        },
        headers: [
          { text: 'Local', align: 'left', value: 'local_name' },
          { text: 'Data', align: 'center', value: 'data' },
          { text: 'Categoria', align: 'center', value: 'categoria' },
          { text: 'Info', sortable: false, value: 'info' },
          { text: 'ID', value: 'id' },          
        ],
        sortKey: '',
        showModal: false,
        modalItem: {},
        modalOs: false,
        selected: [2],
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
      filteredData: function () {
        var status = store.state.status;
        var filterKey = this.search && this.search.toLowerCase()
        var data = this.data
        if(status){
          data = data.filter(function (row) {
            return Number(row.status) === Number(status);
          });
        }
        if (filterKey) {
          data = data.filter(function (row) {
            return Object.keys(row).some(function (key) {
              return String(row[key]).toLowerCase().indexOf(filterKey) > -1
            })
          })
        }
        return data
      }
    },
    filters: {
      capitalize: function (str) {
        return str.charAt(0).toUpperCase() + str.slice(1)
      }
    },
    methods: {
      onClose: function(){
        this.showModal = false;
      },
      selecItem: function(data){
        this.modalItem = data;
      },
      atualizar: function(){
        this.$emit('atualizar');
      },
    }
  });
</script>
