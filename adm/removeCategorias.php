<?php require_once("alerta.php");
	require_once("bancoCategorias.php");

	$id = $_POST['id'];
	removeCategorias($conexao, $id);
	$_SESSION["success"] = "Categoria removida com sucesso.";
	header("Location: listagemCategorias.php");
	die();