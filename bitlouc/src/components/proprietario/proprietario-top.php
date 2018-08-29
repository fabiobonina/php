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
          <v-badge>
            <v-icon slot="badge" dark small>location_city</v-icon>
            <span>Local: {{ proprietario.locaisQt }}</span>
          </v-badge>
          &nbsp;&nbsp;
          <v-badge color="green">
            <v-icon slot="badge" dark small>place</v-icon>
            <span>{{ proprietario.locaisGeoStatus }}% ({{ proprietario.locaisGeoQt }})</span>
          </v-badge>
          &nbsp;&nbsp;
          <v-badge color="blue">
            <v-icon slot="badge" dark small>place</v-icon>
            <span>OS: {{ osProprietario.osQt }}</span>
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
  </div>
</template>
<script>
    Vue.component('proprietario-top', {
    name: 'proprietario-top',
    template: '#proprietario-top',
    data: function () {
      return {
        errorMessage: '',
        successMessage: '',
        router: [
          { title: 'Lojas', router: '', icon: 'trending_up' },
          { title: 'Locais', router: 'locais', icon: 'store' },
          { title: 'Oss', router: 'oss', icon: 'person' },
          { title: 'Bens', router: 'bens', icon: 'person' },
        ],
        model: 'tab-2',
      };
    },
    created() {
      this.$store.dispatch("fetchIndex").then(() => {
        console.log("Buscando dados para inicial!")
      });
      this.$store.dispatch("fetchOs").then(() => {
        console.log("Buscando dados OS!")
      });
    },
    computed: {
      user() {
        return store.state.user;
      },
      proprietario() {
        return store.state.proprietario;
      },
      osProprietario() {
        return store.state.osProprietario;
      },
      lojas() {
        return store.state.lojas;
      }
    },
    methods: {
    }
  });
  
</script>