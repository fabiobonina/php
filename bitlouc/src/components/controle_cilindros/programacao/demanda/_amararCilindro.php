<template id="amarar-cilindro">
  <div>
    <v-layout row justify-center>
      <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
        <v-card>
          <v-toolbar dark color="primary">
            <v-btn icon dark @click="dialog = false">
              <v-icon>mdi-close</v-icon>
            </v-btn>
            <v-toolbar-title>Criar Programação</v-toolbar-title>
            <v-spacer></v-spacer>
          </v-toolbar>
          <v-card-text>
            <message :success="successMessage" :error="errorMessage" v-on:close="errorMessage = []; successMessage = []"></message>
            <loader></loader>
            <v-container grid-list-md>
              <v-list-tile @click="">
                <v-list-tile-content v-if="data">
                  <v-list-tile-title>Tipo: {{ data.cil_tipo.name }}</v-list-tile-title>
                  <v-list-tile-sub-title>Prog.: {{ data.qtd }}</v-list-tile-sub-title>
                </v-list-tile-content>
              </v-list-tile>
              <select-cilindro :programacao_id="data.programacao_id" :demanda_id="data.id" :cilindro="item" v-on:atualizar="atualizar()"></select-cilindro>
              <v-layout row justify-center>  
                <v-flex>
                  <list-cilindro :item="data"></list-cilindro>
                </v-flex>
              </v-layout>
            </v-container>
          </v-card-text>
        </v-card>
      </v-dialog>
    </v-layout>
  </div>
</template>

<?php require_once 'src/components/controle_cilindros/programacao/demanda/_demandaCil.php';?>

<script>
Vue.component('amarar-cilindro', {
  name: 'amarar-cilindro',
  template: '#amarar-cilindro',
  $_veeValidate: {
    validator: 'new'
  },
  props: {
    data: {},
    dialog: Boolean,
  },
  data() {
    return {
      errorMessage: [],
      successMessage: [],
      
      cilindro: [],
      isEditing: false,
      item: {},
    };
  },
  mounted () {
    this.$validator.localize('pt_BR', this.dictionary)
  },
  computed: {
    user()  {
      return store.state.user;
    },
    temMessage () {
      if(this.errorMessage.length > 0) return true
      if(this.successMessage.length > 0) return true
      return false
    },
    count () {
			return store.state.isLoading
		},
  },
  created: function() {
    this.dataT();
    this.updateCilindros();
  },
  methods: {
    updateCilindros() {
      this.$store.dispatch("fetchCilindros").then(() => {
        this.locais = store.state.locais;
        //store.commit('isLoading');
      });
      this.atualizar();
    },
    close () {
      this.dialog = false;
      this.$emit('close');
    },
    atualizar: function(){
      this.$store.dispatch('showCilProgramacao', this.$route.params._programacao ).then(() => {
        console.log("Buscando dados Programacao")
      });
    },
    remove (item) {
        //const index = this.loja.indexOf(item)
        //if (index >= 0) this.loja.splice(index, 1)
        this.loja = null
    },
    cilindroFilter (item, queryText, itemText) {
        const textOne = item.numero.toLowerCase()
        const textTwo = item.cod_barras.toLowerCase()
        const textThree = item.loja_nick.toLowerCase()
        const searchText = queryText.toLowerCase()

        return textOne.indexOf(searchText) > -1 ||
          textTwo.indexOf(searchText) > -1 ||
          textThree.indexOf(searchText) > -1
    },
    addDemanda(){
          this.item['edit']     = false;
          this.cilindro = this.item;
        
          this.item       = {};
          console.log(this.cilindro);
    },
    removeDemanda(index){
      this.data.splice(index, 1)
    },
    checkForm:function() {
      this.errorMessage = [];
      if( !this.loja ) this.errorMessage.push("Loja necessário.");
      if( !this.local ) this.errorMessage.push("Local necessário.");
      if( !this.demanda ) this.errorMessage.push("Demanda necessário.");
      if(!this.errorMessage.length) return true;
      //e.preventDefault();
    },
    dataT() {
      var datetime = new Date().toLocaleString();
      var res = datetime.split(" ");
      var date = res[0].split("/");
      var time = res[1].slice(0, -3);
      var dtTime = date[2] + "-" + date[1] + "-" + date[0];
      this.dataProg = dtTime;
    },
  },
});
</script>