<template id="mod-add">
  <div>
    <v-dialog v-model="dialog" persistent scrollable  max-width="500px">
      <v-card>
        <v-card-title>
          <span class="headline">{{data.tecnico.userNick}} - Deslocamento</span>
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage"></message>
          <v-container grid-list-md>
            <label class="label">Status</label>
            <v-layout row wrap align-center >
              <v-flex xs12 sm4 v-for="item in deslocStatus">
                <v-btn block small @click="status = item" :class="status && status.id == item.id ? 'blue white--text' : 'light'">
                  <span>{{item.name }}</span>
                </v-btn>
              </v-flex>
            </v-layout>
            <label class="label">Tipo Trajeto</label>
            <v-layout row wrap align-center >
              <v-flex xs12 sm4 v-for="item in deslocTrajetos">
                <v-btn block small @click="trajeto = item" :class="trajeto && trajeto.id == item.id ? 'blue white--text' : 'light'">
                  <span>{{item.name }}</span>
                </v-btn>
              </v-flex>
            </v-layout>
            <v-flex xs12 sm6 md6>
              <v-text-field
                type="datetime-local"
                v-model="dtInicio"
                label="Data Inicial"
                :error-messages="errors.collect('dtInicio')"
                v-validate="'required'"
                data-vv-name="dtInicio"
                item-text="name"
                required
              ></v-text-field>
            </v-flex>
            <v-flex xs12 sm6 md6>
              <v-text-field 
                type="number"
                v-model="kmInicio"
                label="Km Incial"
                :error-messages="errors.collect('kmInicio')"
                v-validate="''"
                data-vv-name="kmInicio"
                item-text="name"
                :disabled="trajeto && trajeto.categoria > 0"
              ></v-text-field>
            </v-flex>
            
            <v-flex xs12 sm6 md6>
              <v-text-field 
                type="number"
                v-model="kmInicio"
                label="Km Incial"
                :error-messages="errors.collect('kmInicio')"
                v-validate="''"
                data-vv-name="kmInicio"
                item-text="name"
                :disabled="trajeto && trajeto.categoria > 0"
              ></v-text-field>
            </v-flex>
            <v-flex xs12 sm6 md6>
              <v-text-field 
                type="number"
                v-model="valor"
                label="Valor"
                :error-messages="errors.collect('valor')"
                v-validate="''"
                data-vv-name="valor"
                item-text="name"
                :disabled="trajeto && trajeto.categoria != 1"
              ></v-text-field>
            </v-flex>

        <div class="field is-horizontal">
          <div class="field-body">
            <div class="field">
              <label class="label">Data Inicio</label>
              <p class="control">
                <input v-model="dtInicio" class="input" type="datetime-local">
              </p>
            </div>
            <div class="field">
              <label class="label">Km Inicio</label>
              <p class="control">
                <input v-model="kmInicio" :disabled="trajeto && trajeto.categoria > 0" class="input" type="number" >
              </p>
            </div>     
          </div>
        </div>
        <div class="field is-horizontal">
          <div class="field-body">
            <div class="field">
              <label class="label">Data Final</label>
              <p class="control">
                <input v-model="dtFinal" class="input" type="datetime-local" >
              </p>
            </div>
            <div class="field">
              <label class="label">Km Final</label>
              <p class="control">
                <input v-model="kmFinal" :disabled="trajeto && trajeto.categoria > 0" class="input" type="number">
              </p>
            </div>     
          </div>
        </div>
        <div class="field is-horizontal">
          <div class="field-body">
            <div class="field">
              <label class="label">Tempo</label>
              <div class="control">
                <input v-model="tempo" disabled class="input" type="number" placeholder="tempo">
              </div>
            </div>
            <div class="field">
              <label class="label">ValorHh</label>
              <div class="control">
                <input v-model="hhValor" disabled class="input" type="number" placeholder="Valor">
              </div>
            </div>
            <div class="field">
              <label class="label">Valor Trajeto</label>
              <div class="control">
                <input v-model="valor" :disabled="trajeto && trajeto.categoria != 1" class="input" type="number" placeholder="Valor">
              </div>
            </div>
          </div>
        </div>
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
</template>
<script src="src/components/servicos/tecnico/mod/mod-add.js"></script>