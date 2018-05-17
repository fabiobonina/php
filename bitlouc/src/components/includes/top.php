<template id="top">
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
      <v-list>
        <v-list-tile  @click="" href="#/">
          <v-list-tile-action>
            <v-icon>home</v-icon>
          </v-list-tile-action>
          <v-list-tile-title>Home</v-list-tile-title>
        </v-list-tile>
        
        <v-list-group prepend-icon="account_circle" value="true" >
          <v-list-tile slot="activator">
            <v-list-tile-title>Oss</v-list-tile-title>
          </v-list-tile>
          <v-list-tile v-for="item in items" :key="item.title" :href="item.router" @click="">
            <v-list-tile-action>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-tile-action>
            <v-list-tile-title >{{ item.title }}</v-list-tile-title>
          </v-list-tile>
        </v-list-group>
        <v-list-group prepend-icon="account_circle" value="false" >
          <v-list-tile slot="activator">
            <v-list-tile-title>Lojas</v-list-tile-title>
          </v-list-tile>
          <v-list-tile v-for="item in itemsLojas" :key="item.title" :href="item.router" @click="">
            <v-list-tile-action>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-tile-action>
            <v-list-tile-title >{{ item.title }}</v-list-tile-title>
          </v-list-tile>
        </v-list-group>
      </v-list>
    </v-navigation-drawer>
    <v-toolbar color="blue" dark fixed app>
      <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
      <a href="#/" class="d-flex ml-3 router-link-active"><img src="img/bit-louc.png" height="36px" width="36px"></a>
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
    <is-login v-if="isLoggedIn !== true" v-on:close="atualizar()"></is-login> 
  </div>
</template>
<script src="src/components/includes/top.js"></script>

<?php require_once 'src/components/user/user.php';?>
<?php require_once 'src/components/includes/isLogin.php';?>