<?php require_once("adm/conexaoBanco.php");

 	$nome = $_POST['nome'];
 	$email = $_POST['email'];
 	$comentario = $_POST['mensagem'];
  	$telefone = $_POST['telefone'];
  	$status = 'I';
 	$noticia_id = $_POST['noticia_id'];
	$id = $_POST['id_categoria'];
	$categoriaAnterior = $_POST['categoria'];

	$query = "insert into comentarios (nome, email, comentario, telefone, estado, noticia_id) values ('{$nome}' , '{$email}' , '{$comentario}' , '{$telefone}', '{$status}' , '{$noticia_id}')" ;

	$resultado = mysqli_query($conexao, $query);

 	if(isset($resultado)){
 		header("Location: noticia.php?id=$noticia_id&categoria=$categoriaAnterior&id_categoria=$id");
 		die();

 	} else {
 		header("Location: noticia.php?id=$noticia_id&categoria=$categoriaAnterior&id_categoria=$id");
 		die();
 	}

