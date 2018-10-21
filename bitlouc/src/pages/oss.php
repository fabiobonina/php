
<template id="oss">
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
  var Oss = Vue.extend({
    template: '#oss',
    data: function () {
        return {
            errorMessage: '',
            successMessage: '',
            active: '0',
            router: [
                { title: 'OS Lojas', router: '/oss', icon: 'store' },
                { title: 'OS Status', router: '/oss/os-status', icon: 'trending_up' },
                { title: 'Minhas OS', router: '/oss/os-tec', icon: 'person' },
            ],
        };
    },
    created() {
    },
    computed: {
        osLojas() {
            return store.state.osLojas;
        },
    },
    methods: {
        
    }
});

</script>

<?php require_once 'src/components/includes/top.php';?>
<?php require_once 'src/components/includes/rodape.php';?>

<?php require_once 'src/components/os/osUF.php';?>
<?php require_once 'src/components/os/osLojas.php';?>
<?php require_once 'src/components/os/osStus.php';?>
<?php require_once 'src/components/os/tecOs.php';?>

<!-- components os -->
<?php require_once 'src/components/os/os.php';?>
<?php require_once 'src/components/os/os-grid.php';?>
<?php require_once 'src/components/os/localOss.php';?>
<!-- /components os -->
