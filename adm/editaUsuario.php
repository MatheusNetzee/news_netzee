<?php require_once("alerta.php");
	require_once("bancoUsuario.php");

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

if(alteraUsuario($conexao, $id, $nome, $email, $senha)){
	$_SESSION["success"] = "O usuario $nome foi alterado com sucesso.";
	header("Location: alteraUsuario.php");
	die();
	} else {
	$_SESSION["danger"] = "O usuario $nome não foi alterado.";
	header("Location : alteraUsuario.php");
	die();
}







