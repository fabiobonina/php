<template id="lojas">
  <div>

    <top></top>
    <v-content>
      <v-container fluid>        
        <grid-lojas :data="lojas"></grid-lojas>
      </v-container>
    </v-content>
    <rodape></rodape>

  </div>
</template>

<?php require_once 'src/components/includes/top.php';?>
<?php require_once 'src/components/includes/rodape.php';?>
<?php require_once 'src/components/loja/lojas-grid.php';?>

<script>
  var Lojas = Vue.extend({
    template: '#lojas',
    data: function () {
      return {
        errorMessage: '',
        successMessage: '',
        active: '0',
        gridColumns: ['displayName', 'name'],
        search:'',
        modalLojaAdd: false
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
        return store.getters.getLojaAtivo();
        //return store.state.lojas;
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



