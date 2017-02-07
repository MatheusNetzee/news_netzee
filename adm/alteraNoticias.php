<?php require_once("cabecalho.php");
	require_once("bancoCategorias.php");
	require_once("bancoNoticias.php");
	
if(isset($_GET['id'])){
	$id = $_GET['id'];

}
else{
	$id = 'default'; 
}

$noticia = buscaNoticias($conexao, $id);
$assist = buscaAssist($conexao, $id);

?>	

<div class="container">
	<form method="POST" action="editaNoticias.php" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?=$noticia['id']?>">
		<table class="table text-right">
			<tr>
				<td>Titulo</td>
				<td><input class="form-control" type="text" name="titulo" value="<?=$noticia['titulo']?>"></td>
			</tr>
			<tr>
				<td>Subtitulo</td>
				<td><input class="form-control" type="text" name="subtitulo" value="<?=$noticia['subtitulo']?>"></td>
			</tr>
			<tr>
				<td>Data de Cadastro</td>
				<td><input class="form-control" type="date" name="dataCadastro" value="<?=$noticia['dataCadastro']?>"></td>
			</tr>
			
			<input type="text" name="dataEdicao" value="<?=date('d/m/Y H:i');?>">

			<tr>
				<td>Texto da Noticia</td>
				<td><textarea name="textoNoticia" class="form-control"><?=$noticia['textoNoticia']?></textarea></td>
			</tr>	

			<tr>
				<td>Imagem</td>
				<td>
					<?php if($noticia['imagem'] == "") { ?>
						<label class="form-control text-left">Noticia sem imagem</label>
					<?php } else { ?>
						<label class="form-control text-left" for="imagem"><?=$noticia['imagem'];?></label>
				<?php 	} ?>
					<input class="form-control" type="file" name="imagem">
				
				</td>
			</tr>
			<tr>
				<td>Destaque</td>
				<td class="text-left">
				<?php if($noticia['destaque'] == 'S') { ?>
					<label class="radio-inline"><input type="radio" name="destaque" checked value="S">Destaque</label>
					<label class="radio-inline"><input type="radio" name="destaque" value="N">Nao Destaque</label>
				<?php } else { ?>
					<label class="radio-inline"><input type="radio" name="destaque" value="S">Destaque</label>
					<label class="radio-inline"><input type="radio" name="destaque" checked value="N">Nao Destaque</label>
				<?php } ?>
				</td>				
			</tr>
			<tr>
				<td>Categorias</td>
					<td>
						<?php 				

					 	foreach(listaCategorias($conexao) as $categoria):						 						 	 					 	 
		 			 		// $categoriaSelecionada = ;
					 		$check = $categoria['id'] == $assist['id'] ? " checked='checked' " : "" ;
						?>
						 <div class="input-group">
      						<span class="input-group-addon">
								<input type="checkbox" name="categoria_id[]"  value="<?=$categoria['id']?>" <?=$check?>>
							</span>
							<input type="text" class="form-control" disabled style="background-color:#fff;" value="<?=$categoria['nome']?>">
						</div>
				
					<?php endforeach?>
				</td>
			</tr>
			<tr>
				<td>
					<button class="btn btn-primary"">Alterar Notícia</button>
					<!-- <input class="btn btn-primary" type="submit" name="submit" value="Alterar Notícia"> -->
				</td>
			</tr>
		</table>
	</form>
</div>

<?php include("rodape.php");?>