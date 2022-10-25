<?php 
session_start();

require_once "../../Model/Conexao.php";
require_once "../../Model/Servicos.php";

$obj = new servicos();

echo json_encode($obj -> obterDadosServicos($_POST['idServico']));
?>