<template id="proprietario-top">
  <div>
    <div>
      <v-toolbar color="cyan" dark tabs extended>
        <v-btn @click="$router.go(-1)" icon>
          <v-icon>arrow_back</v-icon>
        </v-btn>
        <v-toolbar-title> {{ proprietario.nick  }}</v-toolbar-title>
        <v-spacer></v-spacer>
        <div class="text-xs-center">
          <v-badge left>
            <v-icon slot="badge" dark small>location_city</v-icon>
            <span>Local: {{ proprietario.locaisQt }}</span>
          </v-badge>
          &nbsp;&nbsp;
          <v-badge color="green">
            <v-icon slot="badge" dark small>place</v-icon>
            <span>{{ proprietario.locaisGeoStatus }}% ({{ proprietario.locaisGeoQt }})</span>
          </v-badge>
          &nbsp;
        </div>

        <v-btn icon>
          <v-icon>more_vert</v-icon>
        </v-btn>
        <v-tabs slot="extension" centered color="cyan" slider-color="yellow">
          <v-tab v-for="n in router" :key="n.title" :to="'/proprietario/' + n.router" ripple> {{ n.title }} </v-tab>
        </v-tabs>
      </v-toolbar>
      </div>
      <v-layout align-center>
        <v-flex xs12 sm4 text-xs>
          <div>
            <v-jumbotron color="grey lighten-2" height="300">
              <v-container fill-height>
                <v-layout align-center>
                  <v-flex>
                    <h3 class="display-6">{{ proprietario.nick }}</h3>
                    <span class="subheading">{{ proprietario.name }} </span>
                    <v-divider></v-divider>
                  </v-flex>
                </v-layout>
              </v-container>
            </v-jumbotron>
          </div>
        </v-flex>
        <v-flex xs12 sm2 text-xs-center>
          <div>
            <v-jumbotron color="grey lighten-2" height="300">
              <v-container fill-height>
                <v-layout align-center>
                  <v-flex>
                    <h3 class="display-6">Local</h3>
                    <span class="subheading"> {{ proprietario.locaisQt }} {{ proprietario.locaisGeoStatus }}% ({{ proprietario.locaisGeoQt }})<span class="icon"><i class="fa fa-map-marker"></i></span></span>
                    <v-divider></v-divider>
                  </v-flex>
                </v-layout>
              </v-container>
            </v-jumbotron>
          </div>
        </v-flex>
        <v-flex xs12 sm4 text-xs-center>
          <div>
            <v-jumbotron color="grey lighten-2" height="300">
              <v-container fill-height>
                <v-layout align-center>
                  <v-flex>
                    <h3 class="display-6">OSs</h3>
                    <span class="subheading"> {{ osProprietario.osQt }} <span class="icon is-small"><i class="fa fa-wrench"></i></span></span>
                    <v-divider></v-divider>
                  </v-flex>
                </v-layout>
              </v-container>
            </v-jumbotron>
          </div>
        </v-flex>
      </v-layout>
  </div>
</template>
<script src="src/components/proprietario/proprietario-top.js"></script>