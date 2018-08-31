<template id="loja-top">
  <div>
    <v-toolbar color="cyan" dark tabs extended>
      <v-btn @click="$router.go(-1)" icon>
        <v-icon>arrow_back</v-icon>
      </v-btn>
      <v-toolbar-title> {{ loja.nick }}</v-toolbar-title>
      <v-spacer></v-spacer>
      <div class="text-xs-center">
        <v-badge left>
          <v-icon slot="badge" dark small>location_city</v-icon>
          <span>Local: {{ loja.locaisQt }}</span>
        </v-badge>
        &nbsp;&nbsp;
        <v-badge color="green">
          <v-icon slot="badge" dark small>place</v-icon>
          <span>{{ loja.locaisGeoStatus }}% ({{ loja.locaisGeoQt }})</span>
        </v-badge>
        &nbsp;
      </div>

      <v-btn icon>
        <v-icon>more_vert</v-icon>
      </v-btn>
      <v-tabs slot="extension" centered color="cyan" slider-color="yellow">
        <v-tab v-for="n in router" :key="n.title" :to="'/loja/'+ $route.params._id + n.router" ripple> {{ n.title }} </v-tab>
      </v-tabs>
    </v-toolbar>
  </div>
</template>
<script>
Vue.component('loja-top',{
  template: '#loja-top',
  data: function () {
    return {
      errorMessage: '',
      successMessage: '',
      searchQuery: '',
      modalCat: false,
      active: 1,
      router: [
        { title: 'Locais', router: '', icon: 'store' },
        { title: 'OSs', router: '/oss', icon: 'trending_up' },
        { title: 'Bens', router: '/bens', icon: 'person' },
      ],
    };
  },
  created: function() {
    this.$store.dispatch('fetchLocais', this.$route.params._id).then(() => {
      console.log("Buscando dados das locais!")
    });
  },
  mounted: function() {
    //this.modalLocalAdd = true;
  },
  computed: {
    loja()  {
      return store.getters.getLojaId(this.$route.params._id);
    },
    locais()  {
      return store.state.locais;
    },
  }, // computed
  methods: {
    onAtualizar: function(){
      this.$store.dispatch('fetchLocais', this.$route.params._id).then(() => {
        console.log("Buscando dados das locais!")
      });
    }
  },
});
</script>