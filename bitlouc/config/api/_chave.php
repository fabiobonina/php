<?php
    ob_start();
    session_start();

    // login
    if(!isset($_SESSION['loginUser']) && (!isset($_SESSION['loginNivel']))){
    header("Location: ../../login.php");exit;
    }

    //include("admin/conexao/conecta.php");
    //include("../../src/includes/logout.php");
    $user = array();
    $user['id'] = $_SESSION['loginId'];
    $user['name'] = $_SESSION['loginName'];
    $user['email'] = $_SESSION['loginEmail'];
    $user['user'] = $_SESSION['loginUser'];
    $user['avatar'] = $_SESSION['loginAvatar'];
    $user['proprietario'] = $_SESSION['loginProprietario'];
    $user['grupo'] = $_SESSION['loginGrupo'];
    $user['loja'] = $_SESSION['loginLoja'];
    $user['nivel'] = $_SESSION['loginNivel'];
    $user['data'] = $_SESSION['loginDtCadastro'];


?>