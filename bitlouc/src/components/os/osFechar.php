
<template id="os-fechar">
  <div>
    <atend-grid :data="oss" :status="status" v-on:atualizar="onAtualizar()"></atend-grid>
  </div>
</template>

<script>
var OsFechar = Vue.extend({
  template: '#os-fechar',
  name: 'os-fechar',
  data: function () {
    return {
      modalLocalAdd: false,
      status: '4'
    };
  },
  created: function() {
    this.$store.dispatch('findOsStatus', '4' ).then(() => {
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