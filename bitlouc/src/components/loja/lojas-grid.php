<template id="grid-lojas">
  <div>
  <v-layout row>
    <v-flex xs12>
    <v-card>
          <v-card-title>
            <v-toolbar-title>Lojas</v-toolbar-title>
            <v-divider class="mx-2" inset vertical></v-divider>
            <v-spacer></v-spacer>
            <v-text-field  v-model="search" append-icon="search" label="Search" single-line hide-details></v-text-field>
            <v-btn v-if="user.nivel > 2 && user.grupo == 'P'"  @click="modalAdd=true" color="pink" fab small dark>
              <v-icon>add</v-icon>
            </v-btn>
          </v-card-title>
          <v-data-table :headers="headers" :items="data" :search="search">
            <template slot="items" slot-scope="props">
              <td>{{ props.item.nick }}</td>
              <td>{{ props.item.name }}</td>
              <td>{{ props.item.seguimento }}</td>
              <td>
                <v-chip small color="indigo" text-color="white">
                  <v-avatar class="indigo darken-4"><v-icon small class="icon">mdi-home-modern</v-icon> </v-avatar>
                  {{ props.item.locaisQt }} <v-icon small class="icon">mdi-map-marker</v-icon>
                  {{ props.item.locaisGeoStatus }}% ({{ props.item.locaisGeoQt }})
                </v-chip>
              </td>
              <td class="text-xs-right">
                <v-chip v-for="categoria in props.item.categoria" :key="categoria.id" small  color="green" text-color="white">
                  {{ categoria.tag }}
                </v-chip>
              </td>
              <td class="text-xs-right"> <loja-crud :data="props.item"/> </td>
            </template>
            <v-alert slot="no-results" :value="true" color="error" icon="warning">
              Your search for "{{ search }}" found no results.
            </v-alert>
          </v-data-table>
        </v-card>
      <v-card>

        <v-list two-line>
          <template v-for="(item, index) in filteredData" >

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
          </template>
        </v-list>
      </v-card>
      
    </v-flex>
  </v-layout>
  </div>
</template>

<?php require_once 'src/components/loja/_addLoja.php';?>
<?php require_once 'src/components/loja/_crudLoja.php';?>
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
          { text: 'Razão Social', align: 'left', value: 'nick' },
          { text: 'Nome', value: 'name' },
          { text: 'Seguimento', value: 'seguimento' },
          { text: 'Locais', sortable: false, value: 'locais' },
          { text: 'Categoria', sortable: false, value: 'categoria' },
          { text: 'Info', sortable: false, value: 'info' }
        ],
      }
    },
    computed: {
      user()  {
        return store.state.user;
      },
    },
    methods: {
      onAtualizar: function(){
        this.$store.dispatch("fetchIndex").then(() => {
          console.log("Buscando dados para inicial!")
        });
      }
    }
  });
</script>

