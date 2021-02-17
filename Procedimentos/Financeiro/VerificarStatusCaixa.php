<?php 
session_start();
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Financas.php";

$obj = new financas();
$data = $_POST["data"];

echo json_encode($obj -> verificarStatusCaixa($data));
?>