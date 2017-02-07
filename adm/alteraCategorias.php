<?php require_once("cabecalho.php");
	require_once("bancoCategorias.php");
	
if(isset($_GET['id'])){
	$id = $_GET['id'];
}
else{
	$id = 'default'; 
}
$categoria = buscaCategorias($conexao, $id);

?>
	<div class="container">
		<table class="table">
			<form method="POST" action="editaCategorias.php">
				<input type="hidden" name="id" value="<?=$categoria['id']?>">
				<tr>
					<td>Nome da Categoria </td>
					<td><input class="form-control" type="text" name="nome" value="<?=$categoria['nome']?>"></td>
				</tr>
				
				<tr>
					<td>Descrição</td>
					<td><textarea class="form-control" name="descricao"><?=$categoria['descricao']?></textarea></td>

				</tr>
				<tr>
					<td><button class="btn btn-primary">Alterar Categoria</button></td>
				</tr>
			</form>		
		</table>
	</div>


<?php include("rodape.php");