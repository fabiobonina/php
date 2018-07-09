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
      modalItem: null,
      modalAdd: false,
      modalEdt: false,
      modalDel: false,
      modalCat: false,
      modalOs: false,
      selectedCategoria: '0',
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
    filteredData() {
      var status = this.status;
      var filter = this.configs.search && this.configs.search.toLowerCase();
      var list = _.orderBy(this.data, this.configs.orderBy.state, this.configs.order);
      var categoria = this.selectedCategoria;
      //_.filter(list, repo => repo.status.indexOf(filter) >= 0);
      if(categoria !== "0") {
        list = list.filter(function(row) {
          return Number(row.categoria.id) === Number(categoria);
        });
      }
      if(status){
        list = list.filter(function (row) {
          return Number(row.status) === Number(status);
        });
      }else{
        list = list.filter(function (row) {
          return Number(row.status) <= 1;
        });
      }
      
      if (filter) {
        list = list.filter(function (row) {
          return Object.keys(row).some(function (key) {
            return String(row[key]).toLowerCase().indexOf(filter) > -1
          })
        })
      }
      return list;
    },
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