<template id="loader">
  <div class="text-xs-center">
    <v-dialog v-model="dialog" persistent width="300">
      <v-card color="primary" dark>
        <v-card-text> 
          Por favor espere
          <v-progress-linear indeterminate color="white" class="mb-0"></v-progress-linear>
        </v-card-text>
      </v-card>
    </v-dialog>
  </div>
</template>

<script src="src/components/includes/loader.js"></script>