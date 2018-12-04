<template id="loja-add">
  <div>
    <v-dialog v-model="dialog" persistent scrollable  max-width="500px">
      <v-card>
        <v-card-title>
          <span class="headline">{{ proprietario.nick }} - Nova Loja</span>
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage" v-on:close="errorMessage = []; successMessage = []"></message>
          <loader :dialog="isLoading"></loader>
          <v-form>
            <v-text-field
              v-model="name"
              label="Nome"
              :error-messages="errors.collect('name')"
              v-validate="'required'"
              data-vv-name="name"
              required
            ></v-text-field>
            <v-text-field
              v-model="nick"
              label="Nome Fantasia"
              :counter="20"
              :error-messages="errors.collect('nick')"
              v-validate="'required|max:20'"
              data-vv-name="nick"
              required
            ></v-text-field>
            <v-select
              :items="grupos"
              v-model="grupo"
              item-text="name"
              item-value="id"
              label="Grupo"
              :error-messages="errors.collect('grupo')"
              v-validate="'required'"
              data-vv-name="grupo"
              required
            ></v-select>
            <v-select
              :items="seguimentos"
              v-model="seguimento"
              item-text="name"
              item-value="id"
              label="Seguimento"
              :error-messages="errors.collect('seguimento')"
              v-validate="'required'"
              data-vv-name="seguimento"
              required
            ></v-select>
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
            <p>Ativo?</p>
            <v-radio-group v-model="ativo" row>
              <v-radio label="Sim" value="0" ></v-radio>
              <v-radio label="Não" value="1"></v-radio>
            </v-radio-group>
          </v-form>

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

<script src="src/components/loja/_addLoja.js"></script>