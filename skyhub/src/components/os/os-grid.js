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
      configs: {
        orderBy: 'name',
        order: 'asc',
        search: ''
      }
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
      const status = this.status;
      const filter = this.configs.search && this.configs.search.toLowerCase();
      var list = _.orderBy(this.data, this.configs.orderBy, this.configs.order);
      //_.filter(list, repo => repo.status.indexOf(filter) >= 0);
      
      
        list = list.filter(function (row) {
          return Number(row.status) === Number(this.status);
        })
      
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