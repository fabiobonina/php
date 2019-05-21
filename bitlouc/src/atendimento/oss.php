
<template id="oss">
  <div>
    <top></top>
    <v-content>
      <v-tabs v-model="active" color="blue" dark slider-color="yellow">
        <v-tab v-for="n in router" :key="n.title" :to="{path: n.router}" ripple> {{ n.title }} </v-tab>     
      </v-tabs>
      <router-view></router-view>
    </v-content>
    <rodape></rodape>
  </div>    
</template>
<script>
  var Oss = Vue.extend({
    template: '#oss',
    data: function () {
        return {
            errorMessage: '',
            successMessage: '',
            active: '0',
            router: [
                { title: 'UF', router: '/oss', icon: 'store' },
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

<?php require_once 'src/components/os/uf.php';?>
<?php require_once 'src/components/os/ufList.php';?>
<!--?php require_once 'src/components/os/osLojas.php';?-->
<?php require_once 'src/components/os/status.php';?>
<?php require_once 'src/components/os/tecOs.php';?>

<!-- components os -->
<?php require_once 'src/components/os/atend-grid.php';?>
<?php require_once 'src/components/os/localOss.php';?>
<!-- /components os -->
