<template id="demanda-cil">
  <v-card>
    <v-card-text>
      <message :success="successMessage" :error="errorMessage" v-on:close="errorMessage = []; successMessage = []"></message>
      <loader></loader>
    
      <small>Demanda</small>
      <v-layout wrap>
        <v-flex>
          <v-select
            v-model="cil_tipo" :items="cilTipos"
            item-text="name" item-value="id"
            label="Tipo Cilindro" box
            v-on:keyup.enter="addDemanda()"
            data-vv-name="name" v-validate="'required'" required
            return-object
          ></v-select>
        </v-flex>
        <v-flex>
          <v-text-field 
            type="number"
            v-model="qtd"
            label="Qtd. Cilindros" box
            :error-messages="errors.collect('qtd')"
            item-text="qtd"
            data-vv-name="name"
            v-on:keyup.enter="addDemanda()"
          ></v-text-field>
        </v-flex>
        <v-flex>
          <v-btn @click="addDemanda()" color="blue" fab small dark>
            <v-icon>add</v-icon>
          </v-btn>
        </v-flex>
      </v-layout>
                  
      <template>
        <v-list>
          <v-list-tile  v-for="(todo, index) in data" :key="item.index" @click="">
            <template>
              <v-flex v-if="todo.edit">
                <v-select
                  v-model="todo.cil_tipo" :items="cilTipos"
                  item-text="name" item-value="id"
                  label="Tipo Cilindro" box
                  v-on:keyup.enter="addDemanda()"
                  data-vv-name="name"
                  v-validate="'required'" required
                ></v-select>
              </v-flex>
              <v-list-tile-content v-else>
                <v-list-tile-title v-text="todo.cil_tipo.name"></v-list-tile-title>
              </v-list-tile-content>
              <v-flex v-if="todo.edit">
                <v-text-field 
                  type="number"
                  v-model="todo.qtd"
                  label="Qtd. Cilindros" box
                  :error-messages="errors.collect('qtd')"
                  item-text="todo.qtd"
                  data-vv-name="name"
                  v-on:keyup.enter="addDemanda()"
                ></v-text-field>
              </v-flex>
              <v-list-tile-content v-else>
                <v-list-tile-title  v-text="todo.qtd"></v-list-tile-title>
              </v-list-tile-content>

              <v-list-tile-action>
                <v-btn @click="removeDemanda(index)" color="red" fab small dark>
                  <v-icon>&#10006;</v-icon>
                </v-btn>
              </v-list-tile-action>
              <v-list-tile-action>
                <v-btn @click="todo.edit = !todo.edit" color="blue" fab small dark>
                  <v-icon>&#9998;</v-icon>
                </v-btn>
              </v-list-tile-action>
              
            </template>
          </v-list-tile>
        </v-list>
      </template>
    </v-card-text>
  </v-card>
</template>

<script>
Vue.component('demanda-cil', {
  name: 'demanda-cil',
  template: '#demanda-cil',
  $_veeValidate: {
    validator: 'new'
  },
  props: {
    data: Array,
    //filterKey: String,
    //dialogAdd: Boolean,
  },
  data() {
    return {
      errorMessage: [],
      successMessage: [],
      
      item: {},
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
          //store.commit('isLoading');
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
