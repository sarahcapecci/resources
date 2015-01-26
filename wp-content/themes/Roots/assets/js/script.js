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

	$('.add-event').on('click', function(){
		$('.selected').hide();
		$('.organizations').hide();
		$('.new-event').show();
	});

	// TAG FILTER ON RESOURCES - DOCUMENTS
	$('.filter-option').on('click', function(e){
		e.preventDefault;
		var clicked_tag = $(this).text();
		$('#tag-filter').val(clicked_tag);
		$('form.tag').submit();

	});

	// DISPLAY EVENT DETAIL ON SIDEBAR
	$('.event').on('click', function(){
		var event_id = $(this).data("id");
		$('.new-event').hide();
		$('.organizations').hide();
		$('.selected').show();

		var eventDisplay = function(event_id) {
			$.ajax({
				url: "../wp-content/themes/roots/event_info_by_event.php",
				type: "POST",
				data: {
					eventParam : event_id
				},
				contentType: "application/x-www-form-urlencoded",
				dataType: "json",
				success: function(data){
					console.log("hello");
					$('#event-title').html(data.event_title);
					$('#event-img').attr('src', data.event_img);
					$('#user-avatar').html(data.event_submitted_by);
					$('#user-name').html(data.user_name);
					$('#event-date').html(data.event_date);
					$('#event-start-time').html(data.event_start_time);
					$('#event-end-time').html(data.event_end_time);
					$('#event-location').html(data.event_location);
					$('#eventbrite-link').attr('href', data.eventbrite_url);
					$('#facebook-link').attr('href', data.facebook_url);
					$('#event-notes').html(data.event_notes);

					// Event Type - Meeting, Socials, Fundraising
					if(data.event_type == 0) {
						$('#event-type').html("Meeting");	
					} else if (data.event_type == 1) {
						$('#event-type').html("Social");
					} else if (data.event_type == 2){
						$('#event-type').html("Fundraising");
					} else {
						$('#event-type').html("Event");
					}
				},
				error: function() {
					console.log("Sorry, there was an error.");
				}
			});
		};
		eventDisplay(event_id);
	});
	
	// SHOW ONLY REQUESTS ON FEED

	$('#request-filter').on('click', function(e){
		e.preventDefault;
		$('#events-feed').hide();
		$('#resources-feed').hide();
	});

	$('#no-filter-feed').on('click', function(e){
		e.preventDefault;
		$('#events-feed').show();
		$('#resources-feed').show();
	});

	// EVENTS FILTER

	$('.event-filter').on('click', function(e){
		e.preventDefault;
		var eventType = $(this).data('id');
		var eventsArray = $('.event');
		// console.log(eventsArray);


		if (eventType == 0) {
			console.log("Meetings");
			
			for (i = 0; i < eventsArray.length; i++) {
				// if(eventsArray[i].data('type') != eventType) {
				// 	console.log('different');
				// }
			}

		} else if (eventType == 1) {
			console.log("socials");
		} else if (eventType == 2) {
			console.log("fundraising");
		} else {
			return false;
		}

	});

	// DELETE REQUEST

	// DELETE EVENT

});