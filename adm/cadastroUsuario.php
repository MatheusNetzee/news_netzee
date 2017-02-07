<?php require_once("cabecalho.php");
 	  require_once("bancoUsuario.php");

 	  verificaUsuario();


$usuario = array("nome" => "", "email" => "" , "senha" => "");

?>

<div class="container">
	<form method="POST" action="adicionaUsuario.php">
		<table class="table text-right">
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
			<td><button class="btn btn-primary">Cadastrar</button></td>
				
			</tr>
		</table>
	</form>
</div>


<?php include("rodape.php");?>