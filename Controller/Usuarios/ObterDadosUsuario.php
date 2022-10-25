<?php
session_start();
require_once "../../Model/Conexao.php";
require_once "../../Model/Usuarios.php";

$c = new conectar();
$conexao = $c -> conexao();
$obj = new usuarios();

$idUsuario = $_SESSION["id_usuario"];

echo json_encode($obj -> obterDadosUsuario($idUsuario));
?>