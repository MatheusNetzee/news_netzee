<?php require_once("cabecalho.php");
	require_once("bancoNoticias.php");
	require_once("bancoUsuario.php");			
	verificaUsuario();
?>
<div class="container">
	<table class="table table-bordered text-left">
		<tr class="active">
			<td>Nome Usuario</td>
			<td>Quantidade de Noticias cadastradas</td>
		</tr>
	<?php
			$usuarios = listaUsuario($conexao);
			foreach($usuarios as $usuario):
				$id = $usuario['id'];			
				$contador = contadorUsuarioNoticia($conexao, $id);
			 
			?>
		<tr>
			<td><?=$usuario['nome'];?></td>
			<td><?=$contador['contador'];?></td>
		</tr>
	<?php endforeach  ?> 
	</table>
</div>
<?php include("rodape.php"); ?>
























</table>