<template id="select-cilindro">
  <v-layout row justify-center>
    <v-flex>
      <v-autocomplete
        v-model="cilindro"
        :items="cilindros"
        color="blue-grey lighten-2"
        label="Cilindro"
        item-text="name"
        data-vv-name="cilindro"
        :filter="filter"
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
            {{data.item.numero }} - {{ data.item.capacidade }}Kg | {{data.item.dt_validade }}
          </v-chip>
        </template>
        <template slot="item" slot-scope="data" >
          <template v-if="typeof data.item !== 'object'">
            <v-list-tile-content v-text="data.item"></v-list-tile-content>
          </template>
          <template v-else>
            <v-list-tile-content>
              <v-list-tile-title>{{data.item.numero }} - {{ data.item.capacidade }}Kg | {{data.item.dt_validade }} </v-list-tile-title>
              <v-list-tile-sub-title> {{ data.item.fabricante }} | {{ data.item.loja_nick }}</v-list-tile-sub-title>
            </v-list-tile-content>
          </template>
        </template>
      </v-autocomplete>
    </v-flex>
    <v-flex>
      <v-btn @click="saveItem()" color="blue" fab small dark>
        <v-icon>add</v-icon>
      </v-btn>
    </v-flex>
  </v-layout>
</template>

<script>
Vue.component('select-cilindro', {
  name: 'select-cilindro',
  template: '#select-cilindro',
  $_veeValidate: {
    validator: 'new'
  },
  props: {
    cilindro: {},
    demanda_id:'',
    programacao_id: '',
    id: '',
  },
  data() {
    return {
      teste: "",
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
    cilindros(){
      return store.state.cilindros;
    },
    cilProgramacao(){
      return store.state.cilProgramacao;
    }
  },
  methods: {
    filter (item, queryText, itemText) {
        const textOne = item.numero.toLowerCase()
        const textTwo = item.cod_barras.toLowerCase()
        const textThree = item.loja_nick.toLowerCase()
        const searchText = queryText.toLowerCase()

        return textOne.indexOf(searchText) > -1 ||
          textTwo.indexOf(searchText) > -1 ||
          textThree.indexOf(searchText) > -1
    },
    saveItem: function(){
      this.errorMessage = [];
      this.$validator.validateAll().then((result) => {
        if ( result ) {
          //store.commit('isLoading');
          var postData = {
            programacao_id: this.programacao_id,
            demanda_id:     this.demanda_id,
            cilindro_id:    this.cilindro.id,
            id: this.id
          };
          console.log(postData);
          this.$http.post('./config/api/cilProgramacao.api.php?action=publish-itens', postData).then(function(response) {
            console.log(response);
            store.commit('isLoading');
            if(!response.data.error){
                this.successMessage.push(response.data.message);
                
                setTimeout(() => {
                  //this.$router.push('/programacao/'+response.data.id)
                  this.$emit('atualizar');
                }, 2000);
              } else{
                this.errorMessage.push(response.data.message);
              }
          })
          .catch(function(error) {
            store.commit('isLoading');
            console.log(error);
          });
        }
      });
    },
    remove () {
        this.item = {}
    },
  },
});
</script>