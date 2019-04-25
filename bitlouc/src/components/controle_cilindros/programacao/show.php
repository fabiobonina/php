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
        <v-container fluid class="grid-list-xl pa-0">
            <v-layout wrap>
                <template>
                    <v-flex v-for="(item, index) in programacao.demandas" :key="item.id">
                        <v-list class="v-list grey lighten-3 pa-0" two-line theme-light>
                            <v-list-tile   avatar  @click="selecItem(item); modAmaracao = !modAmaracao">
                                <v-list-tile-avatar>
                                <v-icon :class="[item.iconClass]">{{ item.cil_tipo.tag }}</v-icon>
                                </v-list-tile-avatar>

                                <v-list-tile-content>
                                  <v-list-tile-title>Tipo: {{ item.cil_tipo.name }}</v-list-tile-title>
                                  <v-list-tile-sub-title>Prog.: {{ item.qtd }}</v-list-tile-sub-title>
                                </v-list-tile-content>

                                <v-list-tile-action>
                                <v-btn icon>
                                    <v-icon>mdi-arrow-right </v-icon>
                                </v-btn>
                                </v-list-tile-action>
                            </v-list-tile>
                        </v-list>
                    </v-flex>
                </template>
            </v-layout>
        </v-container>
        <v-container fluid>
          <demanda-list :data="programacao.demandas" ></demanda-list>
        </v-container>
        <amarar-cilindro :data="item" :dialog="modAmaracao" v-on:close="close(); update()"></amarar-cilindro>
    <rodape></rodape>
  </v-content>
</template>
<?php require_once 'src/components/includes/rodape.php';?>

<?php require_once 'src/components/controle_cilindros/programacao/demanda/_list.php';?>
<?php require_once 'src/components/controle_cilindros/programacao/demanda/_selectCilindro.php';?>
<?php require_once 'src/components/controle_cilindros/programacao/demanda/_listCil.php';?>

<script>
var ProgramacaoShow = Vue.extend({
  template: '#programacao-show',
  name: 'programacao-show',
  data: function () {
    return {
      unsupportedBrowser: false,
      searchQuery: '',
      modAmaracao: false,
      active: '1',
      item: null
    }
  },
  mounted: function() {
    //this.modalBemAdd = true;
  },
  created: function() {
    this.update();
  },
  computed: {
    programacao()  {
      return store.state.cilProgramacao;
    },
    //store.state.lojas // filteredItems
  }, // computed
  methods: {
    update() {
      this.$store.dispatch('findCilProgramacao', this.$route.params._programacao ).then(() => {
        console.log("Buscando dados Programacao")
      });
    },
    close() {
      this.item = NULL;
      this.modAmaracao= !this.modAmaracao;
      
    },
    selecItem: function(item){
      this.item = item;
    },
  },
});
</script>