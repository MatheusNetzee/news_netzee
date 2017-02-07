<?php require_once("cabecalho.php");
	require_once("bancoNoticias.php");
	require_once("bancoComentarios.php");
	
	verificaUsuario();

	?>

<table class="table table-bordered text-left">
	<tr class="active">
		<td>Nome</td>
		<td>Email</td>
		<td>Id</td>
		<td>Nome Noticia</td>
		<td>Status</td>		
	</tr>

<?php
	
	foreach (listaComentarios($conexao) as $comentario) :
				$id= $comentario['noticia_id'];
				$noticia = buscaNoticias($conexao ,$id);
	?>

	<tr>
		<td><?=$comentario['nome']?></td>
		<td><?=$comentario['email']?></td>
		<td><?=$noticia['id']?></td>
		<td><?=$noticia['titulo']?></td>
		<td>			
			<select name="statusAtual" style="padding:0; width: 66px;" class="form-control">
			<?php if($comentario['estado'] == 'A'){ ?>
					<option value="<?=$comentario['status']?>">Ativo</option>
			<?php } else if($comentario['estado'] == 'I'){ ?>
					<option value="<?=$comentario['status']?>">Inativo</option>
			<?php } ?>			
			</select>		
		</td>
		
		<td class="tamanho">
			<form action="alteraStatus.php?id=<?=$comentario['id']?>" method="GET">
				<input type="hidden" name="id" value="<?=$comentario['id']?>">
				<button class="btn btn-primary">Alterar Status</button>
			</form>
		</td>

		<td>
			<form action="removeComentario.php?id=<?=$comentario['id']?>" method="POST">
				<input type="hidden" name="id" value="<?=$comentario['id']?>">
				<button class="btn btn-danger">Remover</button>
			</form>
		</td>

	</tr>
<?php endforeach; ?>
</table>

<?php require_once("rodape.php");
