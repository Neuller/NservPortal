<?php 
session_start();
require_once "../../../Model/Conexao.php";
require_once "../../../Model/Financas.php";

$obj = new financas();

$dados = array(		
$_POST['tipo'] = strtoupper($_POST['tipo']),    
$_POST['descricao'] = strtoupper($_POST['descricao']),
$_POST['referencia'] = strtoupper($_POST['referencia']),
$_POST['dataVencimento'] = strtoupper($_POST['dataVencimento']),
$_POST['valor'] = strtoupper($_POST['valor'])
);

echo $obj -> CadastrarContasAPagar($dados);
?>