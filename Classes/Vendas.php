<?php 
class vendas{
    public function CadastrarVendas($dados) {
        $c = new conectar();
        $conexao = $c -> conexao();
        $data = date('Y-m-d');
        $idVenda = self :: criarComprovante();
        $carrinho = $_SESSION['vendasTemp'];
        $idUsuario = $_SESSION['IDUser'];
        $r = 0;

        for ($i = 0; $i < count($carrinho); $i++) { 
            $c = explode("||", $carrinho[$i]);

            $sql="INSERT INTO vendas (id_venda, id_cliente, id_produto, id_usuario, total, data_venda, valor_total, forma_pagamento, 
            valor_pagamento, desconto, troco, saldo_devedor, observacao, quantidade, valor_unitario)
            VALUES ('$idVenda', '$c[7]', '$c[0]', '$idUsuario', '$c[6]', '$data', '$dados[6]', '$dados[0]', '$dados[2]', '$dados[3]', 
            '$dados[4]', '$dados[5]', '$dados[7]', '$c[5]', '$c[2]')";

            $r = $r + $result=mysqli_query($conexao, $sql);
        }
        
        $sql = "SELECT max(id_venda) FROM vendas";

        $result = mysqli_query($conexao, $sql);
        $ultimoID = mysqli_fetch_row($result)[0];

        return $ultimoID;
    }
    
    public function criarComprovante(){
        $c = new conectar();
        $conexao = $c -> conexao();

        $sql="SELECT id_venda from vendas group by id_venda desc";

        $resul = mysqli_query($conexao, $sql);
        $id = mysqli_fetch_row($resul)[0];

        if($id == "" or $id == null or $id == 0){
            return 1;
        }else{
            return $id + 1;
        }
    }
}
?>