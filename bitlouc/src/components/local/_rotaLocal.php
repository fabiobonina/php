<template id="local-rota">
    <v-btn fab icon dark small color="primary" :disabled=" 0.000000 == lat" 
      :href="'https://maps.google.com/maps?q='+ lat + '%2C' + long +'&z=17&hl=pt-BR'" target="_blank">
      <v-icon dark>directions</v-icon>
    </v-btn>
</template>
<script>
  Vue.component('local-rota', {
    name: 'local-rota',
    template: '#local-rota',
    props: {
      long: String,
      lat: String
    },
    data() {
      return {
      };
    },
    computed: {
    },
    methods: {
    },
  });
</script>