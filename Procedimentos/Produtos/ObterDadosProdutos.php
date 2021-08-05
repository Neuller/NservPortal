<?php 
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Produtos.php";

$obj = new produtos();

echo json_encode($obj->obterDadosProdutos($_POST['idProduto']));
?>