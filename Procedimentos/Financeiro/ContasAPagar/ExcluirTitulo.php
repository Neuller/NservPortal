<?php 
require_once "../../../Classes/Conexao.php";
require_once "../../../Classes/Financas.php";

$id = $_POST['idTitulo'];

$obj = new financas();

echo $obj -> excluirTitulo($id);

?>