<?php require_once("conexaoBanco.php");

function listaComentarios($conexao){
	$comentarios = array();
	$resultado = mysqli_query($conexao, "select * from comentarios order by id desc");

	while($comentario = mysqli_fetch_assoc($resultado)){
		array_push($comentarios, $comentario);
	}

	return $comentarios;
}

// function adicionaComentarios($conexao, $nome , $email, $comentario, $telefone, $status, $noticia_id){
// 	$query = "insert into comentarios (nome, email, comentario, telefone, estado, noticia_id) values ('{$nome}' , '{$email}' , '{$comentario}' , '{$telefone}', '{$status}' , '{$noticia_id}')" ;
// 	$resultado = mysqli_query($conexao, $query);
// 	return $resultado;
// }	


function alteraStatusAtivo($conexao, $id){
	$query = "update comentarios set estado = 'A' where id = {$id}";
	$resultado = mysqli_query($conexao, $query);

	return $resultado;
}

function alteraStatusInativo($conexao, $id){
	$query = "update comentarios set estado = 'I' where id = {$id}";
	$resultado = mysqli_query($conexao, $query);

	return $resultado;
}


function buscaComentario($conexao, $id){
	$query = "select * from comentarios where id = {$id}";
	$resultado = mysqli_query($conexao, $query);

	return mysqli_fetch_assoc($resultado);	
	
}

function removeComentario($conexao, $id){
	$query = "delete from comentarios where id = '{$id}'";
	return mysqli_query($conexao, $query);

}

function contComentario($conexao, $id){
	$query = "select count(*) as contador from comentarios where noticia_id = {$id}";
	$resultado = mysqli_query($conexao, $query);

	return mysqli_fetch_assoc($resultado) ; 
}


function buscaComentarioNoticia($conexao, $id){
	$comentarios = array();
	$resultado = mysqli_query($conexao, "select * from comentarios where noticia_id = {$id}");

	while($comentario = mysqli_fetch_assoc($resultado)){
		array_push($comentarios, $comentario);
	}

	return $comentarios;
}
	


