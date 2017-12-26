Vue.component('bens-grid', {
  template: '#bens-grid',
  props: {
    data: Array,
    categorias: Array,
    filterKey: String
  },
  data: function () {
    return {
      sortKey: '',
      sortOrders: '',
      showModal: false,
      modalItem: {},
      geolocalizacao: '',
      selectedCategoria: 'All'
    }
  },
  computed: {
    filteredData: function () {
      var vm = this;
      var categoria = vm.selectedCategoria;
      if(categoria === "All") {
          return vm.data;
      } else {
          return vm.data.filter(function(person) {
              return person.categoria === categoria;
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