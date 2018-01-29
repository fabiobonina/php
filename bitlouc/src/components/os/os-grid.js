Vue.component('os-grid', {
  template: '#os-grid',
  props: {
    data: Array,
    columns: Array,
    processo: String
  },
  data: function () {
    return {
      sortKey: '',
      showModal: false,
      modalItem: {},
      selectedProcesso: 'All'
    }
  },
  computed: {
    filteredData: function () {
      var filterKey = this.processo
      var data = this.data
      var processo = this.selectedProcesso;
      return data = data.filter(function (row) {
        return row.processo === filterKey;
      });
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