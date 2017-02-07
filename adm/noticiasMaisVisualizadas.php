<?php require_once("cabecalho.php");
	require_once("bancoNoticias.php");

	verificaUsuario();


?>

<table class="table table-bordered text-left">
	<tr class="active">
		<td>Nome Noticia</td>
		<td>Visualizações</td>	
	</tr>


<?php foreach(listaNoticiasMaisVisualizadas($conexao) as $noticia): ?>

	<tr>
		<td><?=$noticia['titulo']?></td>
		<td><?=$noticia['qtdeVisualizacao']?></td>
	</tr>

<?php endforeach ?>

</table>

<?php 
	include("rodape.php");