<?php require_once("conexaoBanco.php");

function listaNoticias($conexao){
	$noticias = array();
	$resultado = mysqli_query($conexao, "select * from noticias order by id desc");

 // select c.nome , n.titulo from categorias c join assist a on c.id = a.categoria_id join noticias n on a.noticia_id = n.id

	while($noticia = mysqli_fetch_assoc($resultado)){
		array_push($noticias, $noticia);
	}

	return $noticias;
}

function adicionaNoticias($conexao, $titulo, $subtitulo , $dataCadastro , $textoNoticia, $caminhoImagem ,$id_user ,$destaque , $categoria_id){
// noticias
	$query  = "insert into noticias (titulo, subtitulo, dataCadastro, textoNoticia, imagem, id_user ,destaque) values ( '{$titulo}', '{$subtitulo}' , '{$dataCadastro}', '{$textoNoticia}' , '{$caminhoImagem}' , {$id_user} , '{$destaque}')";		
	$resultado =  mysqli_query($conexao, $query);
	$id_noticia = mysqli_insert_id($conexao);  
// assist
	foreach ($categoria_id as $categoria):
		$sql = "insert into assist (categoria_id, noticia_id) values ('{$categoria}' , '{$id_noticia}')";
		$resultAssist = mysqli_query($conexao, $sql);		
	endforeach;

	return array($resultado, $resultAssist);

}


function removeNoticias($conexao, $id){
	$query =  "delete from noticias where id = {$id}";
	return mysqli_query($conexao, $query);
}

//---------------------------------------------------------------------------------------------
function alteraNoticias($conexao, $id , $titulo, $subtitulo , $dataCadastro, $dataEdicao, $textoNoticia, $caminhoImagem , $categoria_id , $destaque){
	$query = "update noticias set titulo = '{$titulo}', subtitulo = '{$subtitulo}' , dataCadastro = '{$dataCadastro}', dataEdicao = '{$dataEdicao}' , textoNoticia = '{$textoNoticia}', imagem = '{$caminhoImagem}' , destaque = '{$destaque}' where id = {$id}";
	$resultado = mysqli_query($conexao, $query);

	foreach($categoria_id as $categoria):
		$query = "delete from assist where categoria_id = '{$categoria}' and noticia_id = {$id}"; 
		$sql_query = "insert into assist (categoria_id, noticia_id) values ('{$categoria}' , {$id} where noticias.id = {$id})";
		$resultAssist = mysqli_query($conexao, $sql_query);
	endforeach;

	return array($resultado, $resultAssist);
}
//-------------------------------------------------------------------------------------------------------------

function buscaNoticias($conexao, $id){
	$query = "select * from noticias where id = {$id}";
	$resultado = mysqli_query($conexao, $query);

	if($resultado){
		return mysqli_fetch_assoc($resultado);	
	}
}

function buscaAssist($conexao, $id){

	// $sql_query = "SELECT * FROM categorias c
	// inner JOIN assist a ON {$id} = a.noticia_id";

	$sqlBusca = "SELECT * FROM assist WHERE noticia_id = {$id}";
	$sql_query = "SELECT c.id, c.nome FROM assist a INNER JOIN categorias c on c.id = a.categoria_id WHERE a.noticia_id = {$id}";
	$resultado = mysqli_query($conexao, $sql_query);
	

	if($resultado){
	return mysqli_fetch_assoc($resultado);
	}
}

function  buscaUsuarioNoticia($conexao, $id){
	$query = "SELECT DISTINCT nome from usuarios where id = {$id}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);

}

function contadorUsuarioNoticia($conexao, $id){
	$query = "SELECT DISTINCT COUNT(id_user) as contador from noticias where id_user = {$id}";
	$resultado =  mysqli_query($conexao, $query);

	return mysqli_fetch_assoc($resultado);
}



function separaNoticiaCategoria($conexao, $id){

	$resultado = mysqli_query($conexao, "SELECT DISTINCT n.* FROM noticias n
									INNER JOIN assist a  
									ON n.id = a.noticia_id
									INNER JOIN categorias c
									ON {$id} = a.categoria_id order by id desc ");
// 	return mysqli_fetch_assoc($resultado);
        while ($row = mysqli_fetch_assoc($resultado)) {
            $msg[] = $row;
        }
	return $msg;
}


function busca($conexao, $titulo){

	$noticias = array();
	$resultado = mysqli_query($conexao, "select * from noticias where MATCH(titulo,subtitulo) AGAINST ('{$titulo}') order by titulo");

	while($noticia = mysqli_fetch_assoc($resultado)){
		array_push($noticias, $noticia);
	}

	return $noticias;
}



function buscaNoticiasRelacionadas($conexao, $titulo){
		$noticias = array();
	$resultado = mysqli_query($conexao, "SELECT * from noticias where MATCH (titulo,subtitulo) AGAINST ('{$titulo}') order by titulo LIMIT 6");

	while($noticia = mysqli_fetch_assoc($resultado)){
		array_push($noticias, $noticia);
	}
	return $noticias;
}

function contadorBusca($conexao, $titulo){
	$query  = "select count(*) as contador from noticias where MATCH (titulo,subtitulo) AGAINST ('{$titulo}')";
	$resultado = mysqli_query($conexao, $query);

	return mysqli_fetch_assoc($resultado);
}

function listaNoticiasDestaque($conexao){
	$noticias = array();
	$resultado = mysqli_query($conexao, "SELECT * from noticias where destaque = 'S' order by id desc LIMIT 6 ");

 // select c.nome , n.titulo from categorias c join assist a on c.id = a.categoria_id join noticias n on a.noticia_id = n.id

	while($noticia = mysqli_fetch_assoc($resultado)){
		array_push($noticias, $noticia);
	}

	return $noticias;
}


function noticiasRelacionadasCategoria($conexao, $id){
	$resultado = mysqli_query($conexao, "SELECT DISTINCT n.* FROM noticias n
									INNER JOIN assist a  
									ON n.id = a.noticia_id
									INNER JOIN categorias c
									ON {$id} = a.categoria_id  LIMIT 6");
// 	return mysqli_fetch_assoc($resultado);
        while ($row = mysqli_fetch_assoc($resultado)) {
            $msg[] = $row;
        }
	return $msg;
}

function atualizaVisualizacao($conexao, $id, $numeroAtualizado){
	$query = "update noticias set qtdeVisualizacao = {$numeroAtualizado} where id = {$id}";
	$resultado = mysqli_query($conexao, $query);

}

function noticiasMaisVisualizadas($conexao){
	$noticias = array();
	$resultado = mysqli_query($conexao, "select * from noticias where qtdeVisualizacao > 4 order by  qtdeVisualizacao DESC LIMIT 3 ");

 // select c.nome , n.titulo from categorias c join assist a on c.id = a.categoria_id join noticias n on a.noticia_id = n.id

	while($noticia = mysqli_fetch_assoc($resultado)){
		array_push($noticias, $noticia);
	}

	return $noticias;
}


function listaNoticiasMaisVisualizadas($conexao){
	$noticias = array();
	$resultado = mysqli_query($conexao, "select * from noticias order by qtdeVisualizacao DESC ");

 // select c.nome , n.titulo from categorias c join assist a on c.id = a.categoria_id join noticias n on a.noticia_id = n.id

	while($noticia = mysqli_fetch_assoc($resultado)){
		array_push($noticias, $noticia);
	}

	return $noticias;
}


function listaNoticiasSlide($conexao){
	$noticias = array();
	$resultado = mysqli_query($conexao,"select * from noticias where destaque = 'S' and qtdeVisualizacao > 4 order by qtdeVisualizacao limit 4");

 // select c.nome , n.titulo from categorias c join assist a on c.id = a.categoria_id join noticias n on a.noticia_id = n.id

	while($noticia = mysqli_fetch_assoc($resultado)){
		array_push($noticias, $noticia);
	}

	return $noticias;
}


function buscaVisualizacao($conexao, $id){

	$resultado = mysqli_query($conexao,"select qtdeVisualizacao from noticias where id = {$id}");
 // select c.nome , n.titulo from categorias c join assist a on c.id = a.categoria_id join noticias n on a.noticia_id = n.id
	return mysqli_fetch_assoc($resultado);

}

