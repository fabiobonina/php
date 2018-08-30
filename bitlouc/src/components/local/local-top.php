<template id="local-top">
  <div>
  <v-toolbar color="cyan" dark tabs extended>
      <v-btn @click="$router.go(-1)" icon>
        <v-icon>arrow_back</v-icon>
      </v-btn>
      <v-toolbar-title> {{ local.tipo }} - {{ local.name }} </v-toolbar-title>
      <v-spacer></v-spacer>
      <div class="text-xs-center">
        <v-badge left>
          <v-icon slot="badge" dark small>location_city</v-icon>
          <span> {{ local.id }}</span>
        </v-badge>
        &nbsp;&nbsp;
        <v-badge color="green">
          <v-icon slot="badge" dark small>place</v-icon>
          <span>{{ local.locaisGeoStatus }}% ({{ local.locaisGeoQt }})</span>
        </v-badge>
        &nbsp;
      </div>
      <v-btn :disabled=" 0.000000 == local.latitude" :href="'https://maps.google.com/maps?q='+ local.latitude + ',' + local.longitude" target="_blank" fab icon dark color="primary">
        <v-icon dark>directions</v-icon>
      </v-btn>
      <v-btn icon>
        <v-icon>more_vert</v-icon>
      </v-btn>
      <v-tabs slot="extension" centered color="cyan" slider-color="yellow">
        <v-tab v-for="n in router" :key="n.title" :to="'/loja/'+ $route.params._id +'/local/'+ $route.params._local + n.router" ripple> {{ n.title }} </v-tab>
      </v-tabs>
    </v-toolbar>
    <section>
      <!-- Hero head: will stick at the top -->
      <top></top>
      <!-- Hero content: will be in the middle -->
      <div>
        <div>
          <div>
            <div>
              <h1> {{ local.tipo }} - {{ local.name }}</h1>
              <p> {{ local.municipio }}/{{ local.uf }}
                <span v-for="categoria in local.categoria"> <span >{{ categoria.tag }}</span> &nbsp;  </span>
              </p>
              <p>{{ loja.nick }}: Regional: &nbsp; <a>#{{local.regional}} </a></p>
            </div>
        </div>
      </div>
      <!-- Hero footer: will stick at the bottom -->
    </section>
    <div>
      <local-add v-if="modalAdd" v-on:close="modalAdd = false" :dialog="modalAdd"></local-add>
      <local-geo v-if="modalGeo" v-on:close="modalGeo = false" :dialog="modalGeo" :data="modalItem"></local-geo>
      <local-edt v-if="modalEdt" v-on:close="modalEdt = false" :dialog="modalEdt" :data="modalItem"></local-edt>
      <local-del v-if="modalDel" v-on:close="modalDel = false" :dialog="modalDel" :data="modalItem"></local-del>
      <local-cat v-if="modalCat" v-on:close="modalCat = false" :dialog="modalCat" :data="modalItem"></local-cat>
    </div>
  </div>
</template>
<script>
  Vue.component('local-top',{
    template: '#local-top',
    data: function () {
      return {
        unsupportedBrowser: false,
        searchQuery: '',
        modalBemAdd: false,
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
      this.$store.dispatch('fetchLocais', this.$route.params._id).then(() => {
        console.log("Buscando dados das locais!")
      });
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