<?php
    date_default_timezone_set('America/Recife');
    ob_start();
    session_start();
    //require_once '../model/Usuarios.php';

    require_once '../../control/geral/userControl.php';
    
    //$usuarios       = new Usuarios();
    $userControl    = new UserControl();
    # login
    
    //$_POST = (array) json_decode(file_get_contents('php://input'), true);
    $token ='';
    if(isset($_POST['token'])){
        $token = $_POST['token'];
    }
    
    if( isset($_SESSION['loginUser']) && isset($_SESSION['loginNivel']) ){
        $user = array();
        $user['id']             = $_SESSION['loginId'];
        $user['name']           = $_SESSION['loginName'];
        $user['email']          = $_SESSION['loginEmail'];
        $user['user']           = $_SESSION['loginUser'];
        $user['uf']             = $_SESSION['loginUf'];
        $user['token']          = $_SESSION['loginToken'];
        $user['avatar']         = $_SESSION['loginAvatar'];
        $user['proprietario']   = $_SESSION['loginProprietario'];
        $user['grupo']          = $_SESSION['loginGrupo'];
        $user['loja']           = $_SESSION['loginLoja'];
        $user['nivel']          = $_SESSION['loginNivel'];
        $user['data']           = $_SESSION['loginDtCadastro'];
		$user['isLoggedIn']     = true;
        $user['error']          = false;

    }elseif( isset($token) ){
        $user = $userControl->isLoggedIn( $token );
        $user = $user;
    }else{
        //header("Location: ../../login.php");exit;
    }

?>