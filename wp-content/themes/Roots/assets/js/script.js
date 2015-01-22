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

	$('#new-request').on('click', function(){
	  	$('.request-modal').toggle();
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

	$('#close-request').on('click', function(){
	  	$('.request-modal').toggle();
	  	// $('body.page').css('opacity', '0.3');
	});

	$('.respond-request').on('click', function(e){
		e.preventDefault();
		var clicked = $(this);
		var request_id = clicked.data("id");
	  	$('#request-' + request_id).toggle();
	});

	$('.close-response').on('click', function(e){
		e.preventDefault();
		$('.response-modal').hide();
	});
});