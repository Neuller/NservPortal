<?php 
require_once "../../Model/Conexao.php";
require_once "../../Model/Tecnicos.php";

$id = $_POST['idTecnicos'];

$obj = new tecnicos();

echo $obj->excluirTecnicos($id);
?>