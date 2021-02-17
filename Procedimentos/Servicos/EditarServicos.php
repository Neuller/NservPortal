<?php 
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Servicos.php";

$obj = new servicos();

$dados = array(
$_POST['idServico'], // 0
$_POST['selectStatusU'] = strtoupper($_POST['selectStatusU']), // 1
$_POST['servicoU'] = strtoupper($_POST['servicoU']), // 2
$_POST['tecnicoU'] = strtoupper($_POST['tecnicoU']), // 3
$_POST['ordemServicoU'] = strtoupper($_POST['ordemServicoU']), // 4
$_POST['informacaoU'] = strtoupper($_POST['informacaoU']), // 5
$_POST['garantiaU'] = strtoupper($_POST['garantiaU']), // 6
$_POST['valorTerceiroU'] = strtoupper($_POST['valorTerceiroU']), // 7
$_POST['precoU'] = strtoupper($_POST['precoU']), // 8
$_POST['dataSaidaU'] = strtoupper($_POST['dataSaidaU']), // 9
$_POST['diagnosticoU'] = strtoupper($_POST['diagnosticoU']), // 10 
$_POST['nfeEmitidaU'] = strtoupper($_POST['nfeEmitidaU']) // 11
);

echo $obj -> editarServicos($dados);
?>