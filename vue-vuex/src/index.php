<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vue + Vuex - User Registration and Login Example & Tutorial</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" />
    
    <title>BitLOUC</title>
    <link href="dist/img/bit-louc.png" rel="icon" type="image/png">
    <!-- Tell the browser to be responsive to screen width -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <!-- MATERIALDESINGN ICO -->
    <link rel="stylesheet" type="text/css" href="./dist/css/materialdesign/css/materialdesignicons.min.css" media="all">
    <link rel="stylesheet" type="text/css" href="./dist/css/vuemaps.css">
    
    <link href="dist/vuetify/vuetify.min.css" rel="stylesheet">
    <!-- Vuejs -->
    <script src="dist/vue/vuejs/vue.js"></script>
    <script src="dist/vue/vuex.js"></script>
    <script src="dist/vue/vue-router.js"></script>
    <script src="dist/vue/vue-resource.js"></script>

    <!-- Axios -->
    <script src="dist/axios/axios.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.16.2/lodash.min.js"></script>
    <!-- Vuetify -->
    <script src="dist/vuetify/vuetify.min.js"></script>
    <!-- Vee-Validade -->
    <script src="dist/vee-validade/vee-validate.min.js"></script>
    <script src="dist/vee-validade/pt_BR.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/node-uuid/1.4.7/uuid.js"></script>

    <!-- Google Maps -->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDlfHdTSE_d9zwwYKs5gbL01mHElMLCFgE&libraries=places,geometry"></script>

    <!-- Chart -->
    <script src="https://unpkg.com/chart.js@2.7.2/dist/Chart.bundle.js"></script>
    <script src="https://unpkg.com/vue-chartkick@0.5.0"></script>

    <script src="//unpkg.com/vue-clipboards@1.0.5/dist/vue-clipboards.js"></script>
     
    <style>
        a { cursor: pointer; }
    </style>
</head>
<body>
    <div id="app"></div>

    <!-- credits -->
    <div class="text-center">
        <p>
            <a href="http://jasonwatmore.com/post/2018/07/14/vue-vuex-user-registration-and-login-tutorial-example" target="_top">Vue + Vuex - User Registration and Login Tutorial & Example</a>
        </p>
        <p>
            <a href="http://jasonwatmore.com" target="_top">JasonWatmore.com</a>
        </p>
    </div>

    <?php //require_once 'src/components/includes/config.php';?>
    <?php //require_once 'src/components/includes/loader.php';?>
    <?php //require_once 'src/components/includes/_copia.php';?>
    <?php //require_once 'src/pages/home.php';?>
    <?php //require_once 'src/pages/oss.php';?>
    <?php //require_once 'src/pages/os.php';?>
    <?php //require_once 'src/pages/lojas.php';?>
    <?php //require_once 'src/pages/loja.php';?>
    <?php //require_once 'src/pages/local.php';?>
    <?php //require_once 'src/pages/gerencial.php';?>
    <?php //require_once 'src/pages/os-gerencial.php';?>
    <?php //require_once 'src/pages/controle-cilindros.php';?>

    <?php //require_once 'src/components/includes/message.php';?>
</body>
</html>

<script src="src/_store/account.module.js"></script>
<script src="src/_store/alert.module.js"></script>
<script src="src/_store/users.module.js"></script>
<script src="src/_store/index.js"></script>
<script src="src/_helpers/router.js"></script>

<script src="src/_services/index.js"></script>
<script src="src/_services/user.service.js"></script>
<script src="src/_store/users.module.js"></script>
<script src="src/index.js"></script>
<script src="src/app/App.js"></script>