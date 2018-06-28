<template id="is-login">
    <v-layout row justify-center>
      <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
        <v-card tile color="blue">
          <v-toolbar card dark color="blue">
            <img src="dist/img/bit-louc.png" height="36px" width="36px">
            <v-toolbar-title><b>Bit</b>LOUC </v-toolbar-title>
            <v-spacer></v-spacer>
          </v-toolbar>
          <v-card-text>
            <v-flex xs12 sm6 offset-sm3>
              <template v-if="isLoading" ustify-center>
                <v-spacer></v-spacer>
                <v-progress-circular :size="40" :width="5" indeterminate color="primary"></v-progress-circular>
                <v-spacer></v-spacer>
              </template>
              <template v-else>
                <login  v-if="!novo" v-on:close="novo = true" v-on:atualizar="isLoading = true;dialog = false"></login>
                <register v-if="novo" v-on:close="novo = false"></register>
              </template>
            <v-flex>            
          </v-card-text>
          <div style="flex: 1 1 auto;"></div>
        </v-card>
      </v-dialog>
    </v-layout>
</template>
<script src="src/components/includes/isLogin.js"></script>


<?php require_once 'src/components/includes/login.php';?>
<?php require_once 'src/components/includes/registrar.php';?>