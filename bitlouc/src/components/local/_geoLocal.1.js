Vue.component('local-geo', {
  name: 'local-geo',
  template: '#local-geo',
  props: {
    longitude: String,
    latitude: String
  },
  data() {
    return {
      errorMessage: [],
      successMessage: [],
      coordenadas:'',
      isLoading: false
    };
  },
  computed: {
    temMessage () {
      if(this.errorMessage.length > 0) return true
      if(this.successMessage.length > 0) return true
      return false
    }
  },
  methods: {
    
  },
});