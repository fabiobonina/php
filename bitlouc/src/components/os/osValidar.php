
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
      status: '6'
    };
  },
  created: function() {
    this.$store.dispatch('findOsStatus', this.$status ).then(() => {
        console.log("Buscando dados da os")
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
      this.$store.dispatch('findOsStatus', this.$status ).then(() => {
        console.log("Buscando dados da os")
      });
    },
  },
});

</script>