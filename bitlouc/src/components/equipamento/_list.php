<template id="bens-grid">
  <div>
    <div>
      <label><input type="radio" v-model="selectedCategoria" value="0">All </label>&nbsp;&nbsp;&nbsp;
      <label v-for=" categoria in categorias" :key="categoria.id"><input type="radio" v-model="selectedCategoria" v-bind:value="categoria.id">{{ categoria.name }} &nbsp;&nbsp;&nbsp;</label>
    </div>
    <v-toolbar flat color="white">
      <v-toolbar-title>Equipamentos</v-toolbar-title>
      <v-divider class="mx-2" inset vertical></v-divider>
      <v-spacer></v-spacer>
      <v-text-field  v-model="search" append-icon="search" label="Search" single-line hide-details></v-text-field>
      <v-btn @click="modalOs = true" color="deep-orange" dark small fab>
        <v-icon>build</v-icon>
      </v-btn>
      <bem-add :dialog-edt="editItem" :dialog-del="deleteItem" :data="item" v-on:close="close()"></bem-add>
    </v-toolbar>
    <v-data-table :headers="headers" :items="filteredData" :search="search" class="elevation-1">
      <template slot="items" slot-scope="props">
        <td>{{ props.item.name }}</td>
        <td>{{ props.item.modelo }}</td>
        <td>{{ props.item.fabricanteName }}</td>
        <td>
          <v-chip v-if="props.item.categoriaTag" small  color="green" text-color="white">
            {{ props.item.categoriaTag }}
          </v-chip>
        </td>
        <td class="text-xs-right"> {{ props.item.numeracao }} </td>
        <td class="text-xs-right"> {{ props.item.plaqueta }} </td>
        <td class="justify-center layout px-0">
          <v-icon small class="mr-2" @click="editItem = true; item = props.item"> edit </v-icon>
          <v-icon small  @click="deleteItem = true; item = props.item"> delete </v-icon>
        </td>
      </template>
      <v-alert slot="no-results" :value="true" color="error" icon="warning">
        Sua busca por "{{ search }}" não encontrou resultados.
      </v-alert>
    </v-data-table>
    <os-add v-if="modalOs" v-on:close="modalOs = false; modalItem = null" :dialog="modalOs" :data="modalItem"></os-add>
  </div>
</template>

<?php require_once 'src/components/equipamento/_add.php';?>
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
    data: () => ({
      item: null,
      deleteItem: false,
      editItem: false,
      modalOs: false,
      selectedCategoria: '0',
      search: '',
      headers: [
        { text: 'Equipamento', align: 'left', value: 'name' },
        { text: 'Modelo', value: 'modelo' },
        { text: 'Fabricante', value: 'fabricanteNick' },
        { text: 'Categoria', value: 'categoria' },
        { text: 'TAG', value: 'numeracao' },
        { text: 'Plaqueta Ativo', value: 'plaqueta' },
        { text: 'Info', sortable: false, value: 'info' }
      ],
      defaultItem: {
        produto: null, name: null, modelo: '',
        fabricante: null, categoria: null, plaqueta: '', dataFab: '', dataCompra: '', ativo: '0',
        dono: null, donoLocal: null,
        loja: null, local: null, status: '0',
      },
      configs: {
        orderBy: { name: 'Nome', state: 'name' },
        order: 'asc',
        search: ''
      },
      itens: [
        { name: 'Nome', state: 'name' },
        { name: 'Regional', state: 'regional' },
      ],
    }),
    created () {
      this.initialize()
    },
    computed: {
      user()  {
        return store.state.user;
      },
      filteredData2() {
        var status = this.status;
        var filter = this.search && this.search.toLowerCase();
        var list   = this.data;
        var categoria = this.selectedCategoria;
        //_.filter(list, repo => repo.status.indexOf(filter) >= 0);
        if(categoria !== "0") {
          list = list.filter(function(row) {
            return Number(row.categoria_id) === Number(categoria);
          });
        }
        /*if(status){
          list = list.filter(function (row) {
            return Number(row.status) === Number(status);
          });
        }else{
          list = list.filter(function (row) {
            return Number(row.status) <= 1;
          });
        }*/
        
        if (filter) {
          list = list.filter(function (row) {
            return Object.keys(row).some(function (key) {
              return String(row[key]).toLowerCase().indexOf(filter) > -1
            })
          })
        }
        return list;
      },
      filteredData: function () {
        var filterKey = this.search && this.search.toLowerCase()
        var data = this.data
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
      initialize() {
        this.defaultItem.loja       = store.getters.getLojaId(this.$route.params._loja);
        this.defaultItem.local      = store.getters.getLocalId(this.$route.params._local);
        this.defaultItem.dono       = store.getters.getLojaId(this.user.loja);
        this.defaultItem.donoLocal  = store.getters.getLocalLojaSingle(this.user.loja);
        this.item = this.defaultItem;
      },
      close () {
        this.deleteItem = false;
        this.editItem   = false;
        this.item       = this.defaultItem;
      },
    }
  })
</script>


