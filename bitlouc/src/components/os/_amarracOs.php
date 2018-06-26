<template id="os-amarrac">
<div>
    <v-dialog v-model="dialog" persistent scrollable  max-width="500px">
      <v-card>
        <v-card-title>
          <span class="headline">OS: {{ data.local.tipo }} - {{ data.local.name }} {{data.servico.name }}</span>
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage"></message>
          <v-container grid-list-md>
            <v-layout wrap>
              <v-flex xs12>
              <div>
                <p class="subtitle">Numero atual: {{ data.filial }} | {{ data.os }}</p>
              </div>
              </v-flex>
              <v-flex xs12 sm6 md5>
                <v-autocomplete
                  :items="filiais"
                  v-model="filial"
                  item-text="name"
                  label="Filial"
                  :error-messages="errors.collect('filial')"
                  v-validate="'required'"
                  data-vv-name="filial"
                  return-object
                  required
                ></v-autocomplete>
              </v-flex>
              <v-flex xs12 sm6 md7>
                <v-text-field
                  type="text"
                  v-model="os"
                  label="OS"
                  :error-messages="errors.collect('os')"
                  v-validate="'required'"
                  data-vv-name="os"
                  item-text="name"
                  required
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
  </div>
  <div class="modal is-active" >
    <div class="modal-background"></div>
    <div class="modal-card">
        <!--#CONTEUDO -->
        <message :success="successMessage" :error="errorMessage"></message>
        Numero atual: {{ data.filial }} | {{ data.os }}
        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Filial | OS</label>
          </div>
          <div class="field-body">
            <div class="field">
              <p class="control is-expanded">
                <v-select label="name" v-model="filial" :options="filiais"></v-select>
              </p>
            </div>
            <div class="field">
              <p class="control is-expanded has-icons-right">
                <input v-model="os" class="input" type="text" placeholder="OS">
                <span class="icon is-small is-right">
                  <span class="mdi mdi-wrench"></span>
                </span>
              </p>
            </div>
          </div>
        </div>
    </div>
  </div>
</template>
<script src="src/components/os/_amarracOs.js"></script>