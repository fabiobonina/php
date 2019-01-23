Vue.component('user', {
  name: 'user',
  template: '#user',
  data: function () {
    return {
      errorMessage: '',
      successMessage: '',
      searchQuery: '',
      modalLocalAdd: false,
      active: 1
    };
  },
  created: function() {
    
  },
  mounted: function() {
    //this.modalLocalAdd = true;
  },
  computed: {
    user()  {
      return store.state.user;
    },
  }, // computed
  methods: {
    
  },
});