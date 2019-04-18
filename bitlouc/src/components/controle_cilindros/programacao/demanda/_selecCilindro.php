<template id="selec-cilindro">
  <div>
    
        <v-flex>
          <v-autocomplete
            v-model="item"
            :items="itens"
            color="blue-grey lighten-2"
            label="Cilindro"                              
            item-text="name"              
            data-vv-name="cilindro"
            :filter="cilindroFilter"
            return-object
            v-validate="'required'"
            required
            >
            <template slot="selection" slot-scope="data">
              <v-chip :selected="data.selected"
                close
                class="chip--select-multi"
                @input="remove(data.item)"
              >
                {{ data.item.numero }} - {{ data.item.fabricante }}
              </v-chip>
            </template>
            <template slot="item" slot-scope="data" >
              <template v-if="typeof data.item !== 'object'">
                <v-list-tile-content v-text="data.item"></v-list-tile-content>
              </template>
              <template v-else>
                <v-list-tile-content>
                  <v-list-tile-title>{{data.item.numero }} - {{ data.item.cod_barras }}</v-list-tile-title>
                  <v-list-tile-sub-title v-html="data.item.fabricante"></v-list-tile-sub-title>
                </v-list-tile-content>
              </template>
            </template>
          </v-autocomplete>
        </v-flex>
        <v-flex>
          <v-btn @click="addDemanda()" color="blue" fab small dark>
            <v-icon>add</v-icon>
          </v-btn>
        </v-flex>
      
  </div>
</template>

<script>
Vue.component('selec-cilindro', {
  name: 'selec-cilindro',
  template: '#selec-cilindro',
  $_veeValidate: {
    validator: 'new'
  },
  props: {
    data: {},
    itens: [],
  },
  data() {
    return {
      item: {},
    };
  },
  mounted () {
    this.$validator.localize('pt_BR', this.dictionary)
  },
  methods: {
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
          this.item['edit'] = false;
          this.data         = this.item;
          this.item         = {};
          console.log(this.cilindro);
    },
    removeDemanda(index){
      this.data.splice(index, 1)
    },
    checkForm:function() {
      this.errorMessage = [];
      if( !this.demanda ) this.errorMessage.push("Demanda necessário.");
      if(!this.errorMessage.length) return true;
      //e.preventDefault();
    },
  },
});
</script>