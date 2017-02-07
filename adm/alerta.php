<?php if(!isset($_SESSION)) {
     session_start();
} else	{
	
	}
	function mostraAlerta($tipo){
		if(isset($_SESSION[$tipo])){ ?>	
		<p class="alert-<?=$tipo ?>"><?=$_SESSION[$tipo]?></p>
	<?php unset($_SESSION[$tipo]);
	}	
} 
