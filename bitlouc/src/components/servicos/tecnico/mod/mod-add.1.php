<template id="mod-add">
  <div>
    <v-dialog v-model="dialog" persistent scrollable  max-width="500px">
      <v-card>
        <v-card-title>
          <span class="headline">{{data.tecnico.userNick}} - Deslocamento</span>
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage"></message>
          <loader :dialog="isLoading"></loader>
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
        </v-card-text>
        <v-card-actions>
            <v-btn flat @click.stop="$emit('close')">Fechar</v-btn>
            <v-spacer></v-spacer>
            <v-btn color="primary" flat @click.stop="saveItem()">Salvar</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>
<script src="src/components/servicos/tecnico/mod/mod-add.js"></script>