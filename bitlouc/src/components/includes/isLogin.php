<template id="is-login">
  <div>

    <v-layout row justify-center>
      
      <v-dialog
        v-model="dialog"
        fullscreen
        hide-overlay
        transition="dialog-bottom-transition"
        scrollable
      >
      
        <v-card tile color="blue">
          <v-toolbar card dark color="blue">
            <img src="img/bit-louc.png" height="36px" width="36px">
            <v-toolbar-title><b>Bit</b>LOUC </v-toolbar-title>
            <v-spacer></v-spacer>
          </v-toolbar>
          <v-card-text>
            <v-flex xs12 sm6 offset-sm3>

              <login  v-if="!novo" v-on:close="novo = true" ></login>
              <register v-if="novo" v-on:close="novo = false"></register>
            
            <v-flex>            
          </v-card-text>

          <div style="flex: 1 1 auto;"></div>
        </v-card>
      </v-dialog>
        
    </v-layout>
  </div>




      </div>
</template>
<script src="src/components/includes/isLogin.js"></script>