$(document).ready(function(){
	$("#formComentario").submit(function(){
		var mensagem = $("#mensagem").val();
		var nome = $("#nome").val();
		var email = $("#email").val();
		var telefone = $("#telefone").val();

		// $(".textoErro").remove();


		if(mensagem == ""){

			// var prox = $(this).parent().find("#mensagem");
			// var erro = $("<span>").addClass("textoErro").text("* Este campo é obrigatório");

			// prox.append(erro);
			alert("O campo mensagem é obrigatório");

			return false
		}



		if(nome == "") {

			// var prox = $(this).parent().find("#nome");
			// var erro = $("<span>").addClass("textoErro").text("* Este campo é obrigatório");

			// prox.append(erro);

			alert("O campo nome é obrigatório");

			return false
		}

	

		if((email === "") || (email.indexOf('@')===-1) || (email.indexOf('.')===-1)){


			// var prox = $(this).parent().find("#email");
			// var erro = $("<span>").addClass("textoErro").text("* Este campo é obrigatório");

			// prox.append(erro);

			alert("O campo email é obrigatório, por favor digite os campos corretamente");

			return false
		}

		if(telefone == ""){

			// var prox = $(this).parent().find("#telefone");
			// var erro = $("<span>").addClass("textoErro").text("* Este campo é obrigatório");

			// prox.append(erro);

			alert("O campo telefone é obrigatório");

		}

		
		alert("Seu comentario foi enviado com sucesso");
		return true;
		
	});
});