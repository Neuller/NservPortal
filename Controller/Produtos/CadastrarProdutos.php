<?php 
session_start();
require_once "../../Model/Conexao.php";
require_once "../../Model/Produtos.php";

$obj = new produtos();

$dados = array(
$_POST['codigo'] = strtoupper($_POST['codigo']),		
$_POST['categoria'] = strtoupper($_POST['categoria']),
$_POST['descricao'] = strtoupper($_POST['descricao']),
$_POST['garantia'] = strtoupper($_POST['garantia']),
$_POST['estoque'] = strtoupper($_POST['estoque']),
$_POST['preco'] = strtoupper($_POST['preco']),
$_POST['precoInstalacao'] = strtoupper($_POST['precoInstalacao']),		
$_POST['nf'] = strtoupper($_POST['nf']),	
$_POST['ncm'] = strtoupper($_POST['ncm'])
);

echo $obj -> CadastrarProdutos($dados);
?>