<template id="mod-full">
  <div>
    <v-dialog v-model="dialog" fullscreen hide-overlay persistent>
      <v-card>
        <v-toolbar dark color="primary">
          <v-btn icon dark @click.stop="$emit('close')">
            <v-icon>close</v-icon>
          </v-btn>
          <v-toolbar-title>Atendimento</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn dark flat @click.stop="saveItem()">Salvar</v-btn>
          </v-toolbar-items>
        </v-toolbar>
      <v-stepper v-model="e1" alt-labels>
        <v-stepper-header>
          <v-stepper-step :complete="e1 > 1" step="1">Trajeto</v-stepper-step>
          <v-divider></v-divider>
          <v-stepper-step :complete="e1 > 2" step="2">Serv. Inicio</v-stepper-step>
          <v-divider></v-divider>
          <v-stepper-step :complete="e1 > 3" step="3">Serv. Fim</v-stepper-step>
          <v-divider></v-divider>
          <v-stepper-step :complete="e1 > 4" step="4">Retorno</v-stepper-step>
        </v-stepper-header>

        <message v-if="temMessage" :success="successMessage" :error="errorMessage"></message>
        <loader :dialog="isLoading"></loader>
        <template>
          <!-- status inical -->
          <div class="text-xs-center">
            <v-dialog v-model="dialogInicial" hide-overlay persistent width="300">
              <v-card color="primary" dark>
                <v-card-text>
                  <span class="headline">Iniciar Trajeto ou Servio?</span>
                  <template>
                    <v-layout align-center>
                      <v-flex xs12 text-xs-center>
                        <div>
                          <v-btn @click="atendimento('1')" small color="cyan">Trajeto!</v-btn>
                          <v-btn @click="atendimento('2')" small color="success">Serviço!</v-btn>
                        </div>
                      </v-flex>
                    </v-layout>
                  </template>
                </v-card-text>
              </v-card>
            </v-dialog>
          </div>
        </template>
        <template>
          <!-- tecnicos -->
          <v-autocomplete multiple chips return-object max-height="auto"
            :items="data.tecnicos" v-model="tecnicos" label="Tecnicos" item-text="userNick"
            :error-messages="errors.collect('tecnico')" v-validate="'required'" data-vv-name="tecnico" required>
            <template slot="selection" slot-scope="data">
              <v-chip :selected="data.selected" :key="JSON.stringify(data.item)" close
                class="chip--select-multi" @input="data.parent.selectItem(data.item)" >
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
        </template>
        <v-stepper-items>
          <v-stepper-content step="1">
            <v-card class="mb-5" color="grey lighten-1" max-width="500px">
              <v-card-title>
                <v-layout align-center>
                  <v-flex xs12 text-xs-center>
                  <span class="headline">Trajeto</span>
                  </v-flex>
                </v-layout>
              </v-card-title>
              <v-card-text align-center>
                <template>
                  <v-container grid-list-md>
                    <v-layout wrap>                    
                      <v-flex xs12 sm6 md7>
                        <v-text-field
                          type="datetime-local"
                          v-model="dtInicio"
                          label="Data Inicio"
                          :error-messages="errors.collect('dtInicio')"
                          v-validate="'required'"
                          data-vv-name="dtInicio"
                          item-text="name"
                          required
                        ></v-text-field>
                      </v-flex>
                      <v-flex xs12 sm6 md2>
                        <km-desp :data="data"></km-desp>
                      </v-flex>
                    </v-layout>
                  </v-container>
                </template>
              </v-card-text>            
            </v-card>
            <template>
              <v-container grid-list-xl text-xs-center>
                <v-layout row wrap>
                  <v-flex xs12 >
                    <v-btn v-if="dtServInicio == ''" @click="servInicio()" color="primary" right> Continue </v-btn>
                    <v-btn v-else @click="e1 = 2" color="primary" right> Continue </v-btn>
                  </v-flex>
                </v-layout>
              </v-container>
            </template>
          </v-stepper-content>

          <v-stepper-content step="2">
            <v-card class="mb-5" color="grey lighten-1" max-width="500px">
              <v-card-title>
                <v-layout align-center>
                  <v-flex xs12 text-xs-center>
                  <span class="headline">Inicio do Serviço</span>
                  </v-flex>
                </v-layout>
              </v-card-title>
              <v-card-text align-center>
                <template>
                  <v-container grid-list-md>
                    <v-layout wrap>
                      <v-flex xs12 sm6 md7>
                        <v-text-field
                          type="datetime-local"
                          v-model="dtServInicio"
                          label="Inicio do Serviço"
                          :error-messages="errors.collect('dtServInicio')"
                          v-validate="'required'"
                          data-vv-name="dtServInicio"
                          item-text="name"
                          required
                        ></v-text-field>
                      </v-flex>
                      <v-flex xs12 sm6 md2>
                        <km-desp :data="data"></km-desp>
                      </v-flex>
                    </v-layout>
                  </v-container>
                  <small>*indica campo obrigatório</small>
                </template>
              </v-card-text>            
            </v-card>
            <template>
              <v-container grid-list-xl text-xs-center>
                <v-layout row wrap>
                  <v-flex xs12 >
                    <v-btn v-if="dtServFinal == ''" @click="servFim()" color="primary" right>Continue</v-btn>
                    <v-btn v-else @click="e1 = 3" color="primary" right>Continue</v-btn>
                  </v-flex>
                </v-layout>
              </v-container>
            </template>
          </v-stepper-content>
          <v-stepper-content step="3">
            <v-card class="mb-5" color="grey lighten-1" max-width="500px">
              <v-card-title>
                <v-layout align-center>
                  <v-flex xs12 text-xs-center>
                  <span class="headline">Final do Serviço</span>
                  </v-flex>
                </v-layout>
              </v-card-title>
              <v-card-text align-center>
                <template>
                <v-container grid-list-md>
                <v-layout wrap>
                  <v-flex xs12 sm6 md7>
                    <v-text-field
                      type="datetime-local"
                      v-model="dtServFinal"
                      label="Final do Serviço"
                      :error-messages="errors.collect('dtServFinal')"
                      v-validate="'required'"
                      data-vv-name="dtServFinal"
                      item-text="name"
                      required
                    ></v-text-field>
                  </v-flex>
                  <v-flex xs12 sm6 md2>
                    <km-desp :data="data"></km-desp>
                  </v-flex>
                </v-layout>
              </v-container>
              <small>*indica campo obrigatório</small>
                </template>
              </v-card-text>            
            </v-card>
            <template>
              <v-container grid-list-xl text-xs-center>
                <v-layout row wrap>
                  <v-flex xs12 >
                    <v-btn color="primary" @click="e1 = 4" right> Continue </v-btn>
                  </v-flex>
                </v-layout>
              </v-container>
            </template>
          </v-stepper-content>
        </v-stepper-items>

      </v-stepper>

        <!--v-card-title>
          <span class="headline">{{data.tecnico.userNick}} - Deslocamento</span>
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage"></message>
          <v-container grid-list-md>
            <label class="label">Status</label>
            <v-layout row wrap align-center>
              <v-flex xs12 sm4 v-for="item in deslocStatus" :key="item.id">
                <v-btn block small @click="status = item" :class="status && status.id == item.id ? 'blue white--text' : 'light'">
                  <span>{{item.name }}</span>
                </v-btn>
              </v-flex>
            </v-layout>
            <label class="label">Tipo Trajeto</label>
            <v-layout row wrap align-center >
              <v-flex xs12 sm4 v-for="item in deslocTrajetos" :key="item.id">
                <v-btn block small @click="trajeto = item" :class="trajeto && trajeto.id == item.id ? 'blue white--text' : 'light'">
                  <span>{{item.name }}</span>
                </v-btn>
              </v-flex>
            </v-layout>
            <v-layout wrap>
              <v-flex xs12 sm6 md7>
                <v-text-field
                  type="datetime-local"
                  v-model="dtInicio"
                  label="Data Inicio"
                  :error-messages="errors.collect('dtInicio')"
                  v-validate="'required'"
                  data-vv-name="dtInicio"
                  item-text="name"
                  required
                ></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md5>
                <v-text-field 
                  type="number"
                  v-model="kmInicio"
                  label="Km Inicio"
                  :error-messages="errors.collect('kmInicio')"
                  v-validate="''"
                  data-vv-name="kmInicio"
                  item-text="name"
                  :disabled="trajeto && trajeto.categoria > 0"
                ></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md7>
                <v-text-field
                  type="datetime-local"
                  v-model="dtFinal"
                  label="Data Final"
                  :error-messages="errors.collect('dtFinal')"
                  v-validate="'required'"
                  data-vv-name="dtFinal"
                  item-text="name"
                  required
                ></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md5>
                <v-text-field 
                  type="number"
                  v-model="kmFinal"
                  label="Km Final"
                  :error-messages="errors.collect('kmFinal')"
                  v-validate="''"
                  data-vv-name="kmFinal"
                  item-text="name"
                  :disabled="trajeto && trajeto.categoria > 0"
                ></v-text-field>
              </v-flex>

              <v-flex xs12 sm6 md4>
                <v-text-field 
                  type="number"
                  v-model="tempo"
                  label="Tempo"
                  :error-messages="errors.collect('tempo')"
                  v-validate="''"
                  data-vv-name="tempo"
                  item-text="name"
                  disabled
                ></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md4>
                <v-text-field 
                  type="number"
                  v-model="hhValor"
                  label="ValorHh"
                  :error-messages="errors.collect('hhValor')"
                  v-validate="''"
                  data-vv-name="hhValor"
                  item-text="name"
                  disabled
                ></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md4>
                <v-text-field 
                  type="number"
                  v-model="valor"
                  label="Valor Trajeto"
                  :error-messages="errors.collect('valor')"
                  v-validate="''"
                  data-vv-name="valor"
                  item-text="name"
                  :disabled="trajeto && trajeto.categoria != 1"
                ></v-text-field>
              </v-flex>
            </v-layout>
          </v-container>
          <small>*indica campo obrigatório</small>
        </v-card-text-->
      </v-card>
    </v-dialog>
  </div>
</template>
<script src="src/components/servicos/tecnico/mod/mod-full.js"></script>

<?php require_once 'src/components/servicos/despesa/_km.php';?>