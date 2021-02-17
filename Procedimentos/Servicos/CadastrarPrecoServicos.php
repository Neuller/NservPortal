<?php 
session_start();

require_once "../../Classes/Conexao.php";
require_once "../../Classes/Servicos.php";

$obj = new servicos();

$dados = array(
$_POST['descricao'] = strtoupper($_POST['descricao']),	
$_POST['garantia'] = strtoupper($_POST['garantia']),
$_POST['valor'] = strtoupper($_POST['valor'])
);

echo $obj -> cadastrarPrecoServicos($dados);
?>