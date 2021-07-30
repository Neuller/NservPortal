<?php 
session_start();
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Financas.php";

$obj = new financas();

$dados = array(		
$_POST['grupoTipo'] = strtoupper($_POST['grupoTipo']),    
$_POST['descricao'] = strtoupper($_POST['descricao']),
$_POST['referencia'] = strtoupper($_POST['referencia']),
$_POST['dataVencimento'] = strtoupper($_POST['dataVencimento']),
$_POST['valor'] = strtoupper($_POST['valor']),
);

echo $obj->contasAPagar($dados);
?>