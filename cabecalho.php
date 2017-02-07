<!DOCTYPE html>
<html lang=pt_br>
	<head>
		<title>Netzee News</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/mediaQueries.css">		
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
		<link rel="icon" type="image/gif" href="img/flaticon.png">
		<link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="owlcarousel/owl.carousel.js"></script>
	</head>
	<body>
		<div class="sombra"></div>			
			<header class="menu-topo">
			<div class="container">
			<div class="botao-menu" href="#"><img class="menu-topo-responsive" src="img/line-menu.svg"></div>
				<div class="clear"></div>
				<div class="logo-topo">
					<a href="index.php"><img class="logo-azul" src="img/logo-netzee.png" alt="logo netzee"></a>	
				</div>
			<div class="botao-menu-fechar" href="#"><img class="menu-topo-responsive-fechar" src="img/cancel-music.svg"></div>
				
				<nav class="paginas">
					<ul>
						<li><a href="index.php">Home</a></li>
						<?php  foreach(listaCategorias($conexao) as $categoria):?>
						<li><a href="categoria.php?id=<?=$categoria['id']?>"><?=$categoria['nome']?></a></li>
						<?php endforeach; ?>
					</ul>
				</nav>

				<div class="pesquisa">
					<form method="GET" action="busca.php">
						<input type="search" name="tituloBusca" placeholder="Busque aqui"><button></button>
					</form>
				</div>				
			</div>
			<div class="clear"></div>
		</header>