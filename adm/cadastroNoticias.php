<?php require_once("cabecalho.php");
	require_once("bancoCategorias.php");
		
verificaUsuario();


$noticia = array("titulo" => "", "subtitulo" => "" , "dataCadastro" => "", "textoNoticia" => "" , "imagem" => "");

$assist = array("categoria_id" => "");

?>	

<div class="container">
	<form method="POST" action="adicionaNoticias.php" enctype="multipart/form-data">
		<table class="table text-right">
			<tr>
				<td>Titulo</td>
				<td><input class="form-control" type="text" name="titulo" value="<?=$noticia['titulo'];?>"></td>
			</tr>
			<tr>
				<td>Subtitulo</td>
				<td><input class="form-control" type="text" name="subtitulo" value="<?=$noticia['subtitulo'];?>"></td>
			</tr>
			<tr>
				<td>Data de Cadastro</td>
				<td><input class="input-group date" type="date" name="dataCadastro" value="<?=$noticia['dataCadastro'];?>"></td>
			</tr>
			
			<tr>
				<td>Texto da Noticia</td>
				<td>
					<textarea class="form-control" cols="30" rows="10" id="plugin" name="textoNoticia"><?=$noticia['textoNoticia']?></textarea>
				</td>
			</tr>
			<tr>
				<div class="form-group">
					<td>Imagem</td>
					<td><input class type="file" name="imagem" size="60"></td>
				</div>
			</tr>
			<tr>
				<td>Destaque</td>
				<td class="text-left">
					<label class="radio-inline"><input type="radio" name="destaque" value="S">Destaque</label>
					<label class="radio-inline"><input type="radio" name="destaque" checked value="N">Nao Destaque</label>
				</td>				
			</tr>
			<tr>
				<td>Categorias</td>
				<td>
					<?php 									
					 foreach(listaCategorias($conexao) as $categoria):
						$assist['categoria_id'] == $categoria['id'];?>
						
						 <div class="input-group">
      						<span class="input-group-addon">
								<input type="checkbox" name="categoria_id[]" value="<?=$categoria['id']?>">
							</span>
							<input type="text" class="form-control" disabled style="background-color:#fff;" value="<?=$categoria['nome']?>">
						</div>
				
					<?php endforeach;  ?>
					
				</td>
			</tr>
			<tr>
				<td>
					<button class="btn btn-primary">Cadastrar Notícia</button>
				</td>
			</tr>
		</table>
	</form>
</div>

<?php include("rodape.php");?>