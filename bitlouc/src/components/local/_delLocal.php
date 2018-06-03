<template id="local-del">
  <div>
    <v-dialog v-model="dialog" persistent scrollable max-width="500px">
      <v-card>
        <v-card-title color="primary">
          <span class="headline">{{ loja.nick }} - Deletar Local</span>
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage"></message>
          <v-form>
            <h1 class="headline">{{ data.tipo }}-{{ data.name }}</h1>
            <h2 class="headline">{{ data.municipio }}/ {{ data.uf }}</h2>
            <h2 class="headline">Regional: {{ data.regional }}</h2>

          </v-form>

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
            <v-btn color="error" flat @click.stop="deletarItem()">Deletar</v-btn>
          </template>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>
<script src="src/components/local/_delLocal.js"></script>