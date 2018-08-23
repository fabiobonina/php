<template id="local-geo">
  <div>
  https://maps.google.com/maps?q=-6.1231004%2C-36.8078442&z=17&hl=pt-BR
  </div>
      <v-btn :disabled=" 0.000000 == local.latitude" :href="'https://maps.google.com/maps?q='+ latitude + '%2C' + longitude +'&z=17&hl=pt-BR'" target="_blank" fab icon dark color="primary">
        <v-icon dark>directions</v-icon>
      </v-btn>
</template>
<script src="src/components/local/_geoLocal.js"></script>