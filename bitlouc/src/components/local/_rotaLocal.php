<template id="local-rota">
    <v-btn v-if="lat == 0.000000" fab icon dark small color="grey">
      <v-icon>mdi-map-marker-off</v-icon>
    </v-btn>
    <v-btn  v-else fab icon dark small color="primary"
      :href="'https://maps.google.com/maps?q='+ lat + '%2C' + long +'&z=17&hl=pt-BR'" target="_blank">
      <v-icon dark>mdi-directions</v-icon>
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