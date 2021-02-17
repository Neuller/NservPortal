<?php
class utilitarios
{
	// CONVERTE DATA
	public function data($data)
	{
		return date("d/m/Y", strtotime($data));
	}
	// RETORNA NOME DO COLABORADOR
	public function nomeColaborador($id)
	{
		$c = new conectar();
		$conexao = $c -> conexao();

		$sql = "SELECT nome 
		FROM usuarios 
		WHERE id_usuario = '$id'";

		$resultado = mysqli_query($conexao, $sql);
		$mostrar = mysqli_fetch_row($resultado);

		return $mostrar[0];
	}
	// RETORNA NOME DO TECNICO
	public function nomeTecnico($idTecnico)
	{
		$c = new conectar();
		$conexao = $c->conexao();

		$sql = "SELECT nome FROM tecnicos WHERE id_tecnico = '$idTecnico'";

		$resultado = mysqli_query($conexao, $sql);
		$mostrar = mysqli_fetch_row($resultado);

		return $mostrar[0];
	}
	// RETORNA DADOS RESUMIDOS DO CLIENTE
	public function dadosResumidoCliente($idCliente)
	{
		$c = new conectar();
		$conexao = $c->conexao();

		$sql = "SELECT Nome, Telefone, Celular FROM clientes WHERE ID_Cliente = '$idCliente'";

		$resultado = mysqli_query($conexao, $sql);
		$mostrar = mysqli_fetch_row($resultado);

		return $mostrar;
	}
	// RETORNA CELULAR DE CLIENTE
	public function celularCliente($idCliente){
		$c = new conectar();
		$conexao = $c -> conexao();

		$sql="SELECT celular 
		FROM clientes WHERE id_cliente = '$idCliente'";

		$result = mysqli_query($conexao, $sql);

		$ver = mysqli_fetch_row($result);

		return $ver[0];
	}
	// RETORNA NOME DE CLIENTE
	public function nomeCliente($idCliente){
        $c = new conectar();
        $conexao = $c -> conexao();

        $sql="SELECT nome 
        FROM clientes WHERE id_cliente = '$idCliente'";

        $result = mysqli_query($conexao,$sql);
        $ver = mysqli_fetch_row($result);

        return $ver[0];
	}
	// RETORNA NOME DO USUARIO LOGADO
	public function nomeUsuario($idUsuario){
        $c = new conectar();
        $conexao = $c -> conexao();

        $sql = "SELECT nome FROM usuarios WHERE id_usuario = '$idUsuario'";

        $result = mysqli_query($conexao,$sql);
        $mostrar = mysqli_fetch_row($result);

        return $mostrar[0];
    }
}
