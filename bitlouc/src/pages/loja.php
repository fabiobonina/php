<template id="loja">
  <div>

    <top></top>
    <v-content>
      <loja-top></loja-top>
      <v-container fluid>
        <router-view></router-view>
      </v-container>
    </v-content>
    <rodape></rodape>

  </div>
</template>

<script>
  var Loja = Vue.extend({
    template: '#loja',
    data: function () {
        return {
            errorMessage: '',
            successMessage: '',
            active: '0',
            router: [
                { title: 'Locais', router: '', icon: 'store' },
                { title: 'OSs', router: '/loja-locais', icon: 'trending_up' },
                { title: 'Bens', router: '/loja-bens', icon: 'person' },
            ],
            model: 'tab-2',
            text: 'Lorem ipsum dolor ',

        };
    },
    beforeMount() {

    },
    created: function() {
      this.$store.dispatch('fetchLocalLoja', this.$route.params._loja).then(() => {
        console.log("Buscando dados do local!")
      });
    },
    computed: {
      loja(){
        return store.getters.getLojaId(this.$route.params._loja);
      },
    },
    methods: {

    }
  });
</script>

<?php require_once 'src/components/includes/top.php';?>
<?php require_once 'src/components/includes/rodape.php';?>

<?php require_once 'src/components/loja/loja-top.php';?>
<?php require_once 'src/components/loja/_addLoja.php';?>
<?php require_once 'src/components/loja/_edtLoja.php';?>
<?php require_once 'src/components/loja/_delLoja.php';?>
<?php require_once 'src/components/loja/_catLoja.php';?>

<?php require_once 'src/components/loja/loja-oss.php';?>
<?php require_once 'src/components/local/locais-index.php';?>
<?php require_once 'src/components/atendimento/os/localOss.php';?>


