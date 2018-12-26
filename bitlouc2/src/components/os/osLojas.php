
<template id="os-lojas">
    <div>
    <v-container grid-list-md text-xs-center>
    <v-layout row wrap>
    <v-flex v-for=" osLoja in osLojas" xs4>
        <v-card>
        <v-toolbar color="blue darken-4" dark>
          <v-toolbar-title> {{osLoja.nick}}</v-toolbar-title>
          <v-spacer></v-spacer>
        </v-toolbar>
          <v-list two-line subheader>
          <v-list-tile key="OSs" :to="'/loja/' + osLoja.id +'/oss'" avatar @click="">
            <v-list-tile-avatar>
              <v-icon class="">build</v-icon>
            </v-list-tile-avatar>
            <v-list-tile-content>
              <v-list-tile-title>OSs</v-list-tile-title>
              <v-list-tile-sub-title>{{ osLoja.osQt }}</v-list-tile-sub-title>
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
<script src="src/components/atendimento/os/osLojas.js"></script>
