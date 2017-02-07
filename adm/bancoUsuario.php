<?php require_once("conexaoBanco.php");

function listaUsuario($conexao){
	$usuarios = array();
	$resultado = mysqli_query($conexao, "select * from usuarios");

	while($usuario = mysqli_fetch_assoc($resultado)){
		array_push($usuarios, $usuario);
	}

	return $usuarios;
}


function adicionaUsuario($conexao,$nome,$email,$senha){
	$query = "insert into usuarios (nome, email, senha) values ('{$nome}','{$email}','{$senha}')";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;
}


function removeUsuario($conexao, $id){
	$query = "delete from usuarios where id = {$id}";
	return mysqli_query($conexao, $query);
}


function alteraUsuario($conexao, $id, $nome, $email, $senha){
	$query = "update usuarios set nome = '{$nome}', email = '{$email}', senha = '{$senha}' where id = {$id}";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;
}


function buscaUsuario($conexao, $email, $senha){

	$query = "select * from usuarios where email = '{$email}' and senha = '{$senha}' ";
	$resultado = mysqli_query($conexao, $query);
	$usuario = mysqli_fetch_assoc($resultado);
	$_SESSION['id_usuario'] = $usuario['id'];
	

	return $usuario;
}

function buscaUsuarioId($conexao, $id){
	$query = "select * from usuarios where id = {$id} ";
	$resultado = mysqli_query($conexao, $query);

	if($resultado){
		return mysqli_fetch_assoc($resultado);	
	}
}

function usuarioEstaLogado(){
	return isset($_SESSION["usuario"]);
}

function verificaUsuario(){
	if(!usuarioEstaLogado()) {
		$_SESSION["danger"] = "Voce não tem acesso a esta funcionalidade";
		header("Location: home.php?falhaDeSegurança==true");
		die();
		}
}



// function buscaUsuario($conexao, $email, $senha){
// 	$email = mysqli_real_escape_string($conexao, $senha){
// 	$query = "select * from usuarios where email='{$email}' and senha = '{$senha}'";
// 	$resultado = mysqli_query($conexao, $query);
// 	$usuario = mysqli_fetch_assoc($resultado);
// 	return $usuario;
// 	}
// }