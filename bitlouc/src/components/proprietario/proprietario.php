<template id="home">
  
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

      <section>
      <template>
  <div class="text-xs-center">
    <v-badge left>
      <span slot="badge">9999</span>
      <span>Examples</span>
    </v-badge>
    &nbsp;&nbsp;
    <v-badge color="green">
      <v-icon slot="badge" dark small>list</v-icon>
      <span>Lists</span>
    </v-badge>
  </div>
</template>
        
      </section>

      <section>

      </section>
      <div>
        <router-view></router-view>
      </div>

  </div>
</template>