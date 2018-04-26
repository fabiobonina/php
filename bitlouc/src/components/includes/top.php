<template id="top">
      <!-- Hero head: will stick at the top -->
      <div class="hero-head">
      <v-navigation-drawer  fixed   v-model="drawer"  app>
            <v-toolbar flat class="transparent">
              <v-list class="pa-0">
                <v-list-tile avatar>
                  <v-list-tile-avatar>
                    <img :src="user.avatar" >
                  </v-list-tile-avatar>
                  <v-list-tile-content>
                    <v-list-tile-title>{{ user.user }}</v-list-tile-title>
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
      
        <nav class="navbar">
          <div class="container">
            <div class="navbar-brand">
              <a class="navbar-item subtitle is-4 has-text-info" href="index.php" style="margin-bottom: 0;">
                <img src="img/bit-louc.png" alt="BitLOUC: Web | Mobi" width="28" height="28">
                <b class="title is-4 has-text-white">Bit</b>LOUC
              </a>
              <span class="navbar-burger burger" data-target="navbarMenuHeroA">
                <span></span>
                <span></span>
                <span></span>
              </span>
            </div>
            <div id="navbarMenuHeroA" class="navbar-menu">
              <div class="navbar-end">
                <a :class="$route.path == '/' ? 'navbar-item is-active': 'navbar-item' " ><router-link to="/"> Home </router-link></a>
                <a v-if="user.nivel > 2" :class="$route.path == '/projeto' ? 'navbar-item is-active': 'navbar-item' " ><router-link to="/projeto"> Projeto </router-link></a>
                <!--a class="navbar-item"><router-link to="/oss"> OS's</router-link> </a-->
                <a v-if="user.nivel > 2" class="navbar-item" href="__index.php"> SkyHub </a>
                <span class="navbar-item">
                  <a class="button is-primary is-inverted">
                    <span class="icon">
                      <i class="fab fa-github"></i>
                    </span>
                    <span>Download</span>
                  </a>
                </span>
                <a class="navbar-item" v-on:click="modalUser = true">
                  <img :src="user.avatar" alt="BitLOUC: Web | Mobi" width="28" height="28"> {{ user.user }}
                </a>
              </div>
            </div>
          </div>
          <user v-if="modalUser" v-on:close="modalUser = false"></user>
        </nav>
      </div>


</template>