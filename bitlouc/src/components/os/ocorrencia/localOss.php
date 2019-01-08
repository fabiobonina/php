
<template id="local-oss">
  <div>
    <section class="container">
      <div>
        <section class="container">
          <div>
            <os-grid :data="oss" :status="status"></os-grid>
          </div>
        </section>
        <local-add v-if="modalLocalAdd" v-on:close="modalLocalAdd = false" :data="loja" @atualizar="onAtualizar"></local-add>
      </div>
    </section>
  </div>
</template>
<script>
var LocalOss = Vue.extend({
  template: '#local-oss',
  name: 'local-oss',
  data: function () {
    return {
      modalLocalAdd: false,
      status: null
    };
  },
  created: function() {
    this.$store.dispatch('fetchLocais', this.$route.params._loja).then(() => {
      console.log("Buscando dados das locais!")
    });
  },
  mounted: function() {
    //this.modalLocalAdd = true;
  },
  computed: {
    loja()  {
      return store.getters.getLojaId(this.$route.params._loja);
    },
    oss()  {
      return store.getters.getOssLocal(this.$route.params._local);
    },
  }, // computed
  methods: {
    onAtualizar: function(){
      this.$store.dispatch('fetchLocais', this.$route.params._loja).then(() => {
        console.log("Buscando dados das locais!")
      });
    }
  },
});
</script>