<?php 
require_once "../../Model/Conexao.php";
require_once "../../Model/Usuarios.php";

$obj= new usuarios();

$dados=array(
$_POST['idUsuario'],  
$_POST['usuarioU'], 
$_POST['nomeU'],  
$_POST['emailU']
);  
	
echo $obj->atualizar($dados);
?>