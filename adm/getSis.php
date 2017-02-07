<?php 


	function getHome(){
		$url = $_GET['url'];
		$url = explode('/' $url);
		$url[0] = ($url[0] == NULL ? 'index' : $url[0]);


		if(file_exists('tpl/'. $url[0];'.php')){
			require_once('tlp/'.$url[0.'.php']);
		}elseif(file_exists('tlp/'.$url[0].'/'.$url[1].'.php')){
			require_once('tlp/'.$url[0].'/'.$url[1].'.php');
		}else{
			require_once('tpl/404.php');
		}

	}