<template id="home">
    <div>
        <top></top>
        <v-content>
            <v-container fluid fill-height>
              <router-view></router-view>
            </v-container>
        </v-content>
        <rodape></rodape>
    </div>
</template>

<?php require_once 'src/pages/dashboard.php';?>
<?php require_once 'src/components/includes/top.php';?>
<?php require_once 'src/components/includes/rodape.php';?>
<?php require_once 'src/components/includes/isLogin.php';?>
<?php require_once 'src/components/includes/login.php';?>
<?php require_once 'src/components/includes/registrar.php';?>

<script src="src/pages/home.js"></script>