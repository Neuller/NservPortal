<?php 
require_once "../../Model/Conexao.php";
require_once "../../Model/Produtos.php";

$obj = new produtos();

echo json_encode($obj->obterDadosProdutos($_POST['idProduto']));
?>