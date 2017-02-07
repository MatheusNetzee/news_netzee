<?php setlocale(LC_ALL, 'pt_BR', "pt_BR.utf-8", 'portuguese'); 
	date_default_timezone_set('America/Sao_Paulo'); 
	$data =  strftime('%d de %B de %Y', strtotime($noticia['dataCadastro']));


	// $data = "2017-01-02";

	// function transformaData($data) {

	// 	$stringAno = substr($data, 0, 4);
	// 	$stringMes = substr($data, 5, 2);
	// 	$stringDia = substr($data, 8, 2);

	// 	$resultado = $stringDia."/".$stringMes."/".$stringAno;

	// 	return $resultado;
	// }