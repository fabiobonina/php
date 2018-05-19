<template id="proprietario">
  <div>
    
    <template>
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
    </template>
  </div>
</template>
<script src="src/components/proprietario/proprietario.js"></script>