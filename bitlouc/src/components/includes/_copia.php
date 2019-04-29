<template id="copia">
  <v-btn v-clipboard="data" @success="handleSuccess" fab icon dark small color="blue darken-2">
    <v-icon>mdi-content-copy</v-icon>
  </v-btn>
    
</template>


<script>
Vue.component('copia', {
  template: '#copia',
  props: {
    data: String,
  },
  data: function () {
    return {
    }
  },
  computed: {
  },
  methods: {
    handleSuccess(e) {
      console.log('success!', e.text);
    },
  }
});
</script>

