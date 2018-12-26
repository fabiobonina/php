
<template id="ocorrencia">
  <div>
    <top></top>

    <v-content>
      <v-tabs v-model="active" color="blue" dark slider-color="yellow">
        <v-tab v-for="n in router" :key="n.title" :to="{path: n.router}" ripple> {{ n.title }} </v-tab>     
      </v-tabs>
      <v-container fluid>
        <router-view></router-view>
      </v-container>
    </v-content>

    <rodape></rodape>
  </div>    
</template>
<script>
  var Ocorrencia = Vue.extend({
    template: '#ocorrencia',
    data: function () {
        return {
            errorMessage: '',
            successMessage: '',
            active: '0',
            router: [
                { title: 'UF', router: '/ocorrencia', icon: 'store' },
                { title: 'OS Status', router: '/oss/os-status', icon: 'trending_up' },
                { title: 'Minhas OS', router: '/oss/os-tec', icon: 'person' },
            ],
        };
    },
    created() {
    },
    computed: {
    },
    methods: {
        
    }
});

</script>

<?php require_once 'src/components/includes/top.php';?>
<?php require_once 'src/components/includes/rodape.php';?>

<?php require_once 'src/components/atendimento/ocorrencia/uf.php';?>
<!--?php require_once 'src/components/atendimento/ocorrencia/osLojas.php';?-->
<?php require_once 'src/components/atendimento/ocorrencia/status.php';?>
<?php require_once 'src/components/atendimento/ocorrencia/tecOs.php';?>

<!-- components os -->
<?php require_once 'src/components/atendimento/ocorrencia/os.php';?>
<?php require_once 'src/components/atendimento/os/os-grid.php';?>
<?php require_once 'src/components/atendimento/os/localOss.php';?>
<!-- /components os -->
