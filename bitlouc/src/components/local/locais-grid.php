<template id="grid-local">
  <div>
    <v-card>
      <v-card-title>
        <v-toolbar-title>Locais</v-toolbar-title>
        <v-divider class="mx-2" inset vertical></v-divider>
        <v-spacer></v-spacer>
        <v-text-field  v-model="search" append-icon="search" label="Search" single-line hide-details></v-text-field>
        <v-btn v-if="user.nivel > 2 && user.grupo == 'P'"  @click="modalAdd=true" color="pink" fab small dark>
          <v-icon>add</v-icon>
        </v-btn>
      </v-card-title>
      <v-data-table :headers="headers" :items="data" :search="search">
        <template slot="items" slot-scope="props">
          <td>
            <router-link :to="'/loja/' +  props.item.loja_id + '/local/' + props.item.id"> {{ props.item.tipo }} {{ props.item.name }} </router-link>
          </td>
          <td> {{ props.item.regional }} </td>
          <td>{{ props.item.municipio }}/ {{ props.item.uf }}</td>
          <td>
            <local-rota :lat="props.item.latitude" :long="props.item.longitude"></local-rota>
          </td>
          <td> {{ props.item.latitude }},{{ props.item.longitude }} </td>
          <td>
            <v-chip v-for="categoria in props.item.categoria" :key="categoria.id" small  color="green" text-color="white">
              {{ categoria.tag }}
            </v-chip>
          </td>
          <td>{{ props.item.dtVisitado }} </td>
          <td class="text-xs-right"> {{ props.item.id }} </td>
          <td class="text-xs-right"> 
            <local-crud :data="props.item"></local-crud>
          </td>
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

<?php require_once 'src/components/local/_addLocal.php';?>
<?php require_once 'src/components/local/_rotaLocal.php';?>
<?php require_once 'src/components/local/_crudLocal.php';?>

<script>
  Vue.component('grid-local', {
    template: '#grid-local',
    props: {
      data: Array
    },
    data: function () {
      return {
        modalAdd: false,
        search: '',
        headers: [
          { text: 'Nome', align: 'left', value: 'name' },
          { text: 'Regional', value: 'regional' },
          { text: 'Municipio/UF', value: 'municipio' },
          { text: 'Rota', sortable: false, value: 'latitude' },
          { text: 'Geolocalização', sortable: false, value: 'latitude' },
          { text: 'Categoria', sortable: false, value: 'categoria' },
          { text: 'Visitado', sortable: false, value: 'dtVisitado' },
          { text: 'ID', value: 'id' },
          { text: 'Info', sortable: false, value: 'info' },
        ],
      }
    },
    computed: {
      user()  {
        return store.state.user;
      },
    },
    methods: {   
    }
  });
</script>
