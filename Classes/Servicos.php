<?php 
class servicos{
	public function CadastrarServicos($dados){
		$c = new conectar();
		$conexao = $c -> conexao();
		$r = 0;

		$data = date('Y-m-d');

		$sql = "INSERT INTO servicos (id_cliente, id_usuario, tipo_equipamento, equipamento, observacao, serial_number, data_cadastro, status, ordem_servico, itens_cliente_fonte, taxa_servico_autorizado) 
		VALUES ('$dados[0]', '$dados[1]', '$dados[3]', '$dados[4]', '$dados[5]', '$dados[6]', '$data', '$dados[2]', '$dados[7]', '$dados[8]', '$dados[9]')";

		mysqli_query($conexao, $sql);

		$sql = "SELECT max(id_servico) FROM servicos";

        $result = mysqli_query($conexao, $sql);

		$ultimoId = $r + mysqli_fetch_row($result)[0];
        
		return $ultimoId;
	}
	
	public function obterDadosServicos($idServico){
		$c = new conectar();
		$conexao = $c -> conexao();

		$sql = "SELECT id_servico, id_cliente, id_usuario, ordem_servico, 
		equipamento, observacao, servico_realizado, id_tecnico, serial_number, garantia, valor_total, 
		valor_terceiro, data_cadastro, data_saida, diagnostico, nf_emitida, status, data_comunicado
		FROM servicos WHERE id_servico = '$idServico'";

		$result = mysqli_query($conexao, $sql);
		$mostrar = mysqli_fetch_row($result);

		$dados = array(
			'id_servico' => $mostrar[0],
			'id_cliente' => $mostrar[1],
			'id_usuario' => $mostrar[2],
			'ordem_servico' => $mostrar[3],
			'equipamento' => $mostrar[4],
			'observacao' => $mostrar[5],
			'servico_realizado' => $mostrar[6],
			'id_tecnico' => $mostrar[7],
			'serial_number' => $mostrar[8],
			'garantia' => $mostrar[9],
			'valor_total' => $mostrar[10],
			'valor_terceiro' => $mostrar[11],
			'data_cadastro' => $mostrar[12],
			'data_saida' => $mostrar[13],
			'diagnostico' => $mostrar[14],
			'nf_emitida' => $mostrar[15],
			'status' => $mostrar[16],
			'data_comunicado' => $mostrar[17]
		);

		return $dados;
	}

	public function obterDadosPrecoServicos($id){
		$c = new conectar();
		$conexao = $c -> conexao();

		$sql = "SELECT id_preco_servico, descricao, garantia, valor
		FROM preco_servicos WHERE id_preco_servico = '$id'";

		$result = mysqli_query($conexao, $sql);
		$mostrar = mysqli_fetch_row($result);

		$dados = array(
			'id_preco_servico' => $mostrar[0],
			'descricao' => $mostrar[1],
			'garantia' => $mostrar[2],
			'valor' => $mostrar[3]
		);

		return $dados;
	}

	public function editarServicos($dados){
		$c = new conectar();
		$conexao = $c -> conexao();

		$sql = "UPDATE servicos SET servico_realizado = '$dados[2]', observacao = '$dados[5]', id_tecnico = '$dados[3]', 
		ordem_servico = '$dados[4]', garantia = '$dados[6]', valor_terceiro = '$dados[7]', valor_total = '$dados[8]', 
		data_saida = '$dados[9]', diagnostico = '$dados[10]', nf_emitida = '$dados[11]', status = '$dados[1]'
		WHERE id_servico = '$dados[0]'";

		echo mysqli_query($conexao, $sql);
	}

	public function cadastrarPrecoServicos($dados){
		$c = new conectar();
		$conexao = $c -> conexao();
		
		$sql = "INSERT into preco_servicos (descricao, garantia, valor) 
		VALUES ('$dados[0]','$dados[1]', '$dados[2]')";
		
		return mysqli_query($conexao, $sql);
	}

	public function excluirPrecoServicos($id){
		$c = new conectar();
		$conexao = $c -> conexao();
	
		$sql = "DELETE from preco_servicos WHERE id_preco_servico = '$id' ";
	
		return mysqli_query($conexao, $sql);
	}

	public function nomeCliente($idCliente){
		$c = new conectar();
		$conexao = $c -> conexao();

		$sql="SELECT nome 
		FROM clientes WHERE id_cliente = '$idCliente'";

		$result = mysqli_query($conexao, $sql);
		$ver = mysqli_fetch_row($result);

		return $ver[0];
	}
}
?>