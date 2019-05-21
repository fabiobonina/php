
<template id="tec-os">
  <div>
    <section class="container">

      <div>
        <v-flex xs6 v-if="user.nivel > 2 && user.grupo == 'P'" small >
          <v-autocomplete
            v-model="tecnico"
            :items="tecnicos"
            solo
            chips
            color="blue-grey lighten-2"
            label="Tecnico(s)"                              
            item-text="name"              
            data-vv-name="tecnicos"
            :filter="customFilter"
            return-object
          >
            <template slot="selection" slot-scope="data">
              <v-chip
                :selected="data.selected"
                close
                class="chip--select-multi"
                @input="remove(data.item)"
              >
                <v-avatar>
                  <img :src="data.item.avatar">
                </v-avatar>
                {{ data.item.user_nick }}
              </v-chip>
            </template>
            <template slot="item" slot-scope="data" >
              <template v-if="typeof data.item !== 'object'">
                <v-list-tile-content v-text="data.item"></v-list-tile-content>
              </template>
              <template v-else>
                <v-list-tile-avatar>
                  <img :src="data.item.avatar">
                </v-list-tile-avatar>
                <v-list-tile-content>
                  <v-list-tile-title v-html="data.item.user_nick"></v-list-tile-title>
                  <v-list-tile-sub-title v-html="data.item.email"></v-list-tile-sub-title>
                </v-list-tile-content>
              </template>
            </template>
          </v-autocomplete>
        </v-flex>
        <atend-grid :data="oss" :status="status"></atend-grid>
      </div>
    </section>
  </div>
</template>
<script>
var TecOs = Vue.extend({
  template: '#tec-os',
  name: 'tec-os',
  data: function () {
    return {
      errorMessage: '',
      successMessage: '',
      value:[],
      tecnico: null,
      status: null,
    };
  },
  created: function() {
    this.$store.dispatch("setStatus", '' );
    //this.tecnico();
  },
  mounted: function() {
    //this.modalLocalAdd = true;
    //this.tec = store.state.user;
    //this.tecnico();
  },
  computed: {
    loja()  {
      return store.getters.getLojaId(this.$route.params._loja);
    },
    user()  {
      return store.state.user;
    },
    tecnicos() {
      return store.state.tecnicos;
    },
    oss()  {
      var obj     = store.state.oss;
      var user    = store.state.user;
      var user_id  = null;
      if(this.tecnico){
        user_id = this.tecnico.user_id;
      }else{
        user_id = user.id;
      }
      var usert = "4";
      var value = [];
      for (var entry of obj) {
        //console.log(entry);
        for (var tec of entry.tecnicos) {
          //value.push( entry);
          if(user_id == tec.user_id) {
            //console.log(entry);
            value.push( entry);
          }
        }
        
      }

      return value;
      //for (let [key, value] of iterable) {
        //console.log(value);
        //this.value.push( value);
      //}
      //return data;
    },
    filteredData() {
      /*const filter = this.configs.search && this.configs.search.toLowerCase(); 
      const list = _.orderBy(this.data, this.configs.orderBy, this.configs.order);
      if (_.isEmpty(filter)) {
        return list;
      }
      //return _.filter(list, repo => repo.name.indexOf(filter) >= 0);

      return _.filter(list, function (row) {
        return Object.keys(row).some(function (key) {
          return String(row[key]).toLowerCase().indexOf(filter) > -1
        })
      })*/
    }
  }, // computed
  methods: {
    onAtualizar: function(){
      this.$store.dispatch('fetchLocais', this.$route.params._loja).then(() => {
        console.log("Buscando dados das locais!")
      });
    },
    
    customFilter (item, queryText, itemText) {
        const textOne = item.user_nick.toLowerCase()
        const textTwo = item.email.toLowerCase()
        const searchText = queryText.toLowerCase()

        return textOne.indexOf(searchText) > -1 ||
          textTwo.indexOf(searchText) > -1
    },
    remove (item) {
        this.tecnico = null;
    },

  },
});
</script>