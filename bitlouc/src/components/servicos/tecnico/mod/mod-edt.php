<template id="mod-edt">
  <div>
    <v-dialog v-model="dialog" persistent scrollable  max-width="500px">
      <v-card>
        <v-card-title>
          <span class="headline">{{data.tecnico.userNick}} - Deslocamento</span>
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage"></message>
          <v-container grid-list-md>
          <div class="modal-background"></div>
    <div class="modal-card">
      <section class="modal-card-body">
        <!--#CONTEUDO -->
        <!--#INICIO -->

        </div>
        <div class="field is-horizontal">
          <div class="field-body">
            <div class="field">
              <label class="label">Data Inicio</label>
              <p class="control">
                <input v-model="data.dtInicio" class="input" type="datetime-local">
              </p>
            </div>
            <div class="field">
              <label class="label">Km Inicio</label>
              <p class="control">
                <input v-model="data.kmInicio" :disabled="data.trajeto.categoria > 0" class="input" type="number" >
              </p>
            </div>     
          </div>
        </div>
        <div class="field is-horizontal">
          <div class="field-body">
            <div class="field">
              <label class="label">Data Final</label>
              <p class="control">
                <input v-model="data.dtFinal" class="input" type="datetime-local" >
              </p>
            </div>
            <div class="field">
              <label class="label">Km Final</label>
              <p class="control">
                <input v-model="data.kmFinal" :disabled="data.trajeto.categoria > 0" class="input" type="number">
              </p>
            </div>     
          </div>
        </div>
        <div class="field is-horizontal">
          <div class="field-body">
            <div class="field">
              <label class="label">Tempo</label>
              <div class="control">
                <input v-model="data.tempo" disabled class="input" type="number" placeholder="tempo">
              </div>
            </div>
            <div class="field">
              <label class="label">ValorHh</label>
              <div class="control">
                <input v-model="data.hhValor" disabled class="input" type="number" placeholder="Valor">
              </div>
            </div>
            <div class="field">
              <label class="label">Valor Trajeto</label>
              <div class="control">
                <input v-model="data.valor" :disabled="data.trajeto.categoria != 1" class="input" type="number" placeholder="Valor">
              </div>
            </div>
          </div>
        </div>
        <br>
        <br>
        <br>
            <label class="label">Status</label>
            <v-layout row wrap align-center>
              <v-flex xs12 sm4 v-for="item in deslocStatus" :key="item.id">
                <v-btn block small @click="data.status = item" :class="data.status && data.status.id == item.id ? 'blue white--text' : 'light'">
                  <span>{{item.name }}</span>
                </v-btn>
              </v-flex>
            </v-layout>
            <label class="label">Tipo Trajeto</label>
            <v-layout row wrap align-center >
              <v-flex xs12 sm4 v-for="item in deslocTrajetos" :key="item.id">
                <v-btn block small @click="data.trajeto = item" :class="data.trajeto && data.trajeto.id == item.id ? 'blue white--text' : 'light'">
                  <span>{{item.name }}</span>
                </v-btn>
              </v-flex>
            </v-layout>
            <v-layout wrap>
              <v-flex xs12 sm6 md7>
                <v-text-field
                  type="datetime-local"
                  v-model="data.dtInicio"
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
                  v-model="data.kmInicio"
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
                  v-model="data.dtFinal"
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
                  v-model="data.kmFinal"
                  label="Km Final"
                  :error-messages="errors.collect('kmFinal')"
                  v-validate="''"
                  data-vv-name="kmFinal"
                  item-text="name"
                  :disabled="data.trajeto && data.trajeto.categoria > 0"
                ></v-text-field>
              </v-flex>

              <v-flex xs12 sm6 md4>
                <v-text-field 
                  type="number"
                  v-model="data.tempo"
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
                  v-model="data.hhValor"
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
                  v-model="data.valor"
                  label="Valor Trajeto"
                  :error-messages="errors.collect('valor')"
                  v-validate="''"
                  data-vv-name="valor"
                  item-text="name"
                  :disabled="data.trajeto && data.trajeto.categoria != 1"
                ></v-text-field>
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
        <!--#CONTEUDO -->
      </section>
      <footer class="modal-card-foot field is-grouped is-grouped-right">
        <button class="button" v-on:click="$emit('close')">Cancel</button>
        <button :class="isLoading ? 'button is-info is-loading' : 'button is-info'" v-on:click="saveItem()">Save</button>
      </footer>
    </div>
  </div>
</template>
<script src="src/components/servicos/tecnico/mod/mod-edt.js"></script>