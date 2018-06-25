<template id="os-tec">
<div>
    <v-dialog v-model="dialog" persistent scrollable  max-width="500px">
      <v-card>
        <v-card-title>
          <span class="headline">{{ data.local.tipo }} - {{ data.local.name }} - Editar OS</span>
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage"></message>
          <v-container grid-list-md>
            <v-layout wrap>
              <v-flex xs12>
              <div v-if="data.bem">
                <p>{{ data.bem.name }} - {{ data.bem.modelo }} <i class="fa fa-qrcode"></i> {{ data.bem.numeracao }} <i class="fa fa-fw fa-barcode"></i>{{ data.bem.plaqueta }}</p>
              </div>
              <h2 class="subtitle">Tecnicos</h2>
              <div v-for="item in _os.tecnicos">
                <h2 class="subtitle"> {{ item.userNick }}
                  <a @click="tecDelete(item)" class="button  is-small is-danger">Del &nbsp;
                    <span class="icon is-small">
                      <span class="mdi mdi-close"></span>
                    </span>
                  </a>
                </h2>
              </div>
              <v-flex xs12>
                <v-autocomplete
                  :items="_tecnicos"
                  v-model="data.tecnicos"
                  label="Tecnico"
                  item-text="userNick"
                  multiple
                  chips
                  return-object
                  max-height="auto"
                  :error-messages="errors.collect('tecnico')" v-validate="'required'" data-vv-name="tecnico"
                  required
                >
                  <template slot="selection" slot-scope="data">
                    <v-chip
                      :selected="data.selected"
                      :key="JSON.stringify(data.item)"
                      close
                      class="chip--select-multi"
                      @input="data.parent.selectItem(data.item)"
                    >
                      <v-avatar>
                        <img :src="data.item.avatar">
                      </v-avatar>
                      {{ data.item.userNick }}
                    </v-chip>
                  </template>
                  <template slot="item" slot-scope="data">
                    <template v-if="typeof data.item !== 'object'">
                      <v-list-tile-content v-text="data.item"></v-list-tile-content>
                    </template>
                    <template v-else>
                      <v-list-tile-avatar>
                        <img :src="data.item.avatar">
                      </v-list-tile-avatar>
                      <v-list-tile-content>
                        <v-list-tile-title v-html="data.item.userNick"></v-list-tile-title>
                        <v-list-tile-sub-title v-html="data.item.email"></v-list-tile-sub-title>
                      </v-list-tile-content>
                    </template>
                  </template>
                </v-autocomplete>
              </v-flex>
            </v-layout>
          </v-container>
          <small>*indica campo obrigatório</small>

        </v-card-text>
        <v-card-actions>
          <template v-if="isLoading">
              <v-spacer></v-spacer>
              <v-progress-circular :size="40" :width="5" indeterminate color="primary"></v-progress-circular>
              <v-spacer></v-spacer>
          </template>
          <template v-else>
            <v-btn flat @click.stop="$emit('close')">Fechar</v-btn>
            <v-spacer></v-spacer>
            <v-btn color="primary" flat @click.stop="saveItem()">Salvar</v-btn>
          </template>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
  <div class="modal is-active" >
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">OS: {{ data.local.tipo }} - {{ data.local.name }} </p>
        <button class="delete" aria-label="close" v-on:click="$emit('close')"></button>
      </header>
      <section class="modal-card-body">
        <message :success="successMessage" :error="errorMessage"></message>
        <!--#CONTEUDO -->
        
        <div v-if='data'>
          <p>{{ data.name }} - {{ data.modelo }} <i class="fa fa-qrcode"></i> {{ data.numeracao }} <i class="fa fa-fw fa-barcode"></i>{{ data.plaqueta }}</p>
        </div>
        <h2 class="subtitle">Tecnicos</h2>
        <div v-for="item in _os.tecnicos">
          <h2 class="subtitle"> {{ item.user }}
            <a @click="tecDelete(item)" class="button  is-small is-danger">Del &nbsp;
              <span class="icon is-small">
                <span class="mdi mdi-close"></span>
              </span>
            </a>
          </h2>
        </div>
        <br>

        <div class="field is-horizontal">
          <div class="field-label">
            <label class="label">Tecnicos</label>
          </div>
          <div class="field-body">
            <div class="field has-addons">
              <p class="control">
                <a class="button is-static">
                  <span class="mdi mdi-worker"></span>
                </a>
              </p>
              <p class="control">
                <v-select multiple label="userNick" v-model="tecnicos" :options="_tecnicos"></v-select>
              </p>
            </div>
          </div>
        </div>
        <br>
        <br>
        <!--#CONTEUDO -->
      </section>
      <footer class="modal-card-foot field is-grouped is-grouped-right">
        <button class="button" v-on:click="$emit('close')">Cancel</button>
        <button :class="isLoading ? 'button is-info is-loading' : 'button is-info'" v-on:click="saveItem()">Save</button>
      </footer>
    </div>
  </div>
</template>
<script src="src/components/os/_tecOs.js"></script>