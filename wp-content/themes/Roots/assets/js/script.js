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

	// DISPLAY EVENT DETAIL ON SIDEBAR
	$('.event').on('click', function(){
		var event_id = $(this).data("id");
		console.log(event_id);

		var eventDisplay = function(event_id) {
			var event_id = event_id;
			$.ajax({
				url: "../wp-content/themes/roots/event_info.php",
				type: "POST",
				data: {
					eventParam : event_id
				},	
				// processData: false,
				contentType: "application/x-www-form-urlencoded",
				dataType: "json",
				success: function(data){
					console.log(event_id);
					console.log(data);
					$('#event-title').html(data.event_title);
					$('#event-img').attr('src', data.event_img);
					$('#event-type').html(data.event_type);
					$('#event-date').html(data.event_date);
					$('#event-start-time').html(data.event_start_time);
					$('#event-end-time').html(data.event_end_time);
					$('#event-location').html(data.event_location);
				},
				error: function() {
					console.log('nope' + event_id);
					console.log(typeof(event_id));
				}
			});
		};

		eventDisplay(event_id);
	});

	// EVENTS FILTER

	// DELETE REQUEST

	// DELETE EVENT

});