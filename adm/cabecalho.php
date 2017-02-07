<?php require_once("bancoUsuario.php");
error_reporting(0);?>
<!DOCTYPE html>
   <html lang="pt-br">
   <head>
      <title>Adm News</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">      
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/estilo.css">
      <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,700" rel="stylesheet">
      <link rel="icon" type="image/gif" href="img/flaticon.png">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

   </head>
   <body>
   	<div class="principal">   		
      <nav class="navbar navbar-inverse">
         <div class="container">
            <div class="navbar-header">
               <a class="navbar-brand" href="home.php">Adm Netzee News</a>
            </div>
            <ul class="nav navbar-nav">
               <li class="active"><a href="home.php">Home</a></li>
               <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Usuarios <span class="caret"></span></a>
               <ul class="dropdown-menu">
                  <li><a href="cadastroUsuario.php">Cadastro de Usuario</a></li>
                  <li><a href="listagemUsuario.php">Listagem de Usuario</a></li>
               </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Categorias<span class="caret"></span></a>
               <ul class="dropdown-menu">
                  <li><a href="cadastroCategorias.php">Cadastro de Categorias</a></li>
                  <li><a href="listagemCategorias.php">Listagem de Categorias</a></li>
               </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Notícias<span class="caret"></span></a>
               <ul class="dropdown-menu">
                  <li><a href="cadastroNoticias.php">Cadastro de Notícias</a></li>
                  <li><a href="listagemNoticias.php">Listagem de Notícias</a></li>
               </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Relatórios<span class="caret"></span></a>
               <ul class="dropdown-menu">
                  <li><a href="noticiasMaisVisualizadas.php">Noticias mais visualizadas</a></li>
                  <li><a href="noticiasMaisComentadas.php">Noticias mais comentadas</a></li>
                  <li><a href="categoriasMaisNoticias.php">Categorias com mais noticias</a></li>
                  <li><a href="usuarioMaisAtivo.php">Usuario com mais noticias cadastradas</a></li>
               </ul>
            </li>
            <li><a href="listagemComentarios.php">Comentarios</a></li>
            </ul>
      </div>      
   </nav>
   <div class="container">
<?php require_once("alerta.php");
      mostraAlerta("success");
      mostraAlerta("danger"); ?>
