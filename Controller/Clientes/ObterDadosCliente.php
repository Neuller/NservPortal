<?php 
session_start();
require_once "../../Model/Conexao.php";
require_once "../../Model/Clientes.php";

$obj = new clientes();

echo json_encode($obj -> obterDadosCliente($_POST['idCliente']));
?>