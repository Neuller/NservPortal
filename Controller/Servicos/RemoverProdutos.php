<?php 
	session_start();
	$index = $_POST["index"];
	unset($_SESSION["produtosTemp"][$index]);
	$dados = array_values($_SESSION["produtosTemp"]);
	unset($_SESSION["produtosTemp"]);
	$_SESSION["produtosTemp"] = $dados;
?>