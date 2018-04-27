<template id="top">
      <!-- Hero head: will stick at the top -->
      <div>
      <v-navigation-drawer  fixed   v-model="drawer"  app>
            <v-toolbar flat class="transparent">
              <v-list class="pa-0">
                <v-list-tile avatar>
                  <v-list-tile-avatar>
                    <img :src="user.avatar" >
                  </v-list-tile-avatar>
                  <v-list-tile-content>
                    <v-list-tile-title>
                      <a v-on:click="modalUser = true"> {{ user.user }} </a>
                    </v-list-tile-title>
                  </v-list-tile-content>
                </v-list-tile>
              </v-list>
            </v-toolbar>
            <v-list dense>
              <v-list-tile @click="">
                <v-list-tile-action>
                  <v-icon>home</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                  <v-list-tile-title>Home</v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>
              <v-list-tile @click="">
                <v-list-tile-action>
                  <v-icon>contact_mail</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                  <v-list-tile-title>Contact</v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>
            </v-list>
          </v-navigation-drawer>
          <v-toolbar color="blue" dark fixed app>
            <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
            <a href="/en/" class="d-flex ml-3 router-link-active"><img src="img/bit-louc.png" height="36px" width="36px"></a>
            <v-toolbar-title><b>Bit</b>LOUC </v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items class="hidden-sm-and-down">
              <v-btn href="#/" flat>Home </v-btn>
              <v-btn v-if="user.nivel > 2" href="#/projetos"  flat>Projetos</v-btn>
              <v-btn v-if="user.nivel > 2" href="__index.php" flat>SkyHub</v-btn>
              <a href="#/en/store" class="btn btn--flat btn--router-active" style="min-width:64px;">
                <div class="btn__content">
                  <span class="hidden-sm-and-down">Store</span>
                  <i aria-hidden="true" class="icon icon--right material-icons">store</i>
                </div>
              </a>
            </v-toolbar-items>
          </v-toolbar>

          <user v-if="modalUser" v-on:close="modalUser = false"></user>

      </div>
</template>