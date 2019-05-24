
<template id="os-validar">
  <div>
    <atend-grid :data="oss" :status="status" v-on:atualizar="onAtualizar()"></atend-grid>
  </div>
</template>

<script>
var OsValidar = Vue.extend({
  template: '#os-validar',
  name: 'os-validar',
  data: function () {
    return {
      modalLocalAdd: false,
      status: ''
    };
  },
  created: function() {
    this.$store.dispatch('findOsStatus', '5' ).then(() => {
        console.log("Buscando dados da os")
    });
    this.$store.dispatch("setStatus", '' );
  },
  mounted: function() {
    //this.modalLocalAdd = true;
  },
  computed: {
    oss() {
      return this.$store.state.oss;
    },
  }, // computed
  methods: {
    onAtualizar: function(){
      this.$store.dispatch('findOsStatus', '5' ).then(() => {
        console.log("Buscando dados da os")
      });
    },
  },
});

</script>