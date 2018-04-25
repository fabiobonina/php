
Vue.component('grid-local', {
  template: '#grid-local',
  props: {
    data: Array
  },
  data: function () {
    return {
      modalItem: {},
      modalAdd: false,
      modalEdt: false,
      modalDel: false,
      modalCat: false,
      modalGeo: false,
      repos: [],
      configs: {
        orderBy: 'name',
        order: 'asc',
        search: ''
      }
    }
  },
  /*mounted() {
    axios
      .get(ENDPOINT)
      .then(response => response.data)
      .then(data => Vue.set(this, 'repos', data));
  },*/
  computed: {
    filteredData() {
      const filter = this.configs.search && this.configs.search.toLowerCase(); 
      const list = _.orderBy(this.data, this.configs.orderBy, this.configs.order);
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