var OssStus = Vue.extend({
  template: '#oss-stus',
  name: 'oss-stus',
  data: function () {
    return {
      errorMessage: '',
      successMessage: '',
      status: '0',
    };
  },
  created: function() {
    //this.$store.dispatch('fetchLocais', this.$route.params._id).then(() => {
      //console.log("Buscando dados das locais!")
    //});
  },
  mounted: function() {
    //this.modalLocalAdd = true;
  },
  computed: {
    user()  {
      return store.state.user;
    },
    oss()  {
      return store.state.oss;
    }
  }, // computed
  methods: {

  },
});