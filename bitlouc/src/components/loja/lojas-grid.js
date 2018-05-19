Vue.component('grid-lojas', {
  template: '#grid-lojas',
  props: {
    data: Array,
  },
  data: function () {
    return {
      modalItem: {},
      modalEdt: false,
      modalDel: false,
      modalCat: false,
      configs: {
        orderBy: { name: 'Nome', state: 'name' },
        order: 'asc',
        search: ''
      },
      itens: [
        { name: 'Nome', state: 'name' },
        { name: 'Seguimento', state: 'seguimento' }
      ],
    }
  },
  computed: {
    user()  {
      return store.state.user;
    },
    filteredData() {
      const filter = this.configs.search && this.configs.search.toLowerCase(); 
      const list = _.orderBy(this.data, this.configs.orderBy.state, this.configs.order);
      if (_.isEmpty(filter)) {
        return list;
      }
      //return _.filter(list, repo => repo.name.indexOf(filter) >= 0);

      return _.filter(list, function (row) {
        return Object.keys(row).some(function (key) {
          return String(row[key]).toLowerCase().indexOf(filter) > -1
        })
      })
    }
  },
  methods: {
    selecItem: function(data){
      this.modalItem = data;
    },
    onAtualizar: function(){
      this.$store.dispatch("fetchIndex").then(() => {
        console.log("Buscando dados para inicial!")
      });
      this.modalEdt = false,
      this.modalDel = false,
      this.modalCat = false
    }
  }
});