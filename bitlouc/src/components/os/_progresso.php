<template id="progresso-os">
  <div>
      <v-layout row wrap align-center >
        <v-flex xs12 sm3>
          <v-btn block :small="data != 1" b :class="data >= 1 ?
              data == 1 ? 'green accent-4 white--text' : 'blue white--text small'   
              : 'small light' ">
            <v-icon v-if="data == 1" >mdi-loading mdi-spin</v-icon>
            <v-icon v-else small>mdi-arrow-right-bold</v-icon> Em trasito
            <v-icon>mdi-chevron-right</v-icon>
          </v-btn>
        </v-flex>
        <v-flex xs12 sm3>
          <v-btn block :small="data != 2" b :class="data >= 2 ?
              data == 2 ? 'green accent-4 white--text' : 'small blue white--text'   
              : 'small light' ">
            <v-icon v-if="data == 2" >mdi-loading mdi-spin</v-icon>
            <v-icon v-else small>mdi-wrench</v-icon> Atendimento
            <v-icon>mdi-chevron-right</v-icon>
          </v-btn>
        </v-flex>
        <v-flex xs12 sm3>
          <v-btn block :small="data != 3" b :class="data >= 3 ?
              data == 3 ? 'green accent-4 white--text' : 'small blue white--text'   
              : 'small light' ">
            <v-icon v-if="data == 3" >mdi-loading mdi-spin</v-icon>
            <v-icon v-else small>mdi-redo-variant</v-icon> Retorno Viagem
            <v-icon>mdi-chevron-right</v-icon>
          </v-btn>
        </v-flex>
        <v-flex xs12 sm3>
          <v-btn block :small="data != 4" b :class="data >= 4 ?
              data == 4 ? 'green accent-4 white--text' : 'small blue white--text'   
              : 'small light' ">
            <v-icon v-if="data == 4" >mdi-loading mdi-spin</v-icon>
            <v-icon v-else small>mdi-check</v-icon> Completo
            <v-icon>mdi-chevron-right</v-icon>
          </v-btn>
        </v-flex>
      </v-layout>
    <!--v-slider :tick-labels="labels" v-model="data" thumb-color="green" :max="4" :disabled="data === '0'" always-dirty></v-slider-->
  </div>
</template>
<script src="src/components/os/_progresso.js"></script>