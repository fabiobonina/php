<template id="grid-lojas">
  <div>
  <v-layout row>
    <v-flex xs12>
      <v-card>
        <v-toolbar dense color="blue">
        
              
          <v-text-field v-model="configs.search" prepend-icon="search" append-icon="mic" label="Search" solo-inverted class="mx-3" flat></v-text-field>
            <v-flex xs12 sm1>
              <v-subheader v-text="'Ordernar por:'"></v-subheader>
            </v-flex>
            <v-flex xs12 sm2>
              <v-select :items="itens" v-model="configs.orderBy" item-text="name" item-value="state" return-object label="Select" solo></v-select>
            </v-flex>
          <v-flex xs12 sm1>
            <v-btn flat icon color=""
            @click.native="configs.order == 'asc'? configs.order = 'desc': configs.order = 'asc'">
            <v-icon v-if="configs.order == 'asc'" dark>arrow_downward</v-icon>
            <v-icon v-else dark>arrow_upward</v-icon>
            </v-btn>
          </v-flex>
          <v-spacer></v-spacer>
          <v-btn color="pink" dark small absolute fab right>
            <v-icon>add</v-icon>
          </v-btn>
        </v-toolbar>
        <v-list two-line>
          <template v-for="(item, index) in filteredData" >
            <v-list-tile :key="item.name" :to="'/loja/' + item.id" append v-on:click.native="" activator slot>
              <v-list-tile-content dense>
                <v-list-tile-title :key="item.id">{{item.nick}}</v-list-tile-title>
                <v-list-tile-sub-title class="text--primary"> {{ item.name }} </v-list-tile-sub-title>
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
      <loja-add v-if="modalLojaAdd" v-on:close="modalLojaAdd = false"></loja-add>
      <loja-edt v-if="modalEdt" v-on:close="modalEdt = false" :data="modalItem" :dialog ="modalEdt" @atualizar="onAtualizar"></loja-edt>
      <loja-del v-if="modalDel" v-on:close="modalDel = false" :data="modalItem" :dialog ="modalDel" @atualizar="onAtualizar"></loja-del>
      <loja-cat v-if="modalCat" v-on:close="modalCat = false" :data="modalItem" :dialog ="modalCat" @atualizar="onAtualizar"></loja-cat>
    </div>
  </div>
</template>
<script src="src/components/loja/lojas-grid.js"></script>