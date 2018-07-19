<template id="mod-add">
  <div>
    <v-dialog v-model="dialog" fullscreen hide-overlay persistent>
      <v-card color="light-blue lighten-3">
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
        <v-card-text>
          <message :success="successMessage" :error="errorMessage"></message>
          <loader :dialog="isLoading"></loader>
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
              
              <v-flex xs12 sm6 md5>
                <v-switch :label="trajetoFinal ? 'C/Trajeto final' : 'S/Trajeto final'" v-model="trajetoFinal" color="info"></v-switch>
              </v-flex>
              <template>
                <v-container grid-list-md text-xs-center>
                  <v-layout row wrap>
                    <v-flex xs4>
                      <v-card dark color="primary">
                        <v-card-text class="px-0">
                          <span>Trajeto</span><br>
                          <span>Inicial</span>
                        </v-card-text>
                      </v-card>
                    </v-flex>
                    <v-flex xs4>
                      <v-card dark color="primary">
                        <v-card-text class="px-0">
                        <span>Serviço</span><br>
                        <span>Executado</span>
                        </v-card-text>
                      </v-card>
                    </v-flex>
                    <v-flex xs4>
                      <v-card dark color="primary">
                        <v-card-text class="px-0">
                          <span>Trajeto</span><br>
                          <span>Final</span>
                        </v-card-text>
                      </v-card>
                    </v-flex>
                  </v-layout>
                </v-container>
              </template>
              <v-layout row wrap align-center >
                <v-flex xs4 sm4>
                  <v-btn  @click="trajetoInicial = !trajetoInicial" block large b :class="trajetoInicial ? 'blue white--text' : 'grey white--text' ">
                    <v-icon>mdi-run</v-icon>
                    <span>Inicial</span>
                  </v-btn>
                </v-flex>
                <v-flex xs4 sm4>
                  <v-btn block large  b class="blue white--text">
                    <v-icon>mdi-worker</v-icon>Serviço
                  </v-btn>
                </v-flex>
                <v-flex xs4 sm4>
                  <v-btn  @click="trajetoFinal = !trajetoFinal" block large  b :class="trajetoFinal ? 'blue white--text' : 'grey white--text' ">
                    <v-icon v-if="data == 1" >mdi-run</v-icon>
                    <v-icon v-else>mdi-run</v-icon>Final
                  </v-btn>
                </v-flex>
              </v-layout>
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
            </v-layout>
          </v-container>
        </v-card-text>

      <template>
        <v-stepper v-model="e6" vertical>
          <v-stepper-step v-if="trajetoFinal" editable :complete="e6 > 1" step="1">
            {{ dateInicio }} {{ horaInicio }}
            <small>Inicio Atendimento</small>
          </v-stepper-step>

          <v-stepper-content step="1" >
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
                        <v-text-field solo
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
                        <v-text-field solo
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
          </v-stepper-content>

          <v-stepper-step editable :complete="e6 > 2" step="2">
            {{ dateServInicio }} {{ horaServInicio }}
            <small>Inicio Serviço</small>
          </v-stepper-step>

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
                      <v-flex xs7 sm7 md7>
                        <v-text-field
                          type="date"
                          v-model="dateServInicio"
                          label="Data"
                          :error-messages="errors.collect('dateServInicio')"
                          v-validate="'required'"
                          data-vv-name="dateServInicio"
                          item-text="name"
                          required
                        ></v-text-field>
                      </v-flex>
                      <v-flex xs5 sm5 md5>
                        <v-text-field
                          type="time"
                          v-model="horaServInicio"
                          label="Hora"
                          :error-messages="errors.collect('horaServInicio')"
                          v-validate="'required'"
                          data-vv-name="horaServInicio"
                          item-text="name"
                          required
                        ></v-text-field>
                      </v-flex>
                      <v-flex xs12 sm12 md12>
                        <km-desp :data="data"></km-desp>
                      </v-flex>
                    </v-layout>
                  </v-container>
                  <small>*indica campo obrigatório</small>
                </template>
              </v-card-text>            
            </v-card>
          </v-stepper-content>

          <v-stepper-step editable :complete="e6 > 3" step="3">Select an ad format and name ad unit</v-stepper-step>

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
                      <v-flex xs7 sm7 md7>
                        <v-text-field
                          type="date"
                          v-model="dateServFinal"
                          label="Data"
                          :error-messages="errors.collect('dateServFinal')"
                          v-validate="'required'"
                          data-vv-name="dateServFinal"
                          item-text="name"
                          required
                        ></v-text-field>
                      </v-flex>
                      <v-flex xs5 sm5 md5>
                        <v-text-field
                          type="time"
                          v-model="horaServFinal"
                          label="Hora"
                          :error-messages="errors.collect('horaServFinal')"
                          v-validate="'required'"
                          data-vv-name="horaServFinal"
                          item-text="name"
                          required
                        ></v-text-field>
                      </v-flex>
                      <v-flex xs12 sm12 md12>
                        <km-desp :data="data"></km-desp>
                      </v-flex>
                    </v-layout>
                  </v-container>
                  <small>*indica campo obrigatório</small>
                </template>
              </v-card-text>            
            </v-card>
          </v-stepper-content>

          <v-stepper-step editable step="4">View setup instructions</v-stepper-step>
          <v-stepper-content step="4">
            <v-card class="mb-5" color="grey lighten-1" max-width="500px">
              <v-card-title>
                <v-layout align-center>
                  <v-flex xs12 text-xs-center>
                  <span class="headline">Atendimento Final</span>
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
                          v-model="dateFinal"
                          label="Data"
                          :error-messages="errors.collect('dateFinal')"
                          v-validate="'required'"
                          data-vv-name="dateFinal"
                          item-text="name"
                          required
                        ></v-text-field>
                      </v-flex>
                      <v-flex xs5 sm5 md5>
                        <v-text-field
                          type="time"
                          v-model="horaFinal"
                          label="Hora"
                          :error-messages="errors.collect('horaFinal')"
                          v-validate="'required'"
                          data-vv-name="horaFinal"
                          item-text="name"
                          required
                        ></v-text-field>
                      </v-flex>
                      <v-flex xs12 sm12 md12>
                        <km-desp :data="data"></km-desp>
                      </v-flex>
                    </v-layout>
              </v-container>
              <small>*indica campo obrigatório</small>
                </template>
              </v-card-text>            
            </v-card>
          </v-stepper-content>
        </v-stepper>
      </template>
      
      </v-card>
    </v-dialog>
  </div>
</template>
<script src="src/components/servicos/tecnico/mod/mod-add.js"></script>