<?php require_once("cabecalho.php");
	require_once("bancoNoticias.php");
	require_once("bancoComentarios.php");

	verificaUsuario();

?>

<table class="table table-bordered text-left">
	<tr class="active">
		<td>Nome Noticia</td>
		<td>Quantidade de comentarios</td>	
	</tr>

<?php
	foreach (listaComentarios($conexao) as $comentario) :
		$id = $comentario['noticia_id'];
		$noticia = buscaNoticias($conexao, $id);
		$contador = contComentario($conexao, $id);
?>
	<tr>
		<td><?=$noticia['titulo']?></td>
		<td><?=$contador['contador']?></td>
	</tr>


<?php endforeach; ?>

</table>

<?php 
	include("rodape.php");

