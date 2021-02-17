<?php 
require_once "../../Classes/Conexao.php";

$c = new conectar();
$conexao = $c -> conexao();

$sql="SELECT ordem_servico from servicos group by id_servico desc";

$resul = mysqli_query($conexao, $sql);
$id = mysqli_fetch_row($resul)[0];

if($id == "" or $id == null or $id == 0){
    echo json_encode(1);
}else{
    echo json_encode($id + 1);
}
?>
