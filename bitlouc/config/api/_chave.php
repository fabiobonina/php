<?php
    ob_start();
    session_start();

    // login
    if(!isset($_SESSION['loginUser']) && (!isset($_SESSION['loginNivel']))){
    header("Location: ../../login.php");exit;
    }

    //include("admin/conexao/conecta.php");
    //include("../../src/includes/logout.php");

    $userUser = $_SESSION['loginUser'];
    $userEmail = $_SESSION['loginEmail'];
    $userProprietario = $_SESSION['loginProprietario'];
    $userNivel = $_SESSION['loginNivel'];
    $userGrupo = $_SESSION['loginGrupo'];
    $userLoja = $_SESSION['loginLoja'];

?>