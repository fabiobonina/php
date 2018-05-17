Vue.component('os-grid', {
  template: '#os-grid',
  props: {
    data: Array,
    status: String,
  },
  data: function () {
    return {
      sortKey: '',
      showModal: false,
      modalItem: {},
      modalTec: false,
      modalEdt: false,
      modalDel: false,
      modalOs: false,
      selected: [2],
      configs: {
        orderBy: { name: 'Data', state: 'data' },
        order: 'desc',
        search: ''
      },
      labels: ['Em trasito', 'Atendendo', 'Retorno Viagem', 'Completo' ],
      labels2: ['Atendimento', 'Concluido', 'Fechado', 'Validado' ],
      itens: [
        { name: 'Data', state: 'data' },
        { name: 'Local', state: 'local.name' },
        { name: 'Loja', state: 'loja' }
      ],
    }
  },
  computed: {
    user()  {
      return store.state.user;
    },
    filteredData2: function () {
      var filterKey = 0
      var data = this.data
      return data = data.filter(function (row) {
        return row.processo === filterKey;
      });
    },
    filteredData() {
      var status = this.status;
      var filter = this.configs.search && this.configs.search.toLowerCase();
      var list = _.orderBy(this.data, this.configs.orderBy.state, this.configs.order);
      //_.filter(list, repo => repo.status.indexOf(filter) >= 0);
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
    }
  },
  methods: {
    onClose: function(){
      this.showModal = false;
    },
    selecItem: function(data){
      this.modalItem = data;
    },
    onAtualizar: function(){
      this.$store.dispatch('fetchLocais', this.$route.params._id).then(() => {
        this.showModal = false;
      });
    },
  }
});