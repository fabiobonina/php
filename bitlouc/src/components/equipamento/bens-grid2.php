<template id="bens-grid">
  <div>
    <div>
      <label><input type="radio" v-model="selectedCategoria" value="0">All </label>&nbsp;&nbsp;&nbsp;
      <label v-for=" categoria in categorias" :key="categoria.id"><input type="radio" v-model="selectedCategoria" v-bind:value="categoria.id">{{ categoria.name }} &nbsp;&nbsp;&nbsp;</label>
    </div>
    <v-card>
      <v-card-title>
        <v-toolbar-title>Equipamentos</v-toolbar-title>
        <v-divider class="mx-2" inset vertical></v-divider>
        <v-spacer></v-spacer>
        <v-text-field  v-model="search" append-icon="search" label="Search" single-line hide-details></v-text-field>
        <v-btn @click="modalOs = true" color="deep-orange" dark small fab>
          <v-icon>build</v-icon>
        </v-btn>
        <bem-add></bem-add>
      </v-card-title>
      <v-data-table :headers="headers" :items="data" :search="search">
        <template slot="items" slot-scope="props">
          <td> {{ props.item.name }} </td>
          <td> {{ props.item.modelo }} </td>
          <td> {{ props.item.fabricanteNick }} </td>
          <td>
            <v-chip small  color="green" text-color="white">
              {{ props.item.categoria.tag }}
            </v-chip>
          </td>
          <td> {{ props.item.numeracao }} </td>
          <td> {{ props.item.plaqueta }} </td>
          
          <td class="text-xs-right">
            <bem-crud :data="props.item"></bem-crud>
          </td>
        </template>
        <v-alert slot="no-results" :value="true" color="error" icon="warning">
          Your search for "{{ search }}" found no results.
        </v-alert>
      </v-data-table>
    </v-card>
    <os-add v-if="modalOs" v-on:close="modalOs = false" :dialog="modalOs" :data="modalItem"></os-add>
  </div>
</template>

<?php require_once 'src/components/equipamento/_addBem.php';?>
<?php require_once 'src/components/equipamento/_crudBem.php';?>
<?php require_once 'src/components/os/_addOs.php';?>

<script>
  Vue.component('bens-grid', {
    template: '#bens-grid',
    props: {
      data: Array,
      categorias: Array,
      status: String,
      filterKey: String,
    },
    data: function () {
      return {
        modalItem: null,
        modalAdd: false,
        modalOs: false,
        selectedCategoria: '0',
        search: '',
        headers: [
          { text: 'Equipamento', align: 'left', value: 'name' },
          { text: 'Modelo', value: 'modelo' },
          { text: 'Fabricante', value: 'fabricanteNick' },
          { text: 'Categoria', value: 'categoria' },
          { text: 'TAG', value: 'numeracao' },
          { text: 'Ativo', value: 'plaqueta' },
          { text: 'Info', sortable: false, value: 'info' }
        ],
      }
    },
    mounted: function() {
      //this.modalOsAdd = true;
    },
    computed: {
      user()  {
        return store.state.user;
      },
      filteredData() {
        var status = this.status;
        var filter = this.configs.search && this.configs.search.toLowerCase();
        var list = _.orderBy(this.data, this.configs.orderBy.state, this.configs.order);
        var categoria = this.selectedCategoria;
        //_.filter(list, repo => repo.status.indexOf(filter) >= 0);
        if(categoria !== "0") {
          list = list.filter(function(row) {
            return Number(row.categoria.id) === Number(categoria);
          });
        }
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
      },
    },
    filters: {
      capitalize: function (str) {
        return str.charAt(0).toUpperCase() + str.slice(1)
      }
    },
    methods: {
      selecItem: function(data){
        this.modalItem = data;
      },
      onAtualizar: function(){
        this.$store.dispatch('fetchLocais', this.$route.params._loja).then(() => {
          this.modalBemAdd = false;
          this.modalOsAdd = false;
        });
      },
    }
  });
</script>


