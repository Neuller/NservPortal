<?php 
require_once "../../Model/Conexao.php";
require_once "../../Model/Servicos.php";

$id = $_POST['id'];

$obj = new servicos();

echo $obj -> excluirPrecoServicos($id);

?>