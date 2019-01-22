
<template id="os-amarar">
  <div>
    <atend-grid :data="oss" :status="status" v-on:atualizar="onAtualizar()"></atend-grid>
  </div>
</template>

<script>
var OsAmarar = Vue.extend({
  template: '#os-amarar',
  name: 'os-amarar',
  data: function () {
    return {
      modalLocalAdd: false,
      status: null
    };
  },
  created: function() {
    this.$store.dispatch('findOsSemAmaracao').then(() => {
        console.log("Buscando dados da os sem amaracao")
    });
    this.$store.dispatch("setStatus", '' );    
  },
  mounted: function() {
    //this.modalLocalAdd = true;
  },
  computed: {
    oss() {
      return store.state.oss;
    },
  }, // computed
  methods: {
    onAtualizar: function(){
      this.$store.dispatch('findOsSemAmaracao').then(() => {
        console.log("Buscando dados da os")
      });
    },

  },
});

</script>