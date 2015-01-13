$(document).ready(function(){
	$('#open-document').on('click', function(){
	  	$('.resource-modal.document').toggle();
	  	// $('body.page').css('opacity', '0.3');
	});

	$('#open-contacts').on('click', function(){
	  	$('.resource-modal.contact').toggle();
	  	// $('body.page').css('opacity', '0.3');
	});

	$('#open-links').on('click', function(){
	  	$('.resource-modal.links').toggle();
	  	// $('body.page').css('opacity', '0.3');
	});

	$('#close-doc').on('click', function(){
	  	$('.resource-modal.document').toggle();
	  	// $('body.page').css('opacity', '0.3');
	});

	$('#close-link').on('click', function(){
	  	$('.resource-modal.links').toggle();
	  	// $('body.page').css('opacity', '0.3');
	});

	$('#close-contact').on('click', function(){
	  	$('.resource-modal.contact').toggle();
	  	// $('body.page').css('opacity', '0.3');
	});
});