
<template id="os-uf">
    <div>
    <v-container grid-list-md text-xs-center>
    <v-layout row wrap>
    <v-flex v-for=" osLoja in osLojas" v-if=" osLoja.helpdeskTTQt > 0" xs4>
        <v-card >
        <v-toolbar color="blue darken-4" dark>
          <v-toolbar-title> {{osLoja.name}}</v-toolbar-title>
          <v-spacer></v-spacer>
        </v-toolbar>
          <v-list two-line subheader>
          <v-list-tile key="OSs" :to="'/loja/' + osLoja.id +'/oss'" avatar @click="">
            <v-list-tile-avatar>
              <v-icon class="">build</v-icon>
            </v-list-tile-avatar>
            <v-list-tile-content>
              <v-list-tile-title>OSs</v-list-tile-title>
              <v-list-tile-sub-title>{{ osLoja.helpdeskTTQt }}</v-list-tile-sub-title>
            </v-list-tile-content>
            <v-list-tile-action>
              <v-btn icon ripple >
                <v-icon color="grey lighten-1">info</v-icon>
              </v-btn>
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
            active: '0',
            gridColumns: ['displayName', 'name']
        };
    },
    created() {
    },
    computed: {
      osLojas() {
          return store.state.osUf;
      },
      osStatusTec() {
        function Comparator(a, b) {
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
        return value;
      },
    },
    methods: {
    }
});
</script>
