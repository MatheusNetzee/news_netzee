<?php require_once("alerta.php");
	require_once("bancoCategorias.php");

$id = $_POST['id'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];


	if(alteraCategorias($conexao, $id , $nome, $descricao)){
		$_SESSION["success"] =  " A categoria $nome foi alterada com sucesso.";
		header("Location: alteraCategorias.php");
		die();
	}

	else {

		$_SESSION["danger"] = " A categoria $nome não foi alterada.";
		header("Location: alteraCategorias.php");
		die();
	}