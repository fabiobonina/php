Vue.component('os-grid', {
  template: '#os-grid',
  props: {
    data: Array,
    columns: Array,
    estado: String
  },
  data: function () {
    return {
      sortKey: '',
      showModal: false,
      modalItem: {}
    }
  },
  computed: {
    filteredData: function () {
      var filterKey = this.estado
      var data = this.data
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