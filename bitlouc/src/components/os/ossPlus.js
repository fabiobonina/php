var OssPlus = Vue.extend({
  template: '#oss-plus',
  name: 'oss-plus',
  data: function () {
    return {
      modalLocalAdd: false,
      status: null
    };
  },
  created: function() {

  },
  mounted: function() {
    //this.modalLocalAdd = true;
  },
  computed: {
    oss() {
      return store.state.oss;
    },
  }, // computed
  methods: {

  },
});