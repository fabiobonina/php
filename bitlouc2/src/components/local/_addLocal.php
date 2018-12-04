<template id="local-add">
  <div>
    <v-dialog v-model="dialog" persistent scrollable  max-width="500px">
      <v-card>
        <v-card-title>
          <span class="headline">{{ loja.nick }} - Nova Local</span>
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage" v-on:close="errorMessage = []; successMessage = []"></message>
          <loader :dialog="isLoading"></loader>
          <v-container grid-list-md>
            <v-layout wrap>
              <v-flex xs12>
                <v-text-field
                  v-model="regional"
                  label="Regional"
                  :error-messages="errors.collect('regional')"
                  v-validate="''"
                  data-vv-name="regional"
                ></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md4>
                <v-select
                  :items="tipos"
                  v-model="tipo"
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
                  v-model="name"
                  label="Nome"
                  :error-messages="errors.collect('name')"
                  v-validate="'required'"
                  data-vv-name="name"
                  required
                ></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md8>
                <v-text-field
                  v-model="municipio"
                  label="Municipio"
                  :error-messages="errors.collect('municipio')"
                  v-validate="'required'"
                  data-vv-name="municipio"
                  required
                ></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md4>
                <v-text-field
                  v-model="uf"
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
              <v-flex xs12>
                <v-autocomplete
                  :items="categorias" v-model="categoria" label="Categorias"
                  :error-messages="errors.collect('categoria')" v-validate="'required'" data-vv-name="categoria"
                  required multiple chips max-height="auto"
                  >
                  <template slot="selection" slot-scope="data">
                    <v-chip
                      :selected="data.selected"
                      :key="JSON.stringify(data.item)"
                      close class="chip--select-multi"
                      @input="data.parent.selectItem(data.item)"
                    >
                      {{ data.item.name }}
                    </v-chip>
                  </template>
                  <template slot="item" slot-scope="data">
                    <template v-if="typeof data.item !== 'object'">
                      <v-list-tile-content v-text="data.item"></v-list-tile-content>
                    </template>
                    <template v-else>
                      <v-list-tile-content>
                        <v-list-tile-title v-html="data.item.name"></v-list-tile-title>
                      </v-list-tile-content>
                    </template>
                  </template>
                </v-autocomplete>
              </v-flex>
              <v-flex xs12 sm6 md2>
                <small class="subheading">Ativo?</small>
              </v-flex>
              <v-flex xs12 sm6 md10>
                <v-radio-group v-model="ativo" row>
                  <v-radio label="Sim" value="0" ></v-radio>
                  <v-radio label="Não" value="1"></v-radio>
                </v-radio-group>
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
<script src="src/components/local/_addLocal.js"></script>