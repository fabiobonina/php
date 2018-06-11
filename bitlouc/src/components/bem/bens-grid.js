Vue.component('bens-grid', {
  template: '#bens-grid',
  props: {
    data: Array,
    categorias: Array,
    status: String,
    filterKey: String
  },
  data: function () {
    return {
      sortKey: '',
      sortOrders: '',
      modalOsAdd: false,
      modalItem: {},
      geolocalizacao: '',
      selectedCategoria: 'All',
      configs: {
        orderBy: { name: 'Nome', state: 'name' },
        order: 'asc',
        search: ''
      },
      itens: [
        { name: 'Nome', state: 'name' },
        { name: 'Regional', state: 'regional' }
      ],
    }
  },
  mounted: function() {
    //this.modalOsAdd = true;
  },
  computed: {
    user()  {
      return store.state.user;
    },
    filteredData: function () {
      var vm = this;
      var categoria = vm.selectedCategoria;
      if(categoria === "All") {
        return vm.data.filter(function(person) {
          return person.status === vm.status;
        });
      } else {
        return vm.data.filter(function(person) {
          return person.categoria === categoria && person.status === vm.status;
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
    onAtualizar: function(){
      this.$store.dispatch('fetchLocais', this.$route.params._id).then(() => {
        this.modalBemAdd = false;
        this.modalOsAdd = false;
      });
    },
  }
});