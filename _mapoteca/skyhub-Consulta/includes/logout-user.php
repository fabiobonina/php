<?php
if(isset($_REQUEST['sair'])){	
	session_destroy();
	session_unset($_SESSION['loginUser']);
	session_unset($_SESSION['loginSenha']);
	session_unset($_SESSION['loginNivel']);
	//session_unset($_SESSION['loginNome']);
	header("Location: login.php");	
}
?>