<template id="mod-add">
  <div>
    <v-dialog v-model="dialog" fullscreen hide-overlay persistent>
      <v-card color="light-blue lighten-3">
        <v-card-title>
          <span class="headline">{{}} - Atendimento</span>
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage"></message>
          <loader :dialog="isLoading"></loader>
          <v-container grid-list-md>
            <v-layout wrap>
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
              <v-flex xs12 sm6 md5>
                <v-switch :label="trajetoInicial ? 'C/Trajeto inicial' : 'S/Trajeto inicial'" v-model="trajetoInicial" color="info"></v-switch>
              </v-flex>
              <v-flex xs8 sm8 md4>
                <v-text-field solo
                  type="date"
                  v-model="dateInicio"
                  label="Inicio trajeto"
                  :error-messages="errors.collect('dateInicio')"
                  :v-validate="!trajetoInicial ?'required':''"
                  data-vv-name="dateInicio"
                  item-text="name"
                  :disabled="!trajetoInicial"
                  :required="!trajetoInicial"
                ></v-text-field>
              </v-flex>
              <v-flex xs4 sm4 md3>
                <v-text-field solo
                  type="time"
                  v-model="horaInicio"
                  label="Inicio trajeto"
                  :error-messages="errors.collect('horaInicio')"
                  :v-validate="!trajetoInicial ?'required':''"
                  data-vv-name="horaInicio"
                  item-text="name"
                  :disabled="!trajetoInicial"
                  :required="!trajetoInicial"
                ></v-text-field>
              </v-flex>
              <v-flex xs8 sm8 md4>
                <v-text-field solo
                  type="date"
                  v-model="dateInicio"
                  label="Inicio trajeto"
                  :error-messages="errors.collect('dateInicio')"
                  :v-validate="!trajetoInicial ?'required':''"
                  data-vv-name="dateInicio"
                  item-text="name"
                  :disabled="!trajetoInicial"
                  :required="!trajetoInicial"
                ></v-text-field>
              </v-flex>
              <v-flex xs4 sm4 md3>
                <v-text-field solo
                  type="time"
                  v-model="horaInicio"
                  label="Inicio trajeto"
                  :error-messages="errors.collect('horaInicio')"
                  :v-validate="!trajetoInicial ?'required':''"
                  data-vv-name="horaInicio"
                  item-text="name"
                  :disabled="!trajetoInicial"
                  :required="!trajetoInicial"
                ></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md7>
                <v-text-field solo
                  type="datetime-local"
                  v-model="dtInicio"
                  label="Inicio trajeto"
                  :error-messages="errors.collect('dtInicio')"
                  :v-validate="!trajetoInicial ?'required':''"
                  data-vv-name="dtInicio"
                  item-text="name"
                  :disabled="!trajetoInicial"
                  :required="!trajetoInicial"
                ></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md6>
                <v-text-field solo
                  type="datetime-local"
                  v-model="dtServInicio"
                  label="Inicio serviço"
                  :error-messages="errors.collect('dtServInicio')"
                  v-validate="'required'"
                  data-vv-name="dtServInicio"
                  item-text="name"
                  required
                ></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md6>
                <v-text-field solo
                  type="datetime-local"
                  v-model="dtServFinal"
                  label="Final serviço"
                  :error-messages="errors.collect('dtServFinal')"
                  v-validate="'required'"
                  data-vv-name="dtServFinal"
                  item-text="name"
                  required
                ></v-text-field>
              </v-flex>
              
              <v-flex xs12 sm6 md5>
                <v-switch :label="trajetoFinal ? 'C/Trajeto final' : 'S/Trajeto final'" v-model="trajetoFinal" color="info"></v-switch>
              </v-flex>
              <v-flex xs12 sm6 md7>
                <v-text-field solo
                  type="datetime-local"
                  v-model="dtInicio"
                  label="Inicio trajeto"
                  :error-messages="errors.collect('dtInicio')"
                  :v-validate="!trajetoFinal ?'required':''"
                  data-vv-name="dtInicio"
                  item-text="name"
                  :disabled="!trajetoFinal"
                  :required="!trajetoFinal"
                ></v-text-field>
              </v-flex>

              <v-flex xs6 sm6 md6>
                <v-text-field solo
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
              <v-flex xs6 sm6 md6>
                <v-text-field solo
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
            </v-layout>
          </v-container>
          <small>*indica campo obrigatório</small>
        </v-card-text>
        <v-card-actions>
            <v-btn flat @click.stop="$emit('close')">Fechar</v-btn>
            <v-spacer></v-spacer>
            <v-btn color="primary" flat @click.stop="saveItem()">Salvar</v-btn>
        </v-card-actions>
      </v-card>
      <template>
  <v-stepper v-model="e6" vertical>
    <v-stepper-step editable :complete="e6 > 1" step="1">
      {{ dtInicio }}
      <small>Inicio Atendimento</small>
    </v-stepper-step>

    <v-stepper-content step="1">
    <v-card class="mb-5" color="grey lighten-1" max-width="500px">
              <v-card-title>
                <v-layout align-center>
                  <v-flex xs12 text-xs-center>
                    <span class="headline">Trajeto Inicial</span>
                  </v-flex>
                </v-layout>
              </v-card-title>
              <v-card-text align-center>
                <template>
                  <v-container grid-list-md>
                    <v-layout wrap>
                      <v-flex xs7 sm7 md7>
                        <v-text-field
                          type="date"
                          v-model="dateInicio"
                          label="Data Inicio"
                          :error-messages="errors.collect('dateInicio')"
                          v-validate="'required'"
                          data-vv-name="dateInicio"
                          item-text="name"
                          required
                        ></v-text-field>
                      </v-flex>
                      <v-flex xs5 sm5 md5>
                        <v-text-field
                          type="time"
                          v-model="horaInicio"
                          label="Hora Inicio"
                          :error-messages="errors.collect('horaInicio')"
                          v-validate="'required'"
                          data-vv-name="horaInicio"
                          item-text="name"
                          required
                        ></v-text-field>
                      </v-flex>
                      <v-flex xs12 sm12 md12>
                        <km-desp :data="data"></km-desp>
                      </v-flex>
                    </v-layout>
                  </v-container>
                </template>
              </v-card-text>            
            </v-card>
      <v-btn color="primary" @click="e6 = 2">Continue</v-btn>
      <v-btn flat>Cancel</v-btn>
    </v-stepper-content>

    <v-stepper-step editable :complete="e6 > 2" step="2">
      Configure analytics for this app
      <small>Inicio Serviço</small>
    </v-stepper-step>

    <v-stepper-content step="2">
      <v-card color="grey lighten-1" class="mb-5" height="200px"></v-card>
      <v-btn color="primary" @click="e6 = 3">Continue</v-btn>
      <v-btn flat>Cancel</v-btn>
    </v-stepper-content>

    <v-stepper-step editable :complete="e6 > 3" step="3">Select an ad format and name ad unit</v-stepper-step>

    <v-stepper-content step="3">
      <v-card color="grey lighten-1" class="mb-5" height="200px"></v-card>
      <v-btn color="primary" @click="e6 = 4">Continue</v-btn>
      <v-btn flat>Cancel</v-btn>
    </v-stepper-content>

    <v-stepper-step editable step="4">View setup instructions</v-stepper-step>
    <v-stepper-content step="4">
      <v-card color="grey lighten-1" class="mb-5" height="200px"></v-card>
      <v-btn color="primary" @click="e6 = 1">Continue</v-btn>
      <v-btn flat>Cancel</v-btn>
    </v-stepper-content>
  </v-stepper>
</template>
    </v-dialog>
  </div>
</template>
<script src="src/components/servicos/tecnico/mod/mod-add.js"></script>