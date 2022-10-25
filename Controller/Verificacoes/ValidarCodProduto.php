<?php
require_once "../../Model/Conexao.php";
$c = new conectar();
$conexao = $c -> conexao();

$codigo = $_POST['codProduto'];

if(isset($codigo)){
    // 0 SIGNIFICA NAO CADASTRADO
    // 1 SIGNIFICA CADASTRADO
    if(($codigo != 0) && ($codigo != null) && ($codigo != "")){
        $sql = "SELECT * FROM produtos WHERE codigo = '{$codigo}'";
        $result = mysqli_query($conexao, $sql) or print mysql_error();
        if(mysqli_num_rows($result) > 0){
            echo json_encode(1);
        }else{ 
            echo json_encode(0); 
        }
    }
}
?>