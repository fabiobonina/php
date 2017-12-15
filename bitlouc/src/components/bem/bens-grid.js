Vue.component('bens-grid', {
  template: '#bens-grid',
  props: {
    data: Array,
    grupos: Array,
    filterKey: String
  },
  data: function () {
    return {
      sortKey: '',
      sortOrders: '',
      showModal: false,
      modalItem: {},
      geolocalizacao: '',
      selectedGrupo: 'All'
    }
  },
  computed: {
    filteredData: function () {
      var vm = this;
      var grupo = vm.selectedGrupo;
      if(grupo === "All") {
          return vm.data;
      } else {
          return vm.data.filter(function(person) {
              return person.grupo === grupo;
          });
      }
    }
  },
  filters: {
    capitalize: function (str) {
      return str.charAt(0).toUpperCase() + str.slice(1)
    }
  },
  methods: {
    onClose: function(){
      this.showModal = false;
      this.$emit('atualizar');
    },
    selecItem: function(data){
      this.modalItem = data;
    },
  }
});