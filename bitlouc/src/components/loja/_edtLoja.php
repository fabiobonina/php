<template id="loja-edt">
  <div>
    <v-dialog v-model="dialog" persistent scrollable max-width="500px">
      <v-card>
        <v-card-title>
          <span class="headline">{{ proprietario.nick }} - Editar Loja</span>
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage"></message>
          <loader :dialog="isLoading"></loader>
          <v-form>
            <v-text-field
              v-model="data.name"
              label="Nome"
              :error-messages="errors.collect('name')"
              v-validate="'required'"
              data-vv-name="name"
              required
            ></v-text-field>
            <v-text-field
              v-model="data.nick"
              label="Nome Fantasia"
              :counter="20"
              :error-messages="errors.collect('nick')"
              v-validate="'required|max:20'"
              data-vv-name="nick"
              required
            ></v-text-field>
            <v-select
              :items="grupos"
              v-model="data.grupo"
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
              v-model="data.seguimento"
              item-text="name"
              item-value="id"
              label="Seguimento"
              :error-messages="errors.collect('seguimento')"
              v-validate="'required'"
              data-vv-name="seguimento"
              required
            ></v-select>
            <p>Ativo?</p>
            <v-radio-group v-model="data.ativo" row>
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

<script src="src/components/loja/_edtLoja.js"></script>