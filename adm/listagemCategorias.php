<?php require_once("cabecalho.php");
	require_once("bancoCategorias.php");
	
	verificaUsuario();

?>

<div class="container">
	<table class="table table-bordered text-left">	
	<tr class="active">
		<td>Nome</td>
		<td>Descrição</td>
	</tr>

		<?php $categorias = listaCategorias($conexao);
				foreach($categorias as $categoria):

		?>

		<tr>
			<td><?=$categoria['nome']?></td>
			<td><?=$categoria['descricao']?></td>
			<td class="text-center"><a class="btn btn-primary" href="alteraCategorias.php?id=<?=$categoria['id']?>">Alterar</a></td>
			<td class="text-center">
				<form action="removeCategorias.php?id=<?$categoria['id']?>" method="POST">
					<input type="hidden" name="id" value="<?=$categoria['id']?>">
					<button class="btn btn-danger">Remover</button>
				</form>
			</td>
		</tr>
		<?php endforeach ?>
	</table>		
</div>

<?php include("rodape.php");?>