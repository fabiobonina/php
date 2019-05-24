<template id="controle-cilindros">
  <div>
    <top></top>
    <!--oss-top></oss-top-->
    
        <router-view></router-view>
    
    
  </div>
</template>

<script>
  var ControleCilindros = Vue.extend({
    template: '#controle-cilindros',
    data: function () {
        return {
            errorMessage: '',
            successMessage: '',
        };
    },
    created() {
      this.$store.dispatch("fetchCilindros").then(() => {
        console.log("Buscando cadastro de cilindros!")
      });
    },
    computed: {
        osLojas() {
            return this.$store.state.osLojas;
        },
    },
    methods: {
        
    }
  });

</script>

<?php require_once 'src/components/includes/top.php';?>
<?php require_once 'src/components/includes/rodape.php';?>
<?php require_once 'src/components/controle_cilindros/index.php';?>
<?php require_once 'src/components/controle_cilindros/programacao/show.php';?>
<?php require_once 'src/components/gerencial/proprietario-top.php';?>



