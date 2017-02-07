<?php require_once("alerta.php");
	require_once("bancoUsuario.php");

	$id = $_POST['id'];
	removeUsuario($conexao, $id);
	$_SESSION["success"] = "Usuario removido com sucesso.";
	header("Location: listagemUsuario.php");
	die();

