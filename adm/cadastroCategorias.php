<?php require("cabecalho.php");
	
	verificaUsuario();

	$categoria = array("nome" => "" , "descricao" => "");	
?>

	<div class="container">
		<table class="table text-right">
			<form method="POST" action="adicionaCategorias.php">
				<tr>
					<td>Nome da Categoria </td>
					<td><input class="form-control" type="text" name="nome" value="<?= $categoria['nome']; ?>"></td>
				</tr>
				
				<tr>
					<td>Descrição</td>
					<td><textarea class="form-control" name="descricao" value="<?= $categoria['descricao']; ?>"></textarea></td>

				</tr>
				<tr>
					<td><button class="btn btn-primary">Cadastrar Categoria</button></td>
				</tr>
			</form>		
		</table>
	</div>


<?php include("rodape.php");