<?php 
	session_start();
	$index = $_POST['index'];
	unset($_SESSION['servicosTemp'][$index]);
	$dados = array_values($_SESSION['servicosTemp']);
	unset($_SESSION['servicosTemp']);
	$_SESSION['servicosTemp'] = $dados;
?>