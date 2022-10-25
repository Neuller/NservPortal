<?php 
require_once "../../../Model/Conexao.php";
require_once "../../../Model/Financas.php";

$id = $_POST['idTitulo'];

$obj = new financas();

echo $obj -> excluirTitulo($id);

?>