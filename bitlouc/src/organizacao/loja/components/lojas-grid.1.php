<template id="grid-lojas">
  <div>
  <v-layout row>
    <v-flex xs12>
      <v-card>
        <v-toolbar dense color="blue">
          <v-toolbar-title class="white--text">lojas</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-btn v-if="user.nivel > 2 && user.grupo == 'P'"  @click="modalAdd=true" color="pink" dark small absolute fab right>
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
          <template v-for="(item, index) in filteredData" >
            <v-list-tile :key="item.name" @click="" append activator slot>
              <v-list-tile-content>
                <router-link :to="'/organizacao/loja/' + item.id">
                <v-list-tile-title :key="item.id">{{item.nick}}</v-list-tile-title>
                <v-list-tile-sub-title class="text--primary"> {{ item.name }} </v-list-tile-sub-title>
                </router-link>
                <v-list-tile-sub-title>
                  <v-chip small color="cyan" text-color="white">
                  Seguimento: {{item.seguimento}}
                  </v-chip>
                </v-list-tile-sub-title>
              </v-list-tile-content>
              <v-chip small color="indigo" text-color="white">
                <v-avatar class="indigo darken-4">
                  <v-icon small class="icon">mdi-home-modern</v-icon>
                </v-avatar>
                {{ item.locaisQt }} <v-icon small class="icon">mdi-map-marker</v-icon>
                {{ item.locaisGeoStatus }}% ({{ item.locaisGeoQt }})
              </v-chip>
              <v-menu v-if="user.nivel > 2 && user.grupo == 'P'" bottom left  @click="">
                <v-btn slot="activator" small color="blue darken-2" dark fab>
                  <v-icon>mdi-information-variant</v-icon>
                </v-btn>
                <v-list>
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
                  </v-list-tile>
                </v-list>
              </v-menu>
            </v-list-tile>
            <div>
              <v-chip v-for="categoria in item.categoria" :key="categoria.id" small  color="green" text-color="white">
                {{ categoria.tag }}
              </v-chip>
            </div>
            <v-divider v-if="index + 1 < filteredData.length" :key="index"></v-divider>
          </template>
        </v-list>
      </v-card>
      
    </v-flex>
  </v-layout>
    <div>
      <loja-add v-if="modalAdd" v-on:close="modalAdd = false" :dialog="modalAdd" ></loja-add>
      <loja-edt v-if="modalEdt" v-on:close="modalEdt = false" :dialog="modalEdt" :data="modalItem" @atualizar="onAtualizar"></loja-edt>
      <loja-del v-if="modalDel" v-on:close="modalDel = false" :dialog="modalDel" :data="modalItem" @atualizar="onAtualizar"></loja-del>
      <loja-cat v-if="modalCat" v-on:close="modalCat = false" :dialog="modalCat" :data="modalItem" @atualizar="onAtualizar"></loja-cat>
    </div>
  </div>
</template>

<?php require_once 'src/components/loja/_addLoja.php';?>
<?php require_once 'src/components/loja/_edtLoja.php';?>
<?php require_once 'src/components/loja/_delLoja.php';?>
<?php require_once 'src/components/loja/_catLoja.php';?>

<script>
  Vue.component('grid-lojas', {
    template: '#grid-lojas',
    props: {
      data: Array,
    },
    data: function () {
      return {
        modalItem: {},
        modalEdt: false,
        modalDel: false,
        modalCat: false,
        modalAdd: false,
        configs: {
          orderBy: { name: 'Nome', state: 'name' },
          order: 'asc',
          search: ''
        },
        itens: [
          { name: 'Nome', state: 'name' },
          { name: 'Seguimento', state: 'seguimento' }
        ],
        search: '',
        headers: [
          { text: 'Razão Social', align: 'left', sortable: false, value: 'nick' },
          { text: 'Nome', value: 'name' },
          { text: 'Seguimento', value: 'seguimento' },
          { text: 'Carbs (g)', value: 'carbs' },
          { text: 'Protein (g)', value: 'protein' },
          { text: 'Iron (%)', value: 'iron' }
        ],
        desserts: [
          { value: false, name: 'Frozen Yogurt', calories: 159, fat: 6.0, carbs: 24, protein: 4.0, iron: '1%'},
        ],
      }
    },
    computed: {
      user()  {
        return this.$store.state.user;
      },
      filteredData() {
        const filter = this.configs.search && this.configs.search.toLowerCase(); 
        const list = _.orderBy(this.data, this.configs.orderBy.state, this.configs.order);
        if (_.isEmpty(filter)) {
          return list;
        }
        //return _.filter(list, repo => repo.name.indexOf(filter) >= 0);

        return _.filter(list, function (row) {
          return Object.keys(row).some(function (key) {
            return String(row[key]).toLowerCase().indexOf(filter) > -1
          })
        })
      }
    },
    methods: {
      selecItem: function(data){
        this.modalItem = data;
      },
      onAtualizar: function(){
        this.$store.dispatch("fetchIndex").then(() => {
          console.log("Buscando dados para inicial!")
        });
        this.modalEdt = false,
        this.modalDel = false,
        this.modalCat = false
      }
    }
  });
</script>

