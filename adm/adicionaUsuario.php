<?php require_once("alerta.php");
	require_once("bancoUsuario.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

if(adicionaUsuario($conexao,$nome,$email,$senha)){ 
	$_SESSION["success"] = "O usuario $email foi adicionado.";
	header("Location: cadastroUsuario.php");			
	die();
	} else {
		$_SESSION["danger"] = "O usuario $email não foi adicionado";
		header("Location: cadastroUsuario.php");
		die();
}



