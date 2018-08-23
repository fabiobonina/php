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
    //this.$store.dispatch('fetchLocais', this.$route.params._id).then(() => {
      //console.log("Buscando dados das locais!")
    //});
  },
  mounted: function() {
    //this.modalLocalAdd = true;
  },
  computed: {
    loja()  {
      return store.getters.getLojaId(this.$route.params._id);
    },
    user()  {
      return store.state.user;
    },
    oss()  {
      var obj   = store.state.oss;
      var user  = store.state.user;
      //var usert = "7";
      var value = [];
      for (var entry of obj) {
        for (var tec of entry.tecnicos) {
          //value.push( entry);
          if(user.id == tec.user) {
            //console.log(data);
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
      this.$store.dispatch('fetchLocais', this.$route.params._id).then(() => {
        console.log("Buscando dados das locais!")
      });
    }
  },
});