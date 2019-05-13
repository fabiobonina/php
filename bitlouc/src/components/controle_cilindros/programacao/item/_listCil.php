<template id="list-cilindro">
  <v-card>
    <v-card-text>
      <message :success="successMessage" :error="errorMessage" v-on:close="errorMessage = []; successMessage = []"></message>
      <loader></loader>
    
      <small>Demanda</small>
      <v-layout wrap>  
      </v-layout>
      <template>
        <table style="width:100%" RULES=rows>
          <tr>
            <th>Status</th>
            <th>Numerero</th> 
            <th>Fabricante</th>
            <th>Cod.Barras</th>
            <th></th>
          </tr>
          <template v-for="subItem in items">
            <tr v-if="subItem.edit" >
              <td v-if="subItem.edit" colspan="4">
                <v-flex >
                  <select-cilindro :programacao_id="subItem.programacao_id" :demanda_id="subItem.demanda_id" :id="subItem.id" :cilindro="subItem.cilindro"></select-cilindro>
                </v-flex>
              </td>
              <td class="text-xs-right">
                <!--item-crud :data="subItem" v-on:atualizar="onAtualizar()"></item-crud-->
                <v-btn @click="removeDemanda(index)" color="red" fab small dark>
                  <v-icon>&#10006;</v-icon>
                </v-btn>
                <v-btn @click="subItem.edit = !subItem.edit" color="blue" fab small dark>
                  <v-icon>&#9998;</v-icon>
                </v-btn>
              </td>
            </tr>
            <tr v-else class="blue">
              <td class="text-xs-center">{{ item.cil_tipo.name }}</td>
              <td class="text-xs-center">{{ subItem.cilindro.numero }}</td>
              <td class="text-xs-center">{{ subItem.cilindro.fabricante }}</td>
              <td class="text-xs-center">{{ subItem.cilindro.cod_barras }}</td>
              <td class="text-xs-right">
                <!--item-crud :data="subItem" v-on:atualizar="onAtualizar()"></item-crud-->
                <v-btn @click="removeDemanda(index)" color="red" fab small dark>
                  <v-icon>&#10006;</v-icon>
                </v-btn>
                <v-btn @click="subItem.edit = !subItem.edit" color="blue" fab small dark>
                  <v-icon>&#9998;</v-icon>
                </v-btn>
                <copia :data="subItem.cilindro.cod_barras "></copia>
              </td>
            </tr>
            <v-divider></v-divider>
          </template>
        </table>
      </template>
    </v-card-text>
  </v-card>
</template>


<script>
Vue.component('list-cilindro', {
  name: 'list-cilindro',
  template: '#list-cilindro',
  $_veeValidate: {
    validator: 'new'
  },
  props: {
    item: {},
    //filterKey: String,
    //dialogAdd: Boolean,
  },
  data() {
    return {
      errorMessage: [],
      successMessage: [],
      cil_tipo: null,
      qtd: null,
      dtProg: null,
    }
  },
  mounted () {
    this.$validator.localize('pt_BR', this.dictionary)
  },
  computed: {
    temMessage () {
      if(this.errorMessage.length > 0) return true
      if(this.successMessage.length > 0) return true
      return false
    },
    items() {
      return store.getters.getItemsDemanda(this.item.id);
    },
    cilTipos() {
      return store.state.cil_tipos;
    },
  },
  created: function() {
    this.$store.dispatch('fetchCilTipos').then(() => {
      console.log("carregando tipos de cilindros")
    });
  },
  methods: {
    remove (item) {
        const index = this.data.indexOf(item)
        if (index >= 0) this.data.splice(index, 1)
    },
    checkForm:function() {
      this.errorMessage = [];
      if( !this.cil_tipo ) this.errorMessage.push("Tipo de cilindro necessário.");
      if( !this.qtd ) this.errorMessage.push("Qtd. de cilindro necessário.");
      if(!this.errorMessage.length) return true;
      //e.preventDefault();
    },
    addDemanda(){
      if ( this.checkForm() ) {
          store.commit('isLoading');
          this.item['cil_tipo'] = this.cil_tipo;
          this.item['qtd']      = this.qtd;
          this.item['edit']     = false;
          
          this.data.push( this.item );
          this.qtd        = "";
          this.item       = {};
          this.cil_tipo   = {};
          store.commit('isLoading')
          //console.log(this.data);
        }
      
    },
    removeDemanda(index){
      this.data.splice(index, 1)
    },
  },
});

</script>
