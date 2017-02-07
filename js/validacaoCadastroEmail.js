$(document).ready(function(){
	$("#formEmail").submit(function(){
		var nome = $("#eNome").val();
		var email = $("#eEmail").val();

		if(nome == ""){

			alert("O campo nome é obrigatório");

			return false
		}

		if((email === "") || (email.indexOf('@')===-1) || (email.indexOf('.')===-1)){

			alert("O campo email é obrigatório, por favor digite os campos corretamente");

			return false
		}

		alert("Seu email foi cadastrado com sucesso");
		return true;
	});
});