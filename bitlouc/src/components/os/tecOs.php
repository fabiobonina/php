
<template id="tec-os">
  <div>
    <section class="container">
      <div>
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
      status: null,
    };
  },
  created: function() {
    this.$store.dispatch("setStatus", '' );
  },
  mounted: function() {
    //this.modalLocalAdd = true;
  },
  computed: {
    loja()  {
      return store.getters.getLojaId(this.$route.params._loja);
    },
    user()  {
      return store.state.user;
    },
    oss()  {
      var obj   = store.state.oss;
      var user  = store.state.user;
      
      var usert = "4";
      var value = [];
      for (var entry of obj) {
        //console.log(entry);
        for (var tec of entry.tecnicos) {
          //value.push( entry);
          if(user.id == tec.user_id) {
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
    }
  },
});
</script>