<template id="local-geo">
  <div>
  https://maps.google.com/maps?q=-6.1231004%2C-36.8078442&z=17&hl=pt-BR
  </div>
      <v-btn :disabled=" 0.000000 == local.latitude" :href="'https://maps.google.com/maps?q='+ latitude + '%2C' + longitude +'&z=17&hl=pt-BR'" target="_blank" fab icon dark color="primary">
        <v-icon dark>directions</v-icon>
      </v-btn>
</template>
<script>
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
</script>