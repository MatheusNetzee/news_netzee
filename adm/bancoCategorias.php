<?php require_once("conexaoBanco.php");

function listaCategorias($conexao){
	$categorias = array();
	$resultado = mysqli_query($conexao, "select * from categorias");

	while($categoria = mysqli_fetch_assoc($resultado)){
		array_push($categorias, $categoria);
	}

	return $categorias;
}

function adicionaCategorias($conexao, $nome, $descricao){
	$query = "insert into categorias (nome, descricao) values ('{$nome}', '{$descricao}')" ;
	$resultado = mysqli_query($conexao, $query);
	return $resultado;

}
	

function removeCategorias($conexao, $id){
	$query = "delete from categorias where id = '{$id}'"; 
	return mysqli_query($conexao, $query);
}


function alteraCategorias($conexao, $id , $nome, $descricao){
	$query = "update categorias set nome =  '{$nome}' , descricao = '{$descricao}' where id = {$id}";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;
}

function buscaCategorias($conexao, $id){
	$query = "select * from categorias where id = {$id}";
	$resultado = mysqli_query($conexao, $query);

	if($resultado){
		return mysqli_fetch_assoc($resultado);	
	}
}

function buscaCategoriaNoticia($conexao, $id){
	$query = "SELECT c.nome, c.id FROM assist a INNER JOIN categorias c ON a.categoria_id = c.id WHERE a.noticia_id = {$id} order by id desc";
	$resultado = mysqli_query($conexao, $query);

	if($resultado){
		return mysqli_fetch_assoc($resultado);
	}
}



function buscaCategoriaNoticiaGeral($conexao, $id){
	$query = "SELECT c.nome, c.id FROM assist a INNER JOIN categorias c ON a.categoria_id = c.id WHERE a.noticia_id = {$id}";
	$resultado = mysqli_query($conexao, $query);

	if($resultado){
		return mysqli_fetch_assoc($resultado);
	}
}

function contaCategorias($conexao, $id){
	$query =  "select count(*) as contador from assist where categoria_id = {$id}";
	$resultado = mysqli_query($conexao, $query);

	return mysqli_fetch_assoc($resultado);
}





