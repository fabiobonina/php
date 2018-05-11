
<template id="oss">
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
<script src="src/pages/oss.js"></script>

<?php require_once 'src/components/includes/top.php';?>
<?php require_once 'src/components/includes/rodape.php';?>

<?php require_once 'src/components/os/osLojas.php';?>
<?php require_once 'src/components/os/osStus.php';?>
<?php require_once 'src/components/os/osTec.php';?>
