<?php require_once("alerta.php");
	require_once("bancoCategorias.php");

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];

if(adicionaCategorias($conexao, $nome, $descricao)){
	$_SESSION["success"] = "A categoria $nome foi adicionada.";
	header("Location: cadastroCategorias.php");
	die();
	} else {
		$_SESSION["danger"] = "A categoria $nome não foi adicionada.";
		header("Location: cadastroCategorias.php");
		die();
}
