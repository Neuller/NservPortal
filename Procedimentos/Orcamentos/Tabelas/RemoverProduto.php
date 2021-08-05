<?php 
	session_start();
	$index = $_POST['index'];
	unset($_SESSION['viewProdutosTemp'][$index]);
	$dados = array_values($_SESSION['viewProdutosTemp']);
	unset($_SESSION['viewProdutosTemp']);
	$_SESSION['viewProdutosTemp'] = $dados;
?>