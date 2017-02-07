	<div class="clear"></div>
	<footer>
		<div class="container">
			<div class="logo-rodape">
				<a href="index.php"><img src="img/logonetzee-branco.png" alt="logo-netzee"></a>	
				<div class="drop-down">
					<span class="texto-drop-down">Menu</span>
					<img src="img/angle-arrow-down.svg" alt="">
				</div>			
				<ul>					
					<li><a href="index.php">Home</a></li>
					<?php  foreach(listaCategorias($conexao) as $categoria):?>
					<li><a href="categoria.php?id=<?=$categoria['id']?>"><?=$categoria['nome']?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="clear"></div>
			<div class="texto-rodape">
				<div class="texto-copy">
					<span> &copy; Copyright 2016 - Todos os direitos reservados.</span>
				</div>

				<div class="design">
					<span>Design por: </span><a target="_blank" href="https://www.netzee.com.br/"><img src="img/logo-design.png"></a>
				</div>				
			</div>			
		</div>		
	</footer>	
	<script src="js/script.js"></script>
	<script src="js/validacaoCadastroEmail.js"></script>
	<script src="js/validacaoComentario.js"></script>	
	</body>
</html>