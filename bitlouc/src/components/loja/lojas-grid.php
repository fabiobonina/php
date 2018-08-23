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
              <v-list-tile-content dense >
                <router-link :to="'/loja/' + item.id">
                <v-list-tile-title :key="item.id">{{item.nick}}</v-list-tile-title>
                <v-list-tile-sub-title class="text--primary"> {{ item.name }} </v-list-tile-sub-title>
                </router-link>
              </v-list-tile-content>
              <v-list-tile-action>
                Localidades: {{ item.locaisQt }} {{ item.locaisGeoStatus }}% ({{ item.locaisGeoQt }})
              </v-list-tile-action>
            </v-list-tile>
            <v-list-tile @click="" light>
              <v-list-tile-content>
                <v-chip small >Seguimento: {{item.seguimento}} </v-chip>
              </v-list-tile-content>
              <div>
                <v-chip small v-for="categoria in item.categoria" :key="categoria.id">
                  {{ categoria.tag }}
                </v-chip>
              </div>
              <v-list-tile-action>
                <v-menu v-if="user.nivel > 2 && user.grupo == 'P'" open-on-hover top offset-y left  @click="">
                  <v-btn slot="activator" icon>
                    <v-icon>more_vert</v-icon>
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
                  </v-list>
                </v-menu>
              </v-list-tile-action>
            </v-list-tile>
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
<script src="src/components/loja/lojas-grid.js"></script>

<?php require_once 'src/components/loja/_addLoja.php';?>
<?php require_once 'src/components/loja/_edtLoja.php';?>
<?php require_once 'src/components/loja/_delLoja.php';?>
<?php require_once 'src/components/loja/_catLoja.php';?>