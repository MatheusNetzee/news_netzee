<?php require_once("cabecalho.php");
 	  require_once("bancoUsuario.php");
 	  
if(isset($_GET['id'])){
	$id = $_GET['id'];
}
else{
	$id = 'default'; 
}
$usuario = buscaUsuarioId($conexao, $id); ?>

<div class="container">
	<form method="POST" action="editaUsuario.php">
		<input type="hidden" name="id" value="<?=$usuario['id']?>">
		<table class="table">
			<tr>
				<td>Nome Completo</td>
				<td><input class="form-control" type="text" name="nome" value="<?=$usuario['nome'];?>"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input class="form-control" type="email" name="email" value="<?=$usuario['email'];?>"></td>
			</tr>
			<tr>
				<td>Senha</td>
				<td><input class="form-control" type="password" name="senha" value="<?=$usuario['senha'];?>"></td>
			</tr>
			<tr>
				<td><button class="btn btn-primary">Alterar Cadastro</button></td>
			</tr>
		</table>
	</form>
</div>
<?php include("rodape.php");?>