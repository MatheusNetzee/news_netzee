<?php require_once("adm/bancoNoticias.php");
	require_once("adm/bancoCategorias.php");
	require_once("adm/bancoComentarios.php");
	require_once("cabecalho.php");
// id da noticia
	$id = $_GET['id'];
//dados da categoria para o caminho realizado pelo usuario
	$categoria = $_GET['categoria'];
	$id_categoria = $_GET['id_categoria'];
//dados da noticia 
	$noticia = buscaNoticias($conexao, $id);
	$titulo = $noticia['titulo'];
	$subtitulo = $noticia['subtitulo'];
	$caminhoImagem = $noticia['imagem'];
	$texto = $noticia['textoNoticia'];	
//----------------------------------------------------------------
	$comentarioAtual = buscaComentarioNoticia($conexao, $id);
	$noticiasRelacionadas = buscaNoticiasRelacionadas($conexao, $titulo);
//----------------------------------------------------------------
//contador da visualizacao da pagina
	$numeroAtual =  buscaVisualizacao($conexao, $id);
	$novoNumero = $numeroAtual['qtdeVisualizacao'];
	$numeroAtualizado = $novoNumero +1;	
	atualizaVisualizacao($conexao, $id, $numeroAtualizado);
//------------------------------------------------------------
include("funcaoData.php");?>

<div class="container">
	<div class="corpo-noticia">
			<?php if($noticia == null){
			echo "<span class='textoErro'> Arquivo não encontrado </span>";
			echo "<br/>" ;
			echo "<br/>" ;			
			echo "<span class='textoErro'> Not Found 404 </span>";			
			echo "</div>";
			echo "</div>";
			include("rodape.php");
			exit();	
			} 
		?>
		<span class="caminho-noticia">
			<?php if ($categoria == "Home") { ?>
			Você esta: <a href="index.php">Página Inicial </a> <i class="fa fa-angle-right" aria-hidden="true"></i> 
			<span>	
				<span class="pagina-anterior"><a href="noticia.php?id=<?=$id?>"><?= $titulo?></a></span>
			</span>
		</span>				
			<?php } else {  ?>				
			Você esta: <a href="index.php">Página Inicial </a> <i class="fa fa-angle-right" aria-hidden="true"></i> 
			<span> 
				<a href="categoria.php?id=<?=$id_categoria?>"><?=$categoria?></a> 
			</span>
				<i class="fa fa-angle-right" aria-hidden="true"></i> 
			<span class="pagina-anterior">
				<a href="noticia.php?id=<?=$id?>"><?= $titulo?></a>
			</span>
		</span>
		<?php } ?>

		<span class="data-noticia" > Publicado dia <?=$data?></span>
		<h2 class="nome-noticia"><?=$titulo?></h2>
		<h5 class="subtitulo-noticia"><?=$subtitulo?></h5>
		<?php if(!$caminhoImagem == ""){  ?>
		<div class="imagem-noticia">
			<img src="<?=$caminhoImagem?>">
		</div>
		<?php } else {  ?>
			<!-- <div class="imagem-noticia"></div> -->
		<?php } ?>

		<p>
		<?=	nl2br($texto); 			

		?>					
		</p>
		<div class="clear"></div>
		<div class="envio-comentario">
			<form method="POST" action="adicionaComentarios.php" id="formComentario">
				<input type="hidden" name="noticia_id" value="<?=$id?>">
				<input type="hidden" name="id_categoria" value="<?=$id_categoria?>">
				<input type="hidden" name="categoria" value="<?=$categoria?>">			
				<span class="titulo">Deixe seu comentário</span>
				<span class="subtitulo">Escreva o que você tem a dizer sobre essa noticia</span>
				<textarea cols="30" rows="10" name="mensagem" placeholder="Mensagem" id="mensagem"></textarea>
				<div class="formulario-comentario">
					<input placeholder="Nome" type="text" name="nome" id="nome">
					<input placeholder="Email" type="email" name="email" id="email">
					<input placeholder="Telefone" type="number" name="telefone" id="telefone">
				</div>
				<input type="submit" name="submit" class="form-control" id="botao-submit" value="COMENTAR">
				<div class="clear"></div>
			</form>
		</div>
		<div class="comentarios">
			<span class="comentarios-recentes">Comentários recentes</span>

			<?php 

			
			foreach ($comentarioAtual as $comentario):

				if($comentario['estado'] == "A"){ ?>

					<div class="imagem-usuario">
						<img src="img/usuario.png">
					</div>
					<span class="nome-usuario">
						<?=$comentario['nome']?>
					</span>
					<p class="texto-comentario">
						 <?= nl2br($comentario['comentario']);?>
					</p>
					<div class="clear"></div>											
					
			<?php 	} else  { ?>					
								
			<?php }
			endforeach ?>			
		</div>
		<div class="clear"></div>
		<h3 class="titulo-noticia">Noticias Relacionadas</h3>
		<div class="recentes">
			<div class="relacionadas">
			<?php foreach($noticiasRelacionadas as $noticia):
					include("funcaoData.php");
					if($noticia['id'] == $id){

					} else { ?>			 
				<div class="box-table">
					<div class="row-recentes">

					<?php if(!$noticia['imagem'] == ""){ ?>
						<div class="noticia-imagem">
							<div class="imagem">
								<a href="noticia.php?id=<?=$noticia['id']?>"><img src="<?=$noticia['imagem']?>"></a>
							</div>
						</div>

						<?php }else { ?>
						<div class="noticia-imagem">
							<div class="imagem">
								
							</div>													
						</div>
						<?php } ?>

						<h5><a href="noticia.php?id=<?=$noticia['id']?>"><?=$data?></a></h5>
				 		<h2><a title="<?=$noticia['titulo']?>" href="noticia.php?id=<?=$noticia['id']?>"><?=substr($noticia['titulo'],0,50)?>..</a></h2>				 		
					</div>		
				</div>
			<?php } endforeach;  ?>
			</div>
		</div>			
	</div>		
	<div class="banners">
		<a href="#"><img src="img/destaque.jpg"></a>
		<a href="#"><img src="img/destaque.jpg"></a>
		<a href="#"><img src="img/destaque.jpg"></a>
		<a href="#"><img src="img/destaque.jpg"></a>
		<a href="#"><img src="img/destaque.jpg"></a>
	</div>			
</div>
<?php require_once("rodape.php"); ?>