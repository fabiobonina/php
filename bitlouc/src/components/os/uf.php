
<template id="os-uf">
  <div>
    <v-container grid-list-md text-xs-center>
      <v-layout row wrap>
        <v-flex v-for=" ocorrencia in oss" :key="ocorrencia.id" v-if=" ocorrencia.ocorrenciaTT > 0" xs4>
          <v-card >
            <v-toolbar color="blue darken-4" dark>
              <v-toolbar-title> {{ocorrencia.name}}</v-toolbar-title>
              <v-spacer></v-spacer>
            </v-toolbar>
            <v-list two-line subheader>
              <v-list-tile class="orange lighten-5" :to="'/oss/uf/' + ocorrencia.id" avatar @click="status = '0'" key="OSs">
                <v-list-tile-avatar>
                  <v-icon color="orange">mdi-exclamation</v-icon>
                </v-list-tile-avatar>
                <v-list-tile-content class="orange--text">
                  <v-list-tile-title >Pedente</v-list-tile-title>
                </v-list-tile-content>
                <v-list-tile-action class="orange--text display-2">
                  {{ ocorrencia.ocorrenciaI }}
                </v-list-tile-action>
              </v-list-tile>
              <v-list-tile class="green lighten-5" :to="'/oss/uf/' + ocorrencia.id" avatar @click="status = '1'">
                <v-list-tile-avatar>
                  <v-icon color="green">mdi-loading mdi-spin</v-icon>
                </v-list-tile-avatar>
                <v-list-tile-content class="green--text">
                  <v-list-tile-title>Andamento</v-list-tile-title>
                </v-list-tile-content>
                <v-list-tile-action class="green--text display-2">
                  {{ ocorrencia.ocorrenciaII }}
                </v-list-tile-action>
              </v-list-tile>
              <v-list-tile class="cyan lighten-5" :to="'/oss/uf/' + ocorrencia.id" avatar @click="status = '2'">
                <v-list-tile-avatar>
                  <v-icon color="cyan">mdi-check-all</v-icon>
                </v-list-tile-avatar>
                <v-list-tile-content class="cyan--text">
                  <v-list-tile-title>Realizada</v-list-tile-title>
                </v-list-tile-content>
                <v-list-tile-action class="cyan--text display-2">
                  {{ ocorrencia.ocorrenciaIII }}
                </v-list-tile-action>
              </v-list-tile>
              
            </v-list>
          </v-card>
        </v-flex>
      </v-layout>
    </v-container>
  </div>      
</template>
<script>
var OsUF = Vue.extend({
    template: '#os-uf',
    data: function () {
        return {
            errorMessage: '',
            successMessage: '',
            itens: [
              { id:1, name: 'Pedente', ativo: '0', icon: 'mdi-exclamation', color:'orange lighten-5' },
              { id:2, name: 'Andamento', ativo: '1', icon: 'mdi-loading mdi-spin', color:'' },
              { id:3, name: 'Realizada', ativo: '2', icon: 'mdi-check-all', color:'' },
            ],
            active: '0',
            gridColumns: ['displayName', 'name']
        };
    },
    created() {
    },
    computed: {
      oss() {
          return store.state.osUf;
      },
      status: {
      // getter
        get: function () {
          return store.state.status;
        },
        // setter
        set: function (newValue) {
          var name = newValue
          this.$store.dispatch("setStatus", name );
        }
      }
    },
    methods: {
    }
});
</script>
