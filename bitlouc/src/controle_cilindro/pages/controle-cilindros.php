<template id="controle-cilindros">
  <div>
    <top></top>    
    <router-view></router-view>    
  </div>
</template>

<script>
  var ControleCilindros = Vue.extend({
    template: '#controle-cilindros',
    data: function () {
      return {

      };
    },
    created() {
      this.$store.dispatch("fetchCilindros").then(() => {
        console.log("Buscando cadastro de cilindros!")
      });
    },
    computed: {
      osLojas() {
          //return store.state.osLojas;
      },
    },
    methods: {
        
    }
  });

</script>

<?php require_once 'src/components/controle_cilindros/index.php';?>
<?php require_once 'src/components/controle_cilindros/programacao/show.php';?>
<?php require_once 'src/components/gerencial/proprietario-top.php';?>



