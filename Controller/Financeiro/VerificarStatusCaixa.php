<?php 
session_start();
require_once "../../Model/Conexao.php";
require_once "../../Model/Financas.php";

$obj = new financas();
$data = $_POST["data"];

echo json_encode($obj -> verificarStatusCaixa($data));
?>