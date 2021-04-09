<?php
session_start();
require_once "../../Classes/Conexao.php";

$c = new conectar();
$conexao = $c -> conexao();

$idServico = $_POST['servicoSelect'];

$sql = "SELECT descricao 
FROM preco_servicos
WHERE id_preco_servico = '$idServico'";

$result = mysqli_query($conexao, $sql);
$descricao = mysqli_fetch_row($result)[0];

$servico = $idServico . "||" .
	$descricao;

$_SESSION['servicosTemp'][] = $servico;

?>
