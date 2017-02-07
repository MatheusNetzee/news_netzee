<?php require_once("adm/bancoNoticias.php");
require_once("adm/bancoCategorias.php");
require_once("cabecalho.php");	

$categoriaAnterior = "Home";?>

<div class="container">
	<div class="main">
		<div class="slide-destaque">	
			<div class="owl-carousel">
			<?php
				$vetorNoticias = listaNoticiasSlide($conexao);
				$contadorNoticias = count($vetorNoticias);
			if($contadorNoticias > 1) {
				foreach($vetorNoticias as $noticia) :	
						include("funcaoData.php");
				?>
					<div class="item">
						<a href="noticia.php?id=<?=$noticia['id']?>&amp;categoria=<?=$categoriaAnterior?>&amp;id_categoria="> 
							<img class="imagem-slide-principal" src="<?=$noticia['imagem']?>">
							<span class="texto-slide">
								<span class="data-slide"><?=$data?></span>
								<span class="titulo-slide"><?=$noticia['titulo']?>
							</span>
						</a>						
					</div>
				<?php endforeach; ?>
				</div>
			<?php } else {
				include("funcaoData.php"); 	 ?> 		
					<div class="item"><a href="noticia.php?id=<?=$noticia['id']?>&amp;categoria=<?=$categoriaAnterior?>&amp;id_categoria=">  <img class="imagem-slide-principal" src="<?=$noticia['imagem']?>"></a>
						<span class="texto-slide">
							<span class="data-slide"><?=$data?></span>
							<span class="titulo-slide"><?=$noticia['titulo']?>
						</span>
					</div>
				</div>
			<?php } ?> 	
		</div>
		<div class="destaque">
			<div class="destaque-imagem">
				<a href="#"><img src="img/destaque.jpg"></a>
			</div>
		</div>
		<div class="destaque">
			<div class="destaque-imagem">
				<a href="#"><img src="img/destaque.jpg"></a>
			</div>
		</div>
	</div>
	<div class="clear"></div>
	<h3 class="titulo-noticia">Noticias mais Lidas</h3>
	<div class="mais-lidas">
		<?php foreach (noticiasMaisVisualizadas($conexao) as $noticia) :
			include("funcaoData.php");?>
	 <div class="row-noticia">
	 	<div class="imagem">
	 		<a href="noticia.php?id=<?=$noticia['id']?>&amp;categoria=<?=$categoriaAnterior?>&amp;id_categoria="><img src="<?=$noticia['imagem']?>"></a>
	 	</div>
	 	<h5><a href="noticia.php?id=<?=$noticia['id']?>&amp;categoria=<?=$categoriaAnterior?>&amp;id_categoria="> <?=$data?></a></h5>
	 	<h2><a href="noticia.php?id=<?=$noticia['id']?>&amp;categoria=<?=$categoriaAnterior?>&amp;id_categoria="> <?=$noticia['titulo']?></a></h2>
	 </div>
	 <?php endforeach; ?>	
	</div>
	<div class="clear"></div>
	<h3 class="titulo-noticia">Noticias em Destaque</h3>
		<div class="recentes">
			<div class="mais-recentes">
				<?php 	
					$noticiasDestaque = listaNoticiasDestaque($conexao);
					foreach ($noticiasDestaque as $noticia) :
						include("funcaoData.php"); ?>
					<div class="box-table">
						<div class="row-recentes">
							<div class="noticia-imagem">
								<a href="noticia.php?id=<?=$noticia['id']?>&amp;categoria=<?=$categoriaAnterior?>&amp;id_categoria="> <img src="<?=$noticia['imagem']?>"></a>	
							</div>
							<h5><a href="noticia.php?id=<?=$noticia['id']?>&amp;categoria=<?=$categoriaAnterior?>&amp;id_categoria="> <?=$data?></a></h5>
					 		<h2><a title="<?=$noticia['titulo']?>" href="noticia.php?id=<?=$noticia['id']?>&amp;categoria=<?=$categoriaAnterior?>&amp;id_categoria="> <?=substr($noticia['titulo'], 0, 
					 	35)?>...</a></h2>
						</div>
					</div>
				<?php endforeach;?>
			</div>
		</div>
		<div class="envio-email">
			<form method="POST" action="adicionaClientes.php" id="formEmail">
				<span class="titulo">Newsletter</span>
				<span class="subtitulo">Get the recent popular stories straight into your inbox</span>
				<input type="text" name="nome" id="eNome" placeholder="Nome">
				<input type="email" name="email" id="eEmail" placeholder="Email">
				<input type="submit" name="cadatrarEmail" id="botao-submit-email" value="CADASTRAR">						
			</form>
		</div>
	</div>		
</div>
<?php require_once("rodape.php"); ?>