<template id="local-edt">
  <div>
    <v-dialog v-model="dialog" persistent scrollable  max-width="500px">
      <v-card>
        <v-card-title>
          <span class="headline">{{ loja.nick }} - Editar Local</span>
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage"></message>
          <v-container grid-list-md>
            <v-layout wrap>
              <v-flex xs12>
                <v-text-field
                  v-model="data.regional"
                  label="Regional"
                  :error-messages="errors.collect('regional')"
                  v-validate="''"
                  data-vv-name="regional"
                ></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md4>
                <v-select
                  :items="tipos"
                  v-model="data.tipo"
                  item-text="name"
                  item-value="id"
                  label="Tipo"
                  :error-messages="errors.collect('tipo')"
                  v-validate="'required'"
                  data-vv-name="tipo"
                  required
                ></v-select>
              </v-flex>
              <v-flex xs12 sm6 md8>
                <v-text-field
                  v-model="data.name"
                  label="Nome"
                  :error-messages="errors.collect('name')"
                  v-validate="'required'"
                  data-vv-name="name"
                  required
                ></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md8>
                <v-text-field
                  v-model="data.municipio"
                  label="Municipio"
                  :error-messages="errors.collect('municipio')"
                  v-validate="'required'"
                  data-vv-name="municipio"
                  required
                ></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md4>
                <v-text-field
                  v-model="data.uf"
                  label="UF"
                  :error-messages="errors.collect('uf')"
                  v-validate="'required'"
                  data-vv-name="uf"
                  required
                ></v-text-field>
              </v-flex>
              <v-flex xs12>
                <v-text-field
                  v-model="coordenadas"
                  label="Coordenadas"
                  :error-messages="errors.collect('coordenadas')"
                  v-validate="''"
                  data-vv-name="coordenadas"
                ></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md2>
                <small class="subheading">Ativo?</small>
              </v-flex>
              <v-flex xs12 sm6 md10>
                <v-radio-group v-model="data.ativo" row>
                  <v-radio label="Sim" value="0" ></v-radio>
                  <v-radio label="Não" value="1"></v-radio>
                </v-radio-group>
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
</template>
<script src="src/components/local/_edtLocal.js"></script>