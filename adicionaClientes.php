<?php require_once("adm/conexaoBanco.php");

	$nome = $_POST['nome'];
	$email = $_POST['email'];

	$query = "insert into clientes (nome , email) values ('{$nome}', '{$email}')";
	$adiciona = mysqli_query($conexao, $query);

	if(isset($resultado)){
 		header("Location: index.php");
 		die();
	} else {	
		header("Location: index.php");
 		die();
 	}

