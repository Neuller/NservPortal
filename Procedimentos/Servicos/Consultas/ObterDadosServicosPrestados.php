<?php 
session_start();

require_once "../../../Classes/Conexao.php";
require_once "../../../Classes/Servicos.php";

$obj = new servicos();

echo json_encode($obj -> obterDadosPrecoServicos($_POST['servicoSelect']));
?>