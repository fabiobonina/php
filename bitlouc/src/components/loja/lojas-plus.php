<template id="lojas-plus">
  <div>
    <grid-lojas :data="lojas"></grid-lojas>
  </div>
</template>

<?php require_once 'src/components/loja/lojas-grid.php';?>

<script>
  var LojasPlus = Vue.extend({
    template: '#lojas-plus',
    data: function () {
      return {
        errorMessage: '',
        successMessage: '',
        active: '0',
        search:'',
      };
    },
    created() {
    },
    computed: {
      user()  {
        return store.state.user;
      },
      proprietario() {
        return store.state.proprietario;
      },
      osProprietario() {
        return store.state.osProprietario;
      },
      lojas() {
        //return store.getters.getLojaAtivo();
        return store.state.lojas;
      },
    },
    methods: {
      onAtualizar: function(){
        this.$store.dispatch('fetchLocais', this.$route.params._id).then(() => {
          console.log("Buscando dados das locais!")
        });
      }
    }
  });
  
</script>



