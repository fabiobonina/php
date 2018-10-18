<template id="top">
  <div>
    <v-navigation-drawer :mini-variant="miniVariant" fixed   v-model="drawer"  app>
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
        <v-list-tile v-for="item in home" :key="item.title" :to="item.router" @click="" append>
          <v-list-tile-action>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-tile-action>
          <v-list-tile-title>{{ item.title }}</v-list-tile-title>
        </v-list-tile>        
        <v-list-group v-if="user.nivel > 2 && user.grupo == 'P'" prepend-icon="settings_applications" value="true" >
          <v-list-tile slot="activator">
            <v-list-tile-title>CONFIGURAÇÃO</v-list-tile-title>
          </v-list-tile>
          <v-list-tile v-for="item in items" :key="item.title" :to="'/proprietario'+ item.router" @click="">
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
      <v-btn icon @click.stop="miniVariant = !miniVariant">
        <v-icon v-html="miniVariant ? 'chevron_right' : 'chevron_left'"></v-icon>
      </v-btn>
      <a href="#/" class="d-flex ml-3 router-link-active"><img src="dist/img/bit-louc.png" height="36px" width="36px"></a>
      <v-toolbar-title><b>Bit</b>LOUC </v-toolbar-title>
      <v-spacer></v-spacer>
      <v-toolbar-items class="hidden-sm-and-down">
        <v-btn href="#/" flat>Home </v-btn>
        <v-btn v-if="user.nivel > 2" href="#/projetos"  flat>Projetos</v-btn>
      </v-toolbar-items>
    </v-toolbar>
          
    <user v-if="modalUser" v-on:close="modalUser = false"></user>
    <is-login v-if="isLoggedIn !== true" v-on:atualizar="dialog = false"></is-login> 
  </div>
</template>
<script>
  Vue.component('top', {
    name: 'top',
    template: '#top',
    data: function () {
      return {
        drawer: null,
        miniVariant: false,
        errorMessage: '',
        successMessage: '',
        modalUser: false,
        home: [
          { title: 'Home',    router: '/',      icon: 'mdi-home' },
          { title: 'Lojas',   router: '/lojas', icon: 'mdi-store' },          
          { title: 'HelpDesk',router: '/help',  icon: 'mdi-worker' },
          { title: 'OSs',     router: '/oss',   icon: 'mdi-wrench' },
        ],
        items: [
          { title: 'Proprietario',  router: '', icon: 'mdi-view-dashboard' },
          { title: 'Config',        router: '/config', icon: 'mdi-settings' }
        ],
      };
    },
    created: function() {
      
    },
    computed: {
      user() {
        return store.state.user;
      },
      isLoggedIn() {
        return store.state.isLoggedIn;
      },    
      //...Vuex.mapGetters(["isLoggedIn"])
    },
    watch: {
      // sempre que a pergunta mudar, essa função será executada
    },
    methods: {
      atualizar: function (){
        this.isLoggedIn
      }
    }
  });




</script>

<?php require_once 'src/components/user/user.php';?>
<?php require_once 'src/components/includes/isLogin.php';?>
