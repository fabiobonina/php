<template id="home">
    <div>
        <top></top>
        <v-content>
            <v-container fluid>
              <router-view></router-view>
            </v-container>
        </v-content>
        <rodape></rodape>
    </div>
</template>
<script>
    var Home = Vue.extend({
    template: '#home',
    data: function () {
      return {
        errorMessage: '',
        successMessage: '',
  
      };
    },
    created() {
      this.$store.dispatch("fetchIndex").then(() => {
        console.log("Buscando dados para inicial!")
      });
    },
    computed: {
      user() {
        return store.state.user;
      },
      proprietario() {
        return store.state.proprietario;
      },
      osProprietario() {
        return store.state.osProprietario;
      },
      lojas() {
        return store.state.lojas;
      },
    },
    methods: {
    }
  });

</script>

<?php require_once 'src/pages/dashboard.php';?>

<?php require_once 'src/components/includes/top.php';?>
<?php require_once 'src/components/includes/rodape.php';?>


