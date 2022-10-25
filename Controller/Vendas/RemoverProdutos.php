<?php 
	session_start();
	$index = $_POST['index'];
	unset($_SESSION['vendasTemp'][$index]);
	$dados = array_values($_SESSION['vendasTemp']);
	unset($_SESSION['vendasTemp']);
	$_SESSION['vendasTemp'] = $dados;
?>