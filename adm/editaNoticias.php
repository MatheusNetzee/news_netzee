<?php require_once("alerta.php");
	require_once("bancoNoticias.php");

	$id = $_POST['id'];
	$titulo =  $_POST['titulo'];
	$subtitulo = $_POST['subtitulo'];
	$dataCadastro = $_POST['dataCadastro'];
	$dataEdicao = $_POST['dataEdicao'];
	$textoNoticia = $_POST['textoNoticia'];
	$imagem_name = $_FILES['imagem']['name'];
	$categoria_id = $_POST['categoria_id'];
	$destaque = $_POST['destaque'];

//------------------------------------------------

	if($imagem_name == ""){
		$caminhoImagem = ""; 
	} else {
		$imagem_size = $_FILES['imagem']['size'];
		$imagem_tmp =  $_FILES['imagem']['tmp_name'];
		move_uploaded_file($imagem_tmp, "../upload/" .$imagem_name);
		$caminhoImagem = "upload/" . $imagem_name;
	}

	if((!$titulo == "") && (!$subtitulo == "") && (!$categoria_id == "") && (!$dataCadastro == "") && (!$textoNoticia == "")){
									
		
		$query = "update noticias set titulo = '{$titulo}', subtitulo = '{$subtitulo}' , dataCadastro = '{$dataCadastro}', dataEdicao = '{$dataEdicao}' , textoNoticia = '{$textoNoticia}', imagem = '{$caminhoImagem}' , destaque = '{$destaque}' where id = {$id}";
		$resultado = mysqli_query($conexao, $query);

	foreach($categoria_id as $categoria):
		$query = "delete from assist where categoria_id = '{$categoria}' and noticia_id = {$id}"; 
		$sql_query = "insert into assist (categoria_id, noticia_id) values ('{$categoria}' , {$id} where noticias.id = {$id})";
		$resultAssist = mysqli_query($conexao, $sql_query);
	endforeach;

	$altera =  array($resultado, $resultAssist);

	$_SESSION["success"] = "A noticia $titulo foi alterada com sucesso.";
		header("Location: alteraNoticias.php");
		die();

	} else {
		$_SESSION["danger"] = "A noticia $titulo não foi alterada.";
		header("Location: alteraNoticias.php");
		die();

	}
}
//------------------------------------------------

		
	
	// if(alteraNoticias($conexao, $id , $titulo , $subtitulo , $dataCadastro, $dataEdicao, $textoNoticia, $caminhoImagem, $categoria_id ,$destaque)){
	// 	$_SESSION["success"] = "A noticia $titulo foi alterada com sucesso.";
	// 	header("Location: alteraNoticias.php"); 
	// 	die();

	// } else {
	// 	$_SESSION["danger"] = "A noticia $titulo não foi alterada.";
	// 	header("Location: alteraNoticias.php");
	// 	die();
	// }


