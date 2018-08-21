<template id="nota-edt">
<div>
    <v-dialog v-model="dialog" persistent scrollable  max-width="500px">
      <v-card>
        <v-card-title>
          <span class="headline">{{ data.local.tipo }} - {{ data.local.name }} - Descrição serviço</span>
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage"></message>
          <loader :dialog="isLoading"></loader>
          <v-container>
            <v-layout wrap>
              <v-flex xs12>
                <div>
                <v-text-field
                  name="input-1"
                  label="Nota do Serviço"
                  v-model="data.notas.descricao"
                  textarea
                ></v-text-field>

                </div>
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
<script src="src/components/servicos/nota/nota-edt.js"></script>