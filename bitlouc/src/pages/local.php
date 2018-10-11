<template id="local">
  <div>
    <top></top>
    <v-content>
      <local-top></local-top>
      <v-container fluid>
        <router-view></router-view>
      </v-container>
    </v-content>
    <rodape></rodape>
  </div>
</template>
<?php require_once 'src/components/includes/top.php';?>
<?php require_once 'src/components/includes/rodape.php';?>

<?php require_once 'src/components/local/local-top.php';?>
<?php require_once 'src/components/bem/equipamentosLocal.php';?>

<script>
var Local = Vue.extend({
  template: '#local',
  data: function () {
    return {
      unsupportedBrowser: false,
      searchQuery: '',
      modalBemAdd: false,
      active: '1'
    };
  },
  mounted: function() {
    //this.modalBemAdd = true;
  },
  created: function() {
    this.$store.dispatch('fetchLocalLoja', this.$route.params._loja).then(() => {
        console.log("Buscando dados do local!")
    });
    this.$store.dispatch('fetchEquipamentoLocal', this.$route.params._local).then(() => {
      console.log("Buscando dados do equipamento!")
    });
  },
  computed: {
    local()  {
      return store.getters.getLocalId(this.$route.params._local);
    },
    loja()  {
      return store.getters.getLojaId(this.$route.params._loja);
    },
    //store.state.lojas // filteredItems
  }, // computed
  methods: {

  },
});
</script>

