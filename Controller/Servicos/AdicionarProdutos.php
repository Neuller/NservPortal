<?php
session_start();
require_once "../../Model/Conexao.php";

$c = new conectar();
$conexao = $c -> conexao();

$idProduto = $_POST["produtoSelect"];
$qtd = $_POST["qtdProduto"];
$valorUn = $_POST["precoProduto"];

$sql = "SELECT id_produto , descricao FROM produtos WHERE id_produto = '$idProduto'";

$result = mysqli_query($conexao, $sql);
$descricao = mysqli_fetch_row($result)[1];

$produto = $idProduto . "||" .
	$descricao . "||" .
	$qtd . "||" .
	$valorUn;

$_SESSION["produtosTemp"][] = $produto;

?>
