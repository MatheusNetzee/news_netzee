<?php require_once("cabecalho.php");
	require_once("bancoUsuario.php");
	verificaUsuario();
?>
<div class="container">
	<table class="table table-bordered text-left">
	<tr class="active">
		<td>Nome</td>
		<td>Email</td>
		<td>Senha</td>
	</tr>
	<?php 
		$usuarios = listaUsuario($conexao);
			foreach($usuarios as $usuario):
	?>
		<tr>
			<td><?=$usuario['nome']?></td>
			<td><?=$usuario['email']?></td>
			<td><?=$usuario['senha']?></td>
			<td class="text-center"><a class="btn btn-primary" href="alteraUsuario.php?id=<?=$usuario['id']?>">Alterar</a></td>
			<td class="text-center">
				<form action="removeUsuario.php?id=<?=$usuario['id']?>" method="POST">
					<input type="hidden" name="id" value="<?=$usuario['id']?>">
					<button class="btn btn-danger">Remover</button>			
				</form>
			</td>
		</tr>		
		<?php endforeach?>	
	</table>
</div>
<?php include("rodape.php");?>
