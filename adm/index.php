<?php require_once("alerta.php"); ?>
<!DOCTYPE html>
<html lang=pt-br>
	<head>
		<title>Adm News</title>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link href="https://fonts.googleapis.com/css?family=Ubuntu:400,700" rel="stylesheet">
		<link rel="icon" type="image/gif" href="img/flaticon.png">
	</head>
	<body>
		<div class="login-box">
			<div class="titulo">
				<img src="img/logonetzee-cor.png" alt="logo netzee">
			</div>
			<div class="login-main">
				<div class="titulo-sessao">
					<b>Entre para iniciar sua sessão</b>
				</div>
					<?php mostraAlerta("danger");
					?>			
				<form method="POST" action="login.php">
					<div class="login-input">
						<p><input type="text" name="email" id="Iemail" class="form-control" placeholder="Email"></p>
						<p><input type="password" name="senha" id="Isenha" class="form-control" placeholder="Senha"></p>
					</div>
					<div class="login-bottom">
						<input type="submit" name="enviar" value="Enviar" class="btn btn-info">
					</div>
				</form>			
			</div>
		</div>
	</body>
</html>
