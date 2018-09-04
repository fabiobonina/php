<template id="local-rota">
    <v-btn :disabled=" 0.000000 == lat" :href="'https://maps.google.com/maps?q='+ lat + '%2C' + long +'&z=17&hl=pt-BR'" target="_blank" fab icon dark color="primary">
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