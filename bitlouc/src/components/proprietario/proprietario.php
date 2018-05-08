<template id="home">
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
  <v-jumbotron color="primary" dark  height="200">
    <v-container fill-height>
      <v-layout align-center>
        <v-flex text-xs-center>
          <div>
            <p class="heading">Local</p>
            <p class="title is-4"> {{ proprietario.locaisQt }} <span class="icon is-small"> <i class="fa fa-building-o"></i></span></p>
            <p> {{ proprietario.locaisGeoStatus }}% ({{ proprietario.locaisGeoQt }})<span class="icon"><i class="fa fa-map-marker"></i></span></p>
          </div>
        </v-flex>
      </v-layout>
      <v-layout align-center>
        <v-flex text-xs-center>
          <div>
            <p class="heading">OS´s</p>
            <p class="title is-4"> {{ osProprietario.osQt }} <span class="icon is-small"><i class="fa fa-wrench"></i></span></p>
          </div>
        </v-flex>
      </v-layout>
    </v-container>
  </v-jumbotron>
  <v-container>
    <v-layout row wrap>
      <v-flex xs12 lg5 mb-3>
        <div>
          <p class="heading">Local</p>
          <p class="title is-4"> {{ proprietario.locaisQt }} <span class="icon is-small"> <i class="fa fa-building-o"></i></span></p>
          <p> {{ proprietario.locaisGeoStatus }}% ({{ proprietario.locaisGeoQt }})<span class="icon"><i class="fa fa-map-marker"></i></span></p>
        </div>
      </v-flex>
      <v-flex xs12 lg5 offset-lg2>
          <div>
            <p class="heading">OS´s</p>
            <p class="title is-4"> {{ osProprietario.osQt }} <span class="icon is-small"><i class="fa fa-wrench"></i></span></p>
          </div>
      </v-flex>
    </v-layout>
  </v-container>
          <div class="container">
            <ul>
              <li :class="$route.path == '/' ? 'is-active' : ''" ><a href="#/" >Dashboard</a></li>
              <li :class="$route.path == '/oss' ? 'is-active' : ''" ><a href="#/oss" >OS´s</a></li>
              <li :class="$route.path == '/lojas' ? 'is-active' : ''" ><a href="#/lojas" >Lojas</a></li>
            </ul>
          </div>
        
          
<v-content>
      <section>
        
      </section>

      <section>
        <v-layout column wrap class="my-5" align-center >
          <v-flex xs12 sm4 class="my-3">
            <div class="text-xs-center">
              <h2 class="headline">{{ proprietario.nick }}</h2>
              <span class="subheading">
              {{ proprietario.name }}
              </span>
            </div>
          </v-flex>
          <v-flex xs12>
            <v-container grid-list-xl>
              <v-layout row wrap align-center>
                <v-flex xs12 md4>
                  <v-card class="elevation-0 transparent">
                    <v-card-text class="text-xs-center">
                      <v-icon x-large class="blue--text text--lighten-2">color_lens</v-icon>
                    </v-card-text>
                    <v-card-title primary-title class="layout justify-center">
                      <div class="headline text-xs-center">Material Design</div>
                    </v-card-title>
                    <v-card-text>
                      Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt ornare. 
                      Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. 
                      Nullam in aliquet odio. Aliquam eu est vitae tellus bibendum tincidunt. Suspendisse potenti. 
                    </v-card-text>
                  </v-card>
                </v-flex>
                <v-flex xs12 md4>
                  <v-card class="elevation-0 transparent">
                    <v-card-text class="text-xs-center">
                      <v-icon x-large class="blue--text text--lighten-2">flash_on</v-icon>
                    </v-card-text>
                    <v-card-title primary-title class="layout justify-center">
                      <div class="headline">Fast development</div>
                    </v-card-title>
                    <v-card-text>
                      Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt ornare. 
                      Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. 
                      Nullam in aliquet odio. Aliquam eu est vitae tellus bibendum tincidunt. Suspendisse potenti. 
                    </v-card-text>
                  </v-card>
                </v-flex>
                <v-flex xs12 md4>
                  <v-card class="elevation-0 transparent">
                    <v-card-text class="text-xs-center">
                      <v-icon x-large class="blue--text text--lighten-2">build</v-icon>
                    </v-card-text>
                    <v-card-title primary-title class="layout justify-center">
                      <div class="headline text-xs-center">Completely Open Sourced</div>
                    </v-card-title>
                    <v-card-text>
                      Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt ornare. 
                      Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. 
                      Nullam in aliquet odio. Aliquam eu est vitae tellus bibendum tincidunt. Suspendisse potenti. 
                    </v-card-text>
                  </v-card>
                </v-flex>
              </v-layout>
            </v-container>
          </v-flex>
        </v-layout>
      </section>


    <div>
      <router-view></router-view>
    </div>
  </div>
</template>