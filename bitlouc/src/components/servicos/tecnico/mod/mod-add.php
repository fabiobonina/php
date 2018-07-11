<template id="mod-add">
  <div>
    <v-dialog v-model="dialog" persistent scrollable  max-width="600px">
      <v-card color="light-blue lighten-3">
        <v-card-title>
          <span class="headline">{{data.tecnico.userNick}} - Atendimento</span>
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage"></message>
          <loader :dialog="isLoading"></loader>
          <v-container grid-list-md>
            <v-layout wrap>
              <v-flex xs12 sm6 md5>
                <v-switch :label="trajetoInicial ? 'C/Trajeto inicial' : 'S/Trajeto inicial'" v-model="trajetoInicial" color="info"></v-switch>
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
    </v-dialog>
  </div>
</template>
<script src="src/components/servicos/tecnico/mod/mod-add.js"></script>