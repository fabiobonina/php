
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
      ossUF() {
        return store.getters.getLojaId(this.$route.params._loja);
      },
    },
    methods: {
      
    }
});
</script>
