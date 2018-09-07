<template id="bens-grid">
<div>
    <v-toolbar flat color="white">
      <v-toolbar-title>Equipamentos</v-toolbar-title>
      <v-divider class="mx-2" inset vertical></v-divider>
      <v-spacer></v-spacer>
      <v-text-field  v-model="search" append-icon="search" label="Search" single-line hide-details></v-text-field>
      <v-btn @click="modalOs = true" color="deep-orange" dark small fab>
        <v-icon>build</v-icon>
      </v-btn>
      <bem-add 
        :dialogedt="editItem" :dialogdel="deleteItem" :data="item" v-on:close="close()" >
      </bem-add>
    </v-toolbar>
    <v-data-table :headers="headers" :items="data" :search="search" class="elevation-1">
      <template slot="items" slot-scope="props">
        <td>{{ props.item.name }}</td>
        <td>{{ props.item.modelo }}</td>
        <td>{{ props.item.fabricante }}</td>
        <td>
          <v-chip v-if="props.item.categoria" small  color="green" text-color="white">
            {{ props.item.categoria.tag }}
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
  </div>
</template>

<?php require_once 'src/components/bem/_addBem.php';?>
<?php require_once 'src/components/bem/_crudBem.php';?>
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
        { text: 'Ativo', value: 'plaqueta' },
        { text: 'Info', sortable: false, value: 'info' }
      ],
      editedItem: {
        proprietario: null, localizacao: null,
        name: '', modelo: '', numeracao:'', plaqueta: '',
        produto: null, fabricante: null,
        categoria: null, dataFab: '', dataCompra: '', ativo: '',
      },
      defaultItem: {
        proprietario: null, local: null, local: null,
        produto: null, fabricante: null, categoria: null,
        name: '', modelo: '', numeracao:'', plaqueta: '',
        dataFab: '', dataCompra: '', ativo: '',
      }
    }),

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
  methods: {
    editItem (item) {
      this.editedIndex = this.desserts.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.dialog = true
    },
    deleteItem (item) {
      const index = this.desserts.indexOf(item)
      this.dialog = true
    },
    
    close () {
      this.deleteItem = false;
      this.editItem = false;
      this.item = null;
    },

  }
})
</script>


