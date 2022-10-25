<?php 
require_once "../../Model/Conexao.php";
require_once "../../Model/Clientes.php";

$id = $_POST["idCliente"];

$obj = new clientes();

echo $obj -> excluirCliente($id);
?>