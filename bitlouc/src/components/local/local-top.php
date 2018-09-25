<template id="local-top">
  <div>
    <v-toolbar color="cyan" dark tabs extended>
      <v-btn @click="$router.go(-1)" icon>
        <v-icon>arrow_back</v-icon>
      </v-btn>
      <v-toolbar-title> {{ local.tipo }} - {{ local.name }} </v-toolbar-title>
      <v-spacer></v-spacer>
      <local-rota :lat="local.latitude" :long="local.longitude"></local-rota>
      <local-crud :data="local"></local-crud>
      <v-tabs slot="extension" centered color="cyan" slider-color="yellow">
        <v-tab v-for="n in router" :key="n.title" :to="'/loja/'+ $route.params._id +'/local/'+ $route.params._local + n.router" ripple> {{ n.title }} </v-tab>
      </v-tabs>
    </v-toolbar>
    <v-chip v-for="categoria in local.categoria" :key="categoria.id" small color="green" text-color="white">
          {{ categoria.tag }}
      </v-chip>
  </div>
</template>

<?php require_once 'src/components/local/_crudLocal.php';?>
<?php require_once 'src/components/local/_rotaLocal.php';?>

<script>
  Vue.component('local-top',{
    template: '#local-top',
    data: function () {
      return {
        router: [
          { title: 'Bens', router: '', icon: 'store' },
          { title: 'OSs', router: '/oss', icon: 'trending_up' }
        ],
      };
    },
    mounted: function() {
      //this.modalBemAdd = true;
    },
    created: function() {
      
    },
    computed: {
      local()  {
        return store.getters.getLocalId(this.$route.params._local);
      },
      loja()  {
        return store.getters.getLojaId(this.$route.params._id);
      },
      bens()  {
        return store.getters.getBensLocal(this.$route.params._local);
      },
      //store.state.lojas // filteredItems
    }, // computed
    methods: {
      onAtualizar: function(){
        this.$store.dispatch('fetchLocais', this.$route.params._id).then(() => {
          this.modalBemAdd = false;
        });
      },
    },
  });

</script>