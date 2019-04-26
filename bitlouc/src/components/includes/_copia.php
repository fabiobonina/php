<template id="copia">
    <v-btn small color="blue darken-2" dark fab v-clipboard="data" @success="handleSuccess">
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

