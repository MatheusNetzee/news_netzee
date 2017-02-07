<?php require_once("alerta.php");
	require_once("bancoComentarios.php");

if(isset($_GET['id'])){
	$id = $_GET['id'];
}
else{
	$id = 'default'; 
}
        
    $comentario =  buscaComentario($conexao, $id);
	$statusAtual = $comentario['estado'];
	$nomeAtual = $comentario['nome'];

	if($statusAtual == "A"){
		alteraStatusInativo($conexao, $id);
		$_SESSION["success"] = "Comentário de $nomeAtual foi alterado para Inativo ";
		header("Location: listagemComentarios.php");
		die();

	} else if ($statusAtual == "I"){
		alteraStatusAtivo($conexao, $id);
		$_SESSION["success"] = "Comentário de $nomeAtual foi alterado para Ativo ";
		header("Location: listagemComentarios.php");
		die();
	}