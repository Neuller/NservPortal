<?php 
require_once "../../Model/Conexao.php";
require_once "../../Model/Usuarios.php";

$obj= new usuarios;

echo $obj->excluir($_POST['idusuario']);
 ?>