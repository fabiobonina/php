<template id="list-lojas">
  <div>
    <v-layout row>
      <v-flex xs12>
        <v-card>
          <v-card-title>
            Nutrition
            <v-spacer></v-spacer>
            <v-text-field
              v-model="search"
              append-icon="search"
              label="Search"
              single-line
              hide-details
            ></v-text-field>
          </v-card-title>
          <v-data-table
            :headers="headers"
            :items="desserts"
            :search="search"
          >
            <template slot="items" slot-scope="props">
              <td>{{ props.item.name }}</td>
              <td class="text-xs-right">{{ props.item.calories }}</td>
              <td class="text-xs-right">{{ props.item.fat }}</td>
              <td class="text-xs-right">{{ props.item.carbs }}</td>
              <td class="text-xs-right">{{ props.item.protein }}</td>
              <td class="text-xs-right">{{ props.item.iron }}</td>
            </template>
            <v-alert slot="no-results" :value="true" color="error" icon="warning">
              Your search for "{{ search }}" found no results.
            </v-alert>
          </v-data-table>
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
  Vue.component('list-lojas', {
    template: '#list-lojas',
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
          { text: 'Dessert (100g serving)', align: 'left', sortable: false, value: 'name' },
          { text: 'Calories', value: 'calories' },
          { text: 'Fat (g)', value: 'fat' },
          { text: 'Carbs (g)', value: 'carbs' },
          { text: 'Protein (g)', value: 'protein' },
          { text: 'Iron (%)', value: 'iron' }
        ],
        desserts: [
          { value: false, name: 'Frozen Yogurt', calories: 159, fat: 6.0, carbs: 24, protein: 4.0, iron: '1%'},
        ],
      },
    },
    computed: {
      user()  {
        return store.state.user;
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

