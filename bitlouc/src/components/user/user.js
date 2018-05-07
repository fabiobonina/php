Vue.component('user', {
  name: 'user',
  template: '#user',
  data: function () {
    return {
      errorMessage: '',
      successMessage: '',
      searchQuery: '',
      modalLocalAdd: false,
      active: 1,
      dialog2: true,
      dialog3: true
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
    ...Vuex.mapActions(["logout"])
  },
});