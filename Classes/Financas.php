<?php 
class financas{
    public function AbrirCaixa($dados) {
        $c = new conectar();
        $conexao = $c -> conexao();

        $idUsuario = $_SESSION['IDUser'];

        $sql = "INSERT into fluxo_caixa (id_usuario_entrada, qtd_notas_entrada, valor_total_notas_entrada, qtd_moedas_entrada, 
        valor_total_moedas_entrada, data_referencia, valor_total_inicial, status) 
        VALUES ('$idUsuario','$dados[0]', '$dados[1]','$dados[2]', '$dados[3]', '$dados[4]', '$dados[5]', 'ABERTO')";
        
        return mysqli_query($conexao, $sql);
    }

    public function FecharCaixa($dados) {
        $c = new conectar();
        $conexao = $c -> conexao();

        $idUsuario = $_SESSION['IDUser'];

        $sql = "UPDATE fluxo_caixa 
        SET qtd_notas_saida = '$dados[0]', valor_total_notas_saida = '$dados[1]', qtd_moedas_saida = '$dados[2]', 
        valor_total_moedas_saida = '$dados[3]', valor_total_final = '$dados[7]', id_usuario_saida = '$idUsuario', status = 'FECHADO', 
        retirada = '$dados[6]', caixa_final = '$dados[5]', xerox_impressoes = '$dados[8]', acessos = '$dados[9]'
        WHERE data_referencia = '$dados[4]'";
        
        return mysqli_query($conexao, $sql);
    }

    public function verificarStatusCaixa($data) {
        $c = new conectar();
        $conexao = $c -> conexao();

        $sql = "SELECT status 
        FROM fluxo_caixa 
        WHERE data_referencia = '$data'";
        
        $result = mysqli_query($conexao, $sql);
        $mostrar = mysqli_fetch_row($result);

        return $mostrar[0];
    }

    // CONTAS A PAGAR
    public function CadastrarContasAPagar($dados) {
        $c = new conectar();
        $conexao = $c -> conexao();

        $idUsuario = $_SESSION['IDUser'];

        $sql = "INSERT into contas_a_pagar (id_usuario, tipo, descricao, referencia, data_vencimento, valor, status) 
        VALUES ('$idUsuario', '$dados[0]', '$dados[1]', '$dados[2]', '$dados[3]', '$dados[4]', 'PENDENTE')";
        
        return mysqli_query($conexao, $sql);
    }

    public function excluirTitulo($idTitulo){
		$c = new conectar();
		$conexao = $c -> conexao();
	
		$sql = "DELETE from contas_a_pagar WHERE id_contas_a_pagar = '$idTitulo' ";
	
		return mysqli_query($conexao, $sql);
	}
    
}
?>