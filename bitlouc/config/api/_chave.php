<?php
    date_default_timezone_set('America/Recife');
    ob_start();
    session_start();
    //require_once '../model/Usuarios.php';

    require_once '../control/user.control.php';
    
    //$usuarios       = new Usuarios();
    $userControl    = new UserControl();
    # login
    
    //$_POST = (array) json_decode(file_get_contents('php://input'), true);
    $token ='';
    if(isset($_POST['token'])){
        $token = $_POST['token'];
    }
    
    if( isset($_SESSION['user_user']) && isset($_SESSION['user_nivel']) ){
        $user = array();
        $user['id']             = $_SESSION['user_id'];
        $user['name']           = $_SESSION['user_name'];
        $user['email']          = $_SESSION['user_email'];
        $user['user']           = $_SESSION['user_user'];
        $user['uf']             = $_SESSION['user_uf'];
        $user['token']          = $_SESSION['user_token'];
        $user['avatar']         = $_SESSION['user_avatar'];
        $user['proprietario']   = $_SESSION['user_proprietario'];
        $user['grupo']          = $_SESSION['user_grupo'];
        $user['loja']           = $_SESSION['user_loja'];
        $user['nivel']          = $_SESSION['user_nivel'];
        $user['data']           = $_SESSION['user_dtCadastro'];
		$user['isLoggedIn']     = true;
        $user['error']          = false;

    }elseif( isset($token) ){
        $user = $userControl->isLoggedIn( $token );
        $user = $user;
    }

?>