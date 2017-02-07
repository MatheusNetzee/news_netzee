<?php require_once("alerta.php");
	require_once("bancoNoticias.php");

	$id = $_POST['id'];
	removeNoticias($conexao, $id);
	$_SESSION["success"] = "Noticia removida com sucesso.";
	header("Location: listagemNoticias.php");
	die();

	