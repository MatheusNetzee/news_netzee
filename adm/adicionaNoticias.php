<?php require_once("alerta.php");
	require_once("bancoNoticias.php");

	$titulo =  $_POST['titulo'];
	$subtitulo = $_POST['subtitulo'];
	$dataCadastro = $_POST['dataCadastro'];
	$textoNoticia = $_POST['textoNoticia'];
	$imagem_name = $_FILES['imagem']['name'];
	$id_user = $_SESSION['id_usuario'];
	$destaque = $_POST['destaque'];
	$categoria_id = $_POST['categoria_id']; 
	
	// var_dump($titulo);
	// var_dump($subtitulo);
	// var_dump($dataCadastro);
	// var_dump($textoNoticia);
	// var_dump($categoria_id);
	

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
									
		
		$query  = "insert into noticias (titulo, subtitulo, dataCadastro, textoNoticia, imagem, id_user ,destaque) values ( '{$titulo}', '{$subtitulo}' , '{$dataCadastro}', '{$textoNoticia}' , '{$caminhoImagem}' , {$id_user} , '{$destaque}')";		
		$resultado =  mysqli_query($conexao, $query);
		$id_noticia = mysqli_insert_id($conexao);  

// assist
		foreach ($categoria_id as $categoria):
			$sql = "insert into assist (categoria_id, noticia_id) values ('{$categoria}' , '{$id_noticia}')";
			$resultAssist = mysqli_query($conexao, $sql);		
		endforeach;
		$adiciona =  array($resultado, $resultAssist);

		$_SESSION["success"] = "A noticia $titulo foi adicionada com sucesso.";
			header("Location: cadastroNoticias.php");
			die();

		} else {
			$_SESSION["danger"] = "A noticia $titulo não foi adicionada.";
			header("Location: cadastroNoticias.php");
			die();
	}	


	
	 


	// if(adicionaNoticias($conexao, $titulo, $subtitulo , $dataCadastro , $textoNoticia, $caminhoImagem ,$id_user ,$destaque, $categoria_id)){
	// 	$_SESSION["success"] = "A noticia $titulo foi adicionada com sucesso.";
	// 	header("Location: cadastroNoticias.php");						
	// 	die();

	// } else {
	// 	$_SESSION["danger"] = "A noticia $titulo não foi adicionada.";
	// 	header("Location: cadastroNoticias.php");
	// 	die();
	// }