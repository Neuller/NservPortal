<?php 
session_start();

require_once "../../Classes/Conexao.php";
require_once "../../Classes/Servicos.php";

$idUsuario = $_SESSION['IDUser'];
$idCliente = $_POST['clienteSelect'];
$status = $_POST['StatusSelect'];
$chkFonte = 0;

if(isset($_POST['chkFonte']) == "SIM"){
    echo $chkFonte = 1;
}

$obj = new servicos();

$dados = array(
$idCliente,
$idUsuario,
$status,
$_POST['tipoEquipamento'] = strtoupper($_POST['tipoEquipamento']),	
$_POST['equipamento'] = strtoupper($_POST['equipamento']),	
$_POST['observacao'] = strtoupper($_POST['observacao']),
$_POST['serialNumber'] = strtoupper($_POST['serialNumber']),
$_POST['ordem'] = strtoupper($_POST['ordem']),
$chkFonte,
$_POST['taxaServicoAutorizado'] = strtoupper($_POST['taxaServicoAutorizado'])
);

echo $obj -> cadastrarServicos($dados);
?>