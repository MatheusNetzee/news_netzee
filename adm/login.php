<?php require_once("alerta.php");
	require_once("conexaoBanco.php");
	require_once("bancoUsuario.php");


	$email = $_POST['email'];
	$senha = $_POST['senha'];


	$usuario = buscaUsuario($conexao,$email,$senha);

		
	if ($usuario == null) {		
		header("Location: index.php");
		$_SESSION["danger"] = "Usuário ou senha inválidos.";		
	} else {		
		$_SESSION["success"] = "Usuário logado com sucesso.";
		$_SESSION["usuario"] = $email;
		header("Location: home.php");
	}

?>
