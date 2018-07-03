<template id="mod-full">
  <div>
    <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition" persistent>
    <v-btn slot="activator" color="primary" dark>Open Dialog</v-btn>
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
          <v-stepper-step :complete="e1 > 1" step="1">Inicio</v-stepper-step>
          <v-divider></v-divider>
          <v-stepper-step :complete="e1 > 2" step="2">Trajeto</v-stepper-step>
          <v-divider></v-divider>
          <v-stepper-step :complete="e1 > 3" step="3">Serv. Inicio</v-stepper-step>
          <v-divider></v-divider>
          <v-stepper-step :complete="e1 > 4" step="4">Serv. Fim</v-stepper-step>
          <v-divider></v-divider>
          <v-stepper-step :complete="e1 > 6"step="5">Retorno</v-stepper-step>
          <v-divider></v-divider>
          <v-stepper-step :complete="e1 > 6" step="6">Completo</v-stepper-step>
        </v-stepper-header>
        <message v-if="temMessage" :success="successMessage" :error="errorMessage"></message>
        <template v-if="isLoading">
            <v-spacer></v-spacer>
            <v-progress-circular :size="40" :width="5" indeterminate color="primary"></v-progress-circular>
            <v-spacer></v-spacer>
        </template> 
        <template v-else>
        <v-stepper-items>
          <v-stepper-content step="1">
            <v-card class="mb-5" color="grey lighten-1" max-width="500px">
              <v-card-title align-center>
                <v-layout align-center>
                  <v-flex xs12 text-xs-center>
                  <span class="headline">Iniciar trajeto ou servio?</span>
                  </v-flex>
                </v-layout>
              </v-card-title>
              <v-card-text align-center>
                <template>
                  <v-layout align-center>
                    <v-flex xs12 text-xs-center>
                      <div>
                        <v-btn @click="trajetoI()" small>Trajeto!</v-btn>
                        <v-btn @click="servico()" small color="primary">Serviço!</v-btn>
                      </div>
                    </v-flex>
                  </v-layout>
                </template>
              </v-card-text>
            </v-card>
          </v-stepper-content>

          <v-stepper-content step="2">
            <v-card class="mb-5" color="grey lighten-1" max-width="500px">
              <v-card-title align-center>
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
                  <v-flex xs12>
                    <v-text-field
                      type="datetime-local"
                      v-model="dtAtenInicio"
                      label="Data Inicio"
                      :error-messages="errors.collect('dtInicio')"
                      v-validate="'required'"
                      data-vv-name="dtInicio"
                      item-text="name"
                      required
                    ></v-text-field>
                  </v-flex>
                  <v-flex xs12 text-xs-center>
                      <div>
                        <v-btn @click="trajetoI()" small>Trajeto!</v-btn>
                        <v-btn @click="servico()" small color="primary">Serviço!</v-btn>
                      </div>
                    </v-flex>
                  </v-layout>
                  <v-flex xs12 sm6 md6>
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
                <template>
                  <v-layout align-center>
                    <v-flex xs12 text-xs-center>
                      <div>
                        <v-btn @click="trajetoI()" small>Trajeto!</v-btn>
                        <v-btn @click="servico()" small color="primary">Serviço!</v-btn>
                      </div>
                    </v-flex>
                  </v-layout>
                </template>
              </v-container>
              <small>*indica campo obrigatório</small>
                </template>
              </v-card-text>
            </v-card>

            <v-btn
              color="primary"
              @click="e1 = 3"
            >
              Continue
            </v-btn>

            <v-btn flat>Cancel</v-btn>
          </v-stepper-content>

          <v-stepper-content step="3">
            <v-card class="mb-5" color="grey lighten-1" max-width="500px">
              <v-card-title align-center>
                <v-layout align-center>
                  <v-flex xs12 text-xs-center>
                  <span class="headline">Trajeto</span>
                  </v-flex>
                </v-layout>
              </v-card-title>
              <v-card-text align-center>
                <template>
                <v-container grid-list-md>
                <label class="label">Tipo Trajeto</label>
                <v-layout row wrap align-center >
                  <v-flex xs12 sm4 v-for="item in deslocTrajetos" :key="item.id">
                    <v-btn block small @click="trajeto = item" :class="trajeto && trajeto.id == item.id ? 'blue white--text' : 'light'">
                      <span>{{item.name }}</span>
                    </v-btn>
                  </v-flex>
                </v-layout>
                <v-layout wrap>
                  <v-flex xs12>
                    <v-text-field
                      type="datetime-local"
                      v-model="dtServInicio"
                      label="Data Inicio"
                      :error-messages="errors.collect('dtInicio')"
                      v-validate="'required'"
                      data-vv-name="dtInicio"
                      item-text="name"
                      required
                    ></v-text-field>
                  </v-flex>
                </v-layout>
              </v-container>
              <small>*indica campo obrigatório</small>
                </template>
              </v-card-text>
            </v-card>

            <v-btn color="primary" @click="e1 = 4" >Continue</v-btn>

            <v-btn flat>Cancel</v-btn>
          </v-stepper-content>
          <v-stepper-content step="4">
            <v-card class="mb-5" color="grey lighten-1" max-width="500px">
              <v-card-title align-center>
                <v-layout align-center>
                  <v-flex xs12 text-xs-center>
                  <span class="headline">Trajeto</span>
                  </v-flex>
                </v-layout>
              </v-card-title>
              <v-card-text align-center>
                <template>
                <v-container grid-list-md>
                <label class="label">Tipo Trajeto</label>
                <v-layout row wrap align-center >
                  <v-flex xs12 sm4 v-for="item in deslocTrajetos" :key="item.id">
                    <v-btn block small @click="trajeto = item" :class="trajeto && trajeto.id == item.id ? 'blue white--text' : 'light'">
                      <span>{{item.name }}</span>
                    </v-btn>
                  </v-flex>
                </v-layout>
                <v-layout wrap>
                  <v-flex xs12>
                    <v-text-field
                      type="datetime-local"
                      v-model="dtServInicio"
                      label="Data Inicio"
                      :error-messages="errors.collect('dtInicio')"
                      v-validate="'required'"
                      data-vv-name="dtInicio"
                      item-text="name"
                      required
                    ></v-text-field>
                  </v-flex>
                </v-layout>
              </v-container>
              <small>*indica campo obrigatório</small>
                </template>
              </v-card-text>
            </v-card>

            <v-btn color="primary" @click="e1 = 5" >Continue</v-btn>

            <v-btn flat>Cancel</v-btn>
          </v-stepper-content>
          <v-stepper-content step="5">
            <v-card class="mb-5" color="grey lighten-1" max-width="500px">
              <v-card-title align-center>
                <v-layout align-center>
                  <v-flex xs12 text-xs-center>
                  <span class="headline">Trajeto</span>
                  </v-flex>
                </v-layout>
              </v-card-title>
              <v-card-text align-center>
                <template>
                <v-container grid-list-md>
                <label class="label">Tipo Trajeto</label>
                <v-layout row wrap align-center >
                  <v-flex xs12 sm4 v-for="item in deslocTrajetos" :key="item.id">
                    <v-btn block small @click="trajeto = item" :class="trajeto && trajeto.id == item.id ? 'blue white--text' : 'light'">
                      <span>{{item.name }}</span>
                    </v-btn>
                  </v-flex>
                </v-layout>
                <v-layout wrap>
                  <v-flex xs12>
                    <v-text-field
                      type="datetime-local"
                      v-model="dtServInicio"
                      label="Data Inicio"
                      :error-messages="errors.collect('dtInicio')"
                      v-validate="'required'"
                      data-vv-name="dtInicio"
                      item-text="name"
                      required
                    ></v-text-field>
                  </v-flex>
                </v-layout>
              </v-container>
              <small>*indica campo obrigatório</small>
                </template>
              </v-card-text>
            </v-card>

            <v-btn color="primary" @click="e1 = 5" >Continue</v-btn>

            <v-btn flat>Cancel</v-btn>
          </v-stepper-content>
        </v-stepper-items>
        </template>
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