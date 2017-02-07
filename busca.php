<?php require_once("adm/bancoNoticias.php");
	require_once("adm/bancoCategorias.php");
	require_once("cabecalho.php");

	$titulo = $_GET['tituloBusca'];
	$contadorNoticia = contadorBusca($conexao, $titulo);
	$cont = $contadorNoticia['contador'];
	$buscaNoticia = busca($conexao, $titulo);

	$categoriaAnterior = "Home";

?>
<div class="container">
	<div class="corpo-caminho">
		<span class="caminho-noticia">					
			Você esta:  <a href="index.php"> Página Inicial </a> <i class="fa fa-angle-right" aria-hidden="true"></i> 
			<span class="pagina-anterior"><a href="#">Busca</a></span>
		</span>
	<h1 style="margin-bottom:30px;">Busca</h1>
	<span class="resultado-busca">Foram encontradas <span><?=$cont?></span> noticias em todo o site com a busca feita por <span><?=$titulo?></a></span>
	<?php foreach($buscaNoticia as $noticia):
	
			include("funcaoData.php"); ?>

		<div class="pagina-noticia">
			<div class="pagina-noticia-row">
				<div class="box-table">
					<div class="row-noticia">
					<?php if(!$noticia['imagem'] == ""){ ?>
						<div class="imagem">
							<a href="noticia.php?id=<?=$noticia['id']?>"><img src="<?=$noticia['imagem']?>"></a>
						</div>
						<?php } else { ?>
						
						<?php } ?>
						<h5><?=$data;?></h5>
				 		<h2><a href="noticia.php?id=<?=$noticia['id']?>"><?=$noticia['titulo']?></a></h2>
				 		<h3><a href="noticia.php?id=<?=$noticia['id']?>"><?=$noticia['subtitulo']?></a></h3>
				 		<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>	
		<?php endforeach; ?>													
		</div>	
	<!--<div class="paginacao">						
			<ul><li><a href="#">Proxima</a></li>
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">Ultima</a></li>
			</ul>
		</div>		 -->
	</div>		
</div>		
<?php require_once("rodape.php"); ?>