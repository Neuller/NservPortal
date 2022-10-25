<?php

session_start();
require_once "../../Model/Conexao.php";
require_once "../../Model/Tecnicos.php";

$obj = new tecnicos();

echo json_encode($obj->obterDadosTecnicos($_POST['idTecnicos']));
?>