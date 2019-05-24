<template id="bens-grid">
  <div>
    <div>
      <label><input type="radio" v-model="selectedCategoria" value="0">All </label>&nbsp;&nbsp;&nbsp;
      <label v-for=" categoria in categorias" :key="categoria.id"><input type="radio" v-model="selectedCategoria" v-bind:value="categoria.id">{{ categoria.name }} &nbsp;&nbsp;&nbsp;</label>
    </div>
    <div>
      <v-layout row>
        <v-flex xs12>
          <v-card>
            <v-toolbar dense color="blue">
              <v-toolbar-title class="white--text">bens</v-toolbar-title>
              <v-spacer></v-spacer>
              <v-btn @click="modalOs = true" color="deep-orange" dark small fab left>
                <v-icon>build</v-icon>
              </v-btn>
              <v-btn v-if="user.nivel > 2 && user.grupo == 'P'"  @click="modalAdd=true" color="pink" dark small fab right>
                <v-icon>add</v-icon>
              </v-btn>
            </v-toolbar>
            <v-layout wrap>
              <v-text-field v-model="configs.search" append-icon="search" label="Search" solo-inverted class="mx-3" flat></v-text-field>
              <v-flex xs3 sm6 md1>
                <v-subheader v-text="'Orden:'"></v-subheader>
              </v-flex>
              <v-flex xs5 sm6 md2>
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
              <v-flex xs1 sm2 md1>
                <v-btn flat icon color="blue"
                  @click.native="configs.order == 'asc'? configs.order = 'desc': configs.order = 'asc'">
                  <v-icon v-if="configs.order == 'asc'" dark>arrow_downward</v-icon>
                  <v-icon v-else dark>arrow_upward</v-icon>
                </v-btn>
              </v-flex>
            </v-layout>
            <v-list two-line>
            
              <template v-for="(item, index) in filteredData">
                <v-list-tile  append v-on:click.native="" activator slot>
                  <v-list-tile-content v-on:click.native=""    dense>
                    <router-link :to="'/organizacao/loja/' + $route.params._loja + '/local/' + $route.params._local ">
                      <v-list-tile-title    :key="item.id"> {{item.name}} - {{item.modelo}} </v-list-tile-title>
                      <v-list-tile-sub-title class="text--primary">  {{item.fabricanteNick}} #{{item.proprietarioNick}} </v-list-tile-sub-title>
                    </router-link>
                  </v-list-tile-content>
                  <v-btn @click="modalOs = true; selecItem(item)" icon ripple>
                    <v-icon color="grey lighten-1">build</v-icon>
                  </v-btn>
                  <v-chip small color="green" text-color="white">
                    {{ item.categoria.tag }}
                  </v-chip>
                  <v-list-tile-action>
                    <v-list-tile-action-text>TAG: {{ item.numeracao }}</v-list-tile-action-text>
                    <v-list-tile-action-text>Ativo: {{ item.plaqueta }}</v-list-tile-action-text>
                  </v-list-tile-action>
                    <v-menu v-if="user.nivel > 2 && user.grupo == 'P'" open-on-hover top offset-y left  @click="">
                      <v-btn slot="activator" icon ripple>
                        <v-icon color="grey lighten-1">info</v-icon>
                      </v-btn>
                      <v-list>
                        <v-list-tile @click="modalOs = true; selecItem(item)">
                          <v-list-tile-title>
                            <v-icon>build</v-icon>OS
                          </v-list-tile-title>
                        </v-list-tile>
                        <v-list-tile @click="modalCat = true; selecItem(item)">
                          <v-list-tile-title>
                            <v-icon>label</v-icon></span>Categoria
                          </v-list-tile-title>
                        </v-list-tile>
                        <v-list-tile @click="modalEdt = true; selecItem(item)">
                          <v-list-tile-title>
                            <v-icon>create</v-icon>Editar
                          </v-list-tile-title>
                        </v-list-tile>
                        <v-list-tile v-if="user.nivel > 3" @click="modalDel = true; selecItem(item)">
                          <v-list-tile-title>
                            <v-icon>delete</v-icon>Delete
                          </v-list-tile-title>
                        </v-list-tile>
                      </v-list>
                    </v-menu>
                </v-list-tile>
                <v-divider v-if="index + 1 < filteredData.length" :key="index"></v-divider>
              </template>
            </v-list>
          </v-card>
        </v-flex>
      </v-layout>
    </div>
    <os-add v-if="modalOs" v-on:close="modalOs = false; modalItem = null" :dialog="modalOs" :data="modalItem"></os-add>
  </div>
</template>

<?php require_once 'src/components/equipamento/_addBem.php';?>
<?php require_once 'src/components/equipamento/_edtBem.php';?>
<?php require_once 'src/components/equipamento/_delBem.php';?>

<?php require_once 'src/components/os/_addOs.php';?>


<script>
Vue.component('bens-grid', {
  template: '#bens-grid',
  props: {
    data: Array,
    categorias: Array,
    status: String,
    filterKey: String
  },
  data: function () {
    return {
      modalItem: null,
      modalAdd: false,
      modalEdt: false,
      modalDel: false,
      modalCat: false,
      modalOs: false,
      selectedCategoria: '0',
      configs: {
        orderBy: { name: 'Nome', state: 'name' },
        order: 'asc',
        search: ''
      },
      itens: [
        { name: 'Nome', state: 'name' },
        { name: 'Regional', state: 'regional' }
      ],
    }
  },
  mounted: function() {
    //this.modalOsAdd = true;
  },
  computed: {
    user()  {
      return this.$store.state.user;
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
    onClose: function(){
      this.showModal = false;
      this.$emit('atualizar');
    },
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


