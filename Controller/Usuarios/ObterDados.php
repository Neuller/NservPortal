<?php 
require_once "../../Model/Conexao.php";
require_once "../../Model/Usuarios.php";

$obj= new usuarios;

echo json_encode($obj->obterDados($_POST['idusuario']));
 ?>