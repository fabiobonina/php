<template id="grid-local">
  <div>
    <v-layout row>
      <v-flex xs12>
        <v-card>
          <v-toolbar dense color="blue">
            <v-toolbar-title class="white--text">locais</v-toolbar-title>
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
            <template v-for="(item, index) in filteredData">
              <v-list-tile append v-on:click.native="" activator slot>
                <v-list-tile-content dense>
                  <router-link :to="'/organizacao/loja/' +  item.loja + '/local/' + item.id">
                    <v-list-tile-title :key="item.id"> {{item.tipo}} - {{item.name}} </v-list-tile-title>
                    <v-list-tile-sub-title class="text--primary">  {{item.municipio}} /{{item.uf}} </v-list-tile-sub-title>
                  </router-link>
                  <v-list-tile-sub-title>
                  <v-chip small  color="primary" text-color="white" >
                    Regional: {{item.regional}} 
                  </v-chip>
                </v-list-tile-sub-title>
                </v-list-tile-content>
                <v-btn icon dark large color="primary" :disabled=" 0.000000 == item.latitude" :href="'https://maps.google.com/maps?q='+ item.latitude + ',' + item.longitude" target="_blank">
                  <v-icon dark>directions</v-icon>
                </v-btn>
                <local-crud :data="item"/>
              </v-list-tile>
                <div>
                  <v-chip small v-for="categoria in item.categoria" :key="categoria.id" color="green" text-color="white">
                    {{ categoria.tag }}
                  </v-chip>
                </div>
              <v-divider v-if="index + 1 < filteredData.length" :key="index"></v-divider>
            </template>
          </v-list>
        </v-card>
      </v-flex>
    </v-layout>
  </div>
</template>

<?php require_once 'src/components/local/_crudLocal.php';?>

<script>
  Vue.component('grid-local', {
    template: '#grid-local',
    props: {
      data: Array
    },
    data: function () {
      return {
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
        return _.filter(list, function (row) {
          return Object.keys(row).some(function (key) {
            return String(row[key]).toLowerCase().indexOf(filter) > -1
          })
        })
      }
    },
    methods: {   
    }
  });
</script>
