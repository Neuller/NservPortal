<?php 
require_once "../../Model/Conexao.php";
require_once "../../Model/Produtos.php";

$idProduto = $_POST['idProduto'];

$obj = new produtos();

echo $obj->excluirProduto($idProduto);
?>