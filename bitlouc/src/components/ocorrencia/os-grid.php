<template id="os-grid">
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
      <v-data-table :headers="headers" :items="data" :search="search" :pagination.sync="pagination">
        <template slot="items" slot-scope="props">
          
          <td style="padding:0 10px">
              <router-link :to="'/oss/' + props.item.loja_id + '/os/' + props.item.id" :key="props.item.id">
                <v-list-tile-title> {{ props.item.lojaNick }}: {{props.item.local_tipo}} {{props.item.local_name}} ({{props.item.local_municipio}}-{{props.item.uf}})</v-list-tile-title>
                <v-list-tile-sub-title class="text--primary"> {{props.item.servico.name}}, {{ props.item.categoria.name }}</v-list-tile-sub-title>
                <v-list-tile-sub-title v-if="props.item.bem">{{props.item.bem.name}} {{props.item.bem.modelo}}  &nbsp; #{{props.item.bem.fabricante}}
                <v-chip small color="green" text-color="white">
                  <v-avatar class="green darken-4">
                    <v-icon small>mdi-qrcode</v-icon>
                  </v-avatar>
                  {{props.item.bem.numeracao}}
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
                {{tecnico.userNick}}
              </v-chip>
            </div>
          </td>
          <td style="padding:0 10px">
          <v-list-tile-content class="text-xs-right">
          {{ props.item.data }} 
            <v-chip small color="indigo" text-color="white">
                OS: {{ props.item.filial}}-{{ props.item.os}}
              </v-chip> </v-list-tile-content>
          </td>
          <td>
            <local-rota :lat="props.item.local_lat" :long="props.item.local_long"></local-rota>
            <local-crud :data="props.item"></local-crud>
          </td>
          <td class="text-xs-right"> {{ props.item.id }} </td>
          
        </template>
        <v-alert slot="no-results" :value="true" color="error" icon="warning">
          Your search for "{{ search }}" found no results.
        </v-alert>
      </v-data-table>
    </v-card>
    <div>
      <local-add v-if="modalAdd" v-on:close="modalAdd = false" :dialog="modalAdd"></local-add>
    </div>
  </div>
</template>

<?php require_once 'src/components/os/_addOs.php';?>
<?php require_once 'src/components/os/_edtOs.php';?>
<?php require_once 'src/components/os/_delOs.php';?>
<?php require_once 'src/components/os/_tecOs.php';?> 
<?php require_once 'src/components/os/_amarracOs.php';?>
<?php require_once 'src/components/local/_rotaLocal.php';?>

<script>
  Vue.component('os-grid', {
    template: '#os-grid',
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
          { text: 'Info', sortable: false, value: 'info' },
          { text: 'ID', value: 'id' },          
        ],
        sortKey: '',
      showModal: false,
      modalItem: {},
      modalTec: false,
      modalEdt: false,
      modalDel: false,
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
    onClose: function(){
      this.showModal = false;
    },
    selecItem: function(data){
      this.modalItem = data;
    },
    onAtualizar: function(){
      this.$store.dispatch('fetchLocais', this.$route.params._id).then(() => {
        this.showModal = false;
      });
    },
  }
  });
</script>
