<?php 
require_once "../../Model/Conexao.php";
require_once "../../Model/Status.php";

$obj = new status();

$dados = array(
$_POST['idstatus'],
$_POST['descricaoU'],
);

echo $obj-> editarStatus($dados);
?>