<template id="bens-grid">
  <div>
    
    <div>
      <div class="radio">
        <label><input type="radio" v-model="selectedCategoria" value="All">All </label>&nbsp;&nbsp;&nbsp;
        <label v-for=" categoria in categorias"><input type="radio" v-model="selectedCategoria" v-bind:value="categoria.id">{{ categoria.name }} &nbsp;&nbsp;&nbsp;</label>
      </div>
    </div>
    <!-- #/SELEÇÃO DE CATEGORIA -->
    <section>
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
              <v-btn flat icon
              @click.native="configs.order == 'asc'? configs.order = 'desc': configs.order = 'asc'">
              <v-icon v-if="configs.order == 'asc'" dark>arrow_downward</v-icon>
              <v-icon v-else dark>arrow_upward</v-icon>
              </v-btn>
            </v-flex>
            <v-spacer></v-spacer>
            <v-btn v-if="user.nivel > 2 && user.grupo == 'P'"  @click="modalAdd=true" color="pink" dark small absolute fab right>
              <v-icon>add</v-icon>
            </v-btn>
          </v-toolbar>
          <v-list two-line>
            <template v-for="(item, index) in filteredData">
              <v-list-tile :to="'/loja/' + $route.params._id + '/local/' + item.id" append v-on:click.native="" activator slot>
                <v-list-tile-content dense>
                  <v-list-tile-title :key="item.id"> {{item.name}} - {{item.modelo}} </v-list-tile-title>
                  <v-list-tile-sub-title class="text--primary">  {{item.fabricanteNick}} #{{item.proprietarioNick}} </v-list-tile-sub-title>
                </v-list-tile-content>
                <v-list-tile-action>
                  <v-list-tile-action-text>TAG: {{ item.numeracao }}</v-list-tile-action-text>
                  <v-list-tile-action-text>Ativo: {{ item.plaqueta }}</v-list-tile-action-text>
                </v-list-tile-action>                
              </v-list-tile>
              <v-list-tile @click="" light>
                <v-list-tile-content>
                  <v-chip small  color="primary" text-color="white" >Regional: {{item.regional}} </v-chip>
                </v-list-tile-content>
                <div>
                  <v-chip small v-for="categoria in item.categoria" :key="categoria.id" color="green" text-color="white">
                    {{ categoria.tag }}
                  </v-chip>
                </div>
                <v-btn :disabled=" 0.000000 == item.latitude" :href="'https://maps.google.com/maps?q='+ item.latitude + ',' + item.longitude" target="_blank" fab dark color="primary">
                  <v-icon dark>directions</v-icon>
                </v-btn>
                <v-list-tile-action>
                  <v-menu v-if="user.nivel > 2 && user.grupo == 'P'" open-on-hover top offset-y left  @click="">
                    <v-btn slot="activator" icon>
                      <v-icon>more_vert</v-icon>
                    </v-btn>
                    <v-list>
                      <v-list-tile @click="modalGeo = true; selecItem(item)">
                        <v-list-tile-title>
                          <v-icon>location_on</v-icon>Geoposição
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
                </v-list-tile-action>
              </v-list-tile>
              <v-divider v-if="index + 1 < filteredData.length" :key="index"></v-divider>
            </template>
          </v-list>
        </v-card>
      </v-flex>
    </v-layout>
        <article class="post" v-for="item in filteredData">
          <div class="columns">
            <div class="column is-6">
              <nav class="level">
                <div class="level-item has-text-centered">
                <div class="level-item has-text-centered">
                  <div>
                    <p><button v-on:click="modalOsAdd = true; selecItem(item)" class="button">Abrir OS</button></p>
                  </div>
                </div>
                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading">Ação</p>
                    <div class="dropdown is-right is-hoverable">
                      <div class="dropdown-trigger">
                        <a aria-haspopup="true" aria-controls="dropdown-menu1">
                          <span class="title is-2 mdi mdi-apps"></span>
                        </a>
                      </div>
                      <div class="dropdown-menu" id="dropdown-menu1" role="menu">
                        <div class="dropdown-content">
                          <a @click="modalOsAdd = true; selecItem(item)" class="dropdown-item">
                            <span class="mdi mdi-wrench"></span>OS
                          </a>
                          <a @click="modalCat = true; selecItem(item)" class="dropdown-item">
                            <span class="mdi mdi-tag-multiple"></span>Categoria
                          </a>
                          <a @click="modalEdt = true; selecItem(item)" class="dropdown-item">
                            <span class="mdi mdi-pencil"></span>Edit
                          </a>
                          <a @click="modalDel = true; selecItem(item)" class="dropdown-item">
                            <span class="mdi mdi-delete"></span>Delete
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </article>
      </div>
    </section>
    <os-add v-if="modalOsAdd" v-on:close="modalOsAdd = false"  v-on:atualizar="onAtualizar" :data="modalItem"></os-add>
  </div>
</template>
<script src="src/components/bem/bens-grid.js"></script>