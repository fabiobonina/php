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
<script src="src/pages/home.js"></script>

<?php require_once 'src/pages/dashboard.php';?>

<?php require_once 'src/components/includes/top.php';?>
<?php require_once 'src/components/includes/rodape.php';?>


