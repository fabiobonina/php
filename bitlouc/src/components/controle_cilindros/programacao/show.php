<template id="programacao-show">
<v-content>
        <v-toolbar color="blue lighten-3" dark>
          <v-btn @click="$router.go(-1)" icon>
            <v-icon>arrow_back</v-icon>
          </v-btn>
          <v-toolbar-title>PROGRAMAÇÃO</v-toolbar-title>
          <v-spacer></v-spacer>
          <local-crud :data="programacao"></local-crud>
        </v-toolbar>
        <v-list-tile @click="">
          <v-list-tile-content>
            <v-list-tile-title>Loja: {{ programacao.loja_nick }} </v-list-tile-title>
            <v-list-tile-sub-title>Local: {{ programacao.local_tipo }} - {{ programacao.local_name }} </v-list-tile-sub-title>
          </v-list-tile-content>
        </v-list-tile>
        <v-chip v-for="categoria in programacao.demandas" :key="categoria.id" small color="green" text-color="white">
          {{ categoria }}
        </v-chip>
        <v-container fluid>
          <demanda-list></demanda-list>
        </v-container>

    <rodape></rodape>
  </v-content>
</template>
<?php require_once 'src/components/includes/rodape.php';?>

<?php require_once 'src/components/controle_cilindros/programacao/demanda/_list.php';?>
<?php require_once 'src/components/local/local-top.php';?>

<script>
var ProgramacaoShow = Vue.extend({
  template: '#programacao-show',
  name: 'programacao-show',
  data: function () {
    return {
      unsupportedBrowser: false,
      searchQuery: '',
      modalBemAdd: false,
      active: '1'
    }
  },
  mounted: function() {
    //this.modalBemAdd = true;
  },
  created: function() {
    this.$store.dispatch('findCilProgramacao', this.$route.params._programacao ).then(() => {
      console.log("Buscando dados Programacao")
    });
    //this.$store.dispatch('fetchEquipamentoLocal', this.$route.params._local).then(() => {
      //console.log("Buscando dados do equipamento!")
    //});
  },
  computed: {
    programacao()  {
      return store.state.cilProgramacao;
    },
    //store.state.lojas // filteredItems
  }, // computed
  methods: {

  },
});
</script>