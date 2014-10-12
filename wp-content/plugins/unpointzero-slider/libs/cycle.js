jQuery(function ($) {
$(document).ready(function(){  

	$('#featured').cycle({
		fx: 'scrollHorz',
		timeout: 6000, 
		delay:  -2000,
		next:   '#nextslide', 
		prev:   '#previousslide'
	});
	
	$('#featured-navi').css({width:$("#featured").css("width"),height:$("#featured").css("height")});
			
})
});