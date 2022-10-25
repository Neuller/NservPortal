<?php 
require_once "../../Model/Conexao.php";
require_once "../../Model/Status.php";

$id = $_POST['idstatus'];

$obj = new status();

echo $obj->excluirStatus($id);
?>