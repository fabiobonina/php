
<template id="ocorrencia-uf">
  <div>
    <v-container grid-list-md text-xs-center>
      <v-layout row wrap>
        <v-flex v-for=" ocorrencia in oss" v-if=" ocorrencia.ocorrenciaTT > 0" xs4>
          <v-card >
            <v-toolbar color="blue darken-4" dark>
              <v-toolbar-title> {{ocorrencia.name}}</v-toolbar-title>
              <v-spacer></v-spacer>
            </v-toolbar>
            <v-list two-line subheader>
              <v-list-tile class="orange lighten-5" key="OSs" :to="'/ocorrencia/uf/' + ocorrencia.id" avatar @click="">
                <v-list-tile-avatar>
                  <v-icon color="orange">mdi-exclamation</v-icon>
                </v-list-tile-avatar>
                <v-list-tile-content class="orange--text">
                  <v-list-tile-title >Pedente</v-list-tile-title>
                </v-list-tile-content>
                <v-list-tile-action class="orange--text">
                  {{ ocorrencia.ocorrenciaI }}
                </v-list-tile-action>
              </v-list-tile>
              <v-list-tile class="green lighten-5" key="OSs" :to="'/ocorrencia/uf/' + ocorrencia.id" avatar @click="">
                <v-list-tile-avatar>
                  <v-icon color="green">mdi-loading mdi-spin</v-icon>
                </v-list-tile-avatar>
                <v-list-tile-content class="green--text">
                  <v-list-tile-title>Andamento</v-list-tile-title>
                </v-list-tile-content>
                <v-list-tile-action class="green--text">
                  {{ ocorrencia.ocorrenciaII }}
                </v-list-tile-action>
              </v-list-tile>
              <v-list-tile class="cyan lighten-5" key="OSs" :to="'/ocorrencia/uf/' + ocorrencia.id" avatar @click="">
                <v-list-tile-avatar>
                  <v-icon color="cyan">mdi-check-all</v-icon>
                </v-list-tile-avatar>
                <v-list-tile-content class="cyan--text">
                  <v-list-tile-title>Realizada</v-list-tile-title>
                </v-list-tile-content>
                <v-list-tile-action class="cyan--text">
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
var OcorrenciaUF = Vue.extend({
    template: '#ocorrencia-uf',
    data: function () {
        return {
            errorMessage: '',
            successMessage: '',
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
      osStatusTec() {
        /*function Comparator(a, b) {
          if (a[1] > b[1]) return -1;
          if (a[1] < b[1]) return 1;
          return 0;
        }
        
        var oss = store.getters.getOsId(this.$route.params._os);
        
        oss = oss.filter(function (row) {
          return Number(row.status) <= 1;
        });
        this.ossAbertas = oss.length;
        var tecnicos  = store.state.tecnicos;
        var value = [];
        for (var user of tecnicos) {
          var count = 0;
          var postData = [];
          for (var os of oss) {
            for (var tec of os.tecnicos) {  
              if(user.id == tec.tecnico_id) {
                count++;
              }
            }
          }
          postData.push(user.userNick)
          postData.push(count)
          if(count > 0){
            value.push( postData)
          }
        }
        value = value.sort(Comparator);
        return value;*/
      },
    },
    methods: {
    }
});
</script>
