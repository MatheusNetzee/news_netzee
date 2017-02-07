<?php require_once("alerta.php");
	require_once("bancoComentarios.php");

	$id = $_POST['id'];
	removeComentario($conexao, $id);
	$_SESSION["success"] = "O comentario foi removido com sucesso";
	header("Location: listagemComentarios.php");
	die();