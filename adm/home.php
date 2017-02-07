<?php
	
	if (isset($_SESSION["danger"])){

		session_destroy();
		header("Location: index.php");
	}

	else {
	require_once ("cabecalho.php");		
?>

		<h1>Bem vindo</h1>			
			<p class="text-success"> Você está logado como <?=$_SESSION['usuario'];?></p>
		
			<br />
			<br />
			<a class="btn btn-info" href="logout.php">Deslogar</a>
		</p>

		<?php
	}	require_once("rodape.php"); ?>