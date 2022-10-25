<?php
session_start();
require_once "../../Model/Conexao.php";

$c = new conectar();
$conexao = $c -> conexao();

$idServico = $_POST["servicoSelect"];
$qtd = $_POST["qtdServico"];
$valorUn = $_POST["precoServico"];

$sql = "SELECT id_preco_servico, descricao, garantia, valor FROM preco_servicos WHERE id_preco_servico = '$idServico'";

$result = mysqli_query($conexao, $sql);
$descricao = mysqli_fetch_row($result)[1];

$servico = $idServico . "||" .
	$descricao . "||" .
	$qtd . "||" .
	$valorUn;

$_SESSION["servicosTemp"][] = $servico;

?>
