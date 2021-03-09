<?php 
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Produtos.php";

$obj = new produtos();

$dados = array(
$_POST['idProduto'],
$_POST['codigoU'] = strtoupper($_POST['codigoU']),
$_POST['descricaoU'] = strtoupper($_POST['descricaoU']),
$_POST['garantiaU'] = strtoupper($_POST['garantiaU']),
$_POST['precoU'] = strtoupper($_POST['precoU']),
$_POST['precoInstalacaoU'] = strtoupper($_POST['precoInstalacaoU']),
$_POST['estoqueU'] = strtoupper($_POST['estoqueU']),
$_POST['nfU'] = strtoupper($_POST['nfU']),
$_POST['ncmU'] = strtoupper($_POST['ncmU'])
);

echo $obj-> editarProduto($dados);
?>