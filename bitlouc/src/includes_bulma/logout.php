<?php
if(isset($_REQUEST['sair'])){	
	session_destroy();
	session_unset($_SESSION['loginUser']);
	session_unset($_SESSION['loginEmail']);
	session_unset($_SESSION['loginProprietario']);
	session_unset($_SESSION['loginNivel']);
	session_unset($_SESSION['loginGrupo']);
	session_unset($_SESSION['loginLoja']);
	session_unset($_SESSION['loginName']);
	session_unset($_SESSION['loginAvatar']);
	header("Location: login.php");
}
?>