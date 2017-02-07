<?php require_once("cabecalho.php");
	require_once("bancoNoticias.php");
	
	verificaUsuario();


?>

<table class="table table-bordered text-left">
	
	<tr class="active">
		<td>Id</td>
		<td>Titulo</td>
		<td>Data</td>
		<td>Usuario Autor</td>
	</tr>	

	<?php 

		
		foreach(listaNoticias($conexao) as $noticia):
			$id_usuario =  $noticia['id_user'];		
			$usuario = buscaUsuarioNoticia($conexao, $id_usuario);
		//$dataCorreta = $noticia['dataCadastro'];

	?>

	<tr>
		<td><?=$noticia['id']?></td>
		<td><?=$noticia['titulo']?></td>
		<td><?=date('d/m/Y', strtotime($noticia['dataCadastro']));?></td>
		<td><?=$usuario['nome']?></td>

		<td class="tamanho">
			<form action="alteraNoticias.php?id=<?=$noticia['id']?>" method="GET">
				<input type="hidden" name="id" value="<?=$noticia['id']?>">
				<button class="btn btn-primary">Alterar</button>
			</form>
		</td>
		<td class="tamanho">
			<form action ="removeNoticias.php?id=<?=$noticia['id']?>" method="POST">
				<input type="hidden" name="id" value="<?=$noticia['id']?>">
				<button class="btn btn-danger">Remover</button>				
			</form>
		</td>	
	</tr>

<?php endforeach ?>
</table>

<?php include("rodape.php"); ?>