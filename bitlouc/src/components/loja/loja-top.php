<template id="loja-top">
  <div>
    <v-card>
      <v-toolbar color="cyan" dark>
        <v-btn @click="$router.go(-1)" icon>
          <v-icon>arrow_back</v-icon>
        </v-btn>
        <v-toolbar-title> {{ loja.nick }}</v-toolbar-title>
        <v-spacer></v-spacer>
        <div class="text-xs-center">
          <v-chip small color="indigo" text-color="white">
            <v-avatar class="indigo darken-4"><v-icon small class="icon">mdi-home-modern</v-icon> </v-avatar>
            {{ loja.locaisQt }} | <v-icon small class="icon">mdi-map-marker</v-icon>
            {{ loja.locaisGeoStatus }}% ({{ loja.locaisGeoQt }})
          </v-chip>
        </div>
        <loja-crud :data="loja"></loja-crud>
        <v-tabs slot="extension" dark centered color="cyan" slider-color="yellow">
          <v-tab v-for="n in router" :key="n.title" :to="'/loja/'+ $route.params._id + n.router" ripple> {{ n.title }} </v-tab>
        </v-tabs>
      </v-toolbar>
      <v-chip v-for="categoria in loja.categoria" :key="categoria.id" small color="green" text-color="white">
          {{ categoria.tag }}
      </v-chip>
    </v-card>
  </div>
</template>

<?php require_once 'src/components/loja/_crudLoja.php';?>
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