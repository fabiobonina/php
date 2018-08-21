<template id="loja-del">
  <div>
    <v-dialog v-model="dialog" persistent scrollable max-width="500px">
      <v-card>
        <v-card-title color="primary">
          <span class="headline">{{ proprietario.nick }} - Deletar Loja</span>
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage"></message>
          <loader :dialog="isLoading"></loader>
          <v-form>
            <h1 class="headline">{{ data.name }}</h1>
            <h2 class="headline">{{ data.nick }}</h2>
            <h2 class="headline">Grupo: {{ data.grupo }}, Seguimento: {{ data.seguimento }}</h2>

          </v-form>

        </v-card-text>
        <v-card-actions>
            <v-btn flat @click.stop="$emit('close')">Fechar</v-btn>
            <v-spacer></v-spacer>
            <v-btn color="error" flat @click.stop="deletarItem()">Deletar</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>
<script src="src/components/loja/_delLoja.js"></script>