$(document).ready(function(){
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        autoplay:true,
        autoplayTimeout:2500
    });

    $('.botao-menu').click(function(){
    	$('.paginas').css({
    		right:0
    	});

    	$('.menu-topo-responsive-fechar').fadeIn();
    	
    	$('.menu-topo-responsive').fadeOut();
		
    	$('.sombra').addClass('active');  

	});

    $('.botao-menu-fechar').click(function(){
    	   	$('.paginas').css({
	    		right:"100%"
			});
			$('.menu-topo-responsive-fechar').fadeOut();	
	    
	      	$('.menu-topo-responsive').fadeIn();    			
	    	
	    	$(".sombra").removeClass('active');
	    	
		});

    $(".sombra").click(function(){
    	$('.paginas').css({
    		right:"100%"
		});
		$('.menu-topo-responsive-fechar').fadeOut();    

     	$('.menu-topo-responsive').fadeIn();
    	
    	$(".sombra").removeClass('active');	
	});

	$(".drop-down").click(function(){
		$(this).next().slideToggle(200);
	})
});