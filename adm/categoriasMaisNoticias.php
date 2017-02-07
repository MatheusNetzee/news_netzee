<?php require_once("cabecalho.php");
	require_once("bancoCategorias.php");

	verificaUsuario();
?>

<div class="container">
		<table class="table table-bordered text-left">
 		<tr class="active">
 			<td>Categorias</td>
 			<td>Noticias vinculadas</td>
 		</tr>
 <?php
 		$categorias = listaCategorias($conexao);
 			foreach($categorias as $categoria):
 				$qtde = contaCategorias($conexao, $categoria['id']);
 				
 		?>	
 		<tr>
 			<td><?=$categoria['nome']?></td> 					
 			<td><?=$qtde['contador']?></td> 	
 		</tr>


		<?php endforeach ?>
	</table>	
</div>

<?php include("rodape.php");


