<?php 
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Servicos.php";

$id = $_POST['id'];

$obj = new servicos();

echo $obj -> excluirPrecoServicos($id);

?>