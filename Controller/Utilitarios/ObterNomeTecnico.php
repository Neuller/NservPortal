<?php 
session_start();

require_once "../../Model/Conexao.php";
require_once "../../Model/Utilitarios.php";

$obj = new utilitarios();

echo json_encode($obj->nomeTecnico($_POST['idTecnico']));
?>