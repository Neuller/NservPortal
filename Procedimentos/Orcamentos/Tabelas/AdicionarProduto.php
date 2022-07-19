<?php
session_start();
require_once "../../../Classes/Conexao.php";

$c = new conectar();
$conexao = $c -> conexao();

$idCliente = $_POST['clienteSelect'];
$idProduto = $_POST['produtoSelect'];
$quantidade = $_POST['quantidade'];
$preco = $_POST['precoView'];

$sql = "SELECT nome FROM clientes WHERE id_cliente = '$idCliente'";

$result = mysqli_query($conexao, $sql);
$nomeCliente = mysqli_fetch_row($result)[0];

$sql = "SELECT descricao FROM produtos WHERE id_produto = '$idProduto'";

$result = mysqli_query($conexao, $sql);
$descricao = mysqli_fetch_row($result)[0];

$produto = $idProduto . "||" .
	$descricao . "||" .
	$preco . "||" .
	$nomeCliente . "||" .
	$quantidade . "||" .
	$idCliente;

$_SESSION['viewProdutosTemp'][] = $produto;
