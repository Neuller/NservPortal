<?php 
class usuarios{
	public function CadastrarUsuario($dados) {
		$c = new conectar();
		$conexao = $c -> conexao();

		$data = date("Y-m-d");
		$sql = "INSERT INTO usuarios (grupo_usuario, nome, usuario, email, senha, data_cadastro) 
		VALUES ('$dados[0]','$dados[1]', '$dados[2]', '$dados[3]', '$dados[4]', '$data')";

		return mysqli_query($conexao, $sql);
	}

	public function login($dados) {
		$c = new conectar();
		$conexao = $c -> conexao();

		$senha = sha1($dados[1]);

		$_SESSION["User"] = $dados[0];
		$_SESSION["id_usuario"] = self::obterID($dados);
		$_SESSION["grupo"] = self::obterGrupo($dados);
		$_SESSION["nome_usuario"] = self::obterNome($dados);

		$sql = "SELECT * 
		FROM usuarios 
		WHERE usuario = '$dados[0]' and senha = '$senha' ";

		$result = mysqli_query($conexao, $sql);

		if (mysqli_num_rows($result) > 0){
			return 1;
		}else{
			return 0;
		}
	}

	public function obterID($dados) {
		$c = new conectar();
		$conexao = $c -> conexao();

		$senha = sha1($dados[1]);

		$sql = "SELECT id_usuario 
		FROM usuarios
		WHERE usuario = '$dados[0]' AND senha = '$senha' ";

		$result = mysqli_query($conexao, $sql);

		return mysqli_fetch_row($result)[0];
	}

	public function obterGrupo($dados) {
		$c = new conectar();
		$conexao = $c -> conexao();

		$senha = sha1($dados[1]);

		$sql = "SELECT grupo_usuario 
		FROM usuarios
		WHERE usuario = '$dados[0]' AND senha = '$senha' ";

		$result = mysqli_query($conexao, $sql);

		return mysqli_fetch_row($result)[0];
	}

	public function obterNome($dados) {
		$c = new conectar();
		$conexao = $c -> conexao();

		$senha = sha1($dados[1]);

		$sql = "SELECT nome
		FROM usuarios
		WHERE usuario = '$dados[0]' AND senha = '$senha' ";

		$result = mysqli_query($conexao, $sql);

		return mysqli_fetch_row($result)[0];
	}

	public function obterDadosUsuario($idUsuario) {
		$c = new conectar();
		$conexao = $c -> conexao();

		$sql="SELECT id_usuario, grupo_usuario, nome, usuario, email
		FROM usuarios 
		WHERE id_usuario = '$idUsuario'";

		$result = mysqli_query($conexao,$sql);
		$mostrar = mysqli_fetch_row($result);

		$dados = array(
		"id" => $mostrar[0],
		"grupo" => $mostrar[1],
		"nome" => $mostrar[2],
		"login" => $mostrar[3],
		"email" => $mostrar[3]
		);

		return $dados;
	}

	public function atualizar($dados) {
		$c = new conectar();
		$conexao=$c->conexao();

		$sql=" UPDATE usuarios 
		SET usuario ='$dados[1]',
		nome ='$dados[2]', 
		email ='$dados[3]' 
		WHERE ID ='$dados[0]' ";

		return mysqli_query($conexao,$sql);	
	}

	public function excluir($idusuario){
		$c = new conectar();
		$conexao=$c->conexao();

		$sql="DELETE FROM usuarios 
		WHERE ID='$idusuario'";

		return mysqli_query($conexao,$sql);
	}

}
?>
