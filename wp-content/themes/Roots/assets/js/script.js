$(document).ready(function(){

	// SIMPLE TOGGLE FUNCTIONS 

	$('#open-document').on('click', function(){
	  	$('.resource-modal.document').toggle();
	});

	$('#open-contacts').on('click', function(){
	  	$('.resource-modal.contact').toggle();
	});

	$('#open-links').on('click', function(){
	  	$('.resource-modal.links').toggle();
	});

	$('#new-request').on('click', function(){
	  	$('.request-modal').toggle();
	});

	$('#close-doc').on('click', function(){
	  	$('.resource-modal.document').toggle();
	});

	$('#close-link').on('click', function(){
	  	$('.resource-modal.links').toggle();
	});

	$('#close-contact').on('click', function(){
	  	$('.resource-modal.contact').toggle();
	});

	$('#close-request').on('click', function(){
	  	$('.request-modal').toggle();
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
		e.preventDefault();
		var clicked_tag = $(this).text();
		$('#tag-filter').val(clicked_tag);
		$('form.tag').submit();

	});

	// TAG SORT FUNCTIONS (ALPHABETICALLY OR MOST DOWNLOADED)
	$('#sort-down').on('click', function(e){
		e.preventDefault();
		$('#sort-alphabet').hide();
		$('#sort-download').show();
		$('#sort-alpha').removeClass('active');
		$(this).addClass('active');
	});
	$('#sort-alpha').on('click', function(e){
		e.preventDefault();
		$('#sort-download').hide();
		$('#sort-alphabet').show();
		$('#sort-down').removeClass('active');
		$(this).addClass('active');
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
		e.preventDefault();
		$('#events-feed').hide();
		$('#resources-feed').hide();
	});

	$('#no-filter-feed').on('click', function(e){
		e.preventDefault();
		$('#events-feed').show();
		$('#resources-feed').show();
	});

	// EVENTS FILTER

		// BY TYPE
	$('.event-filter').on('click', function(e){
		e.preventDefault();
		$('.event-filter').css('font-weight', '400');
		$(this).css('font-weight', '600');
		var eventType = $(this).data('id');
		
		$('.event').fadeOut();
		$("div[data-type='"+eventType+"']").fadeIn();

	});
		// BY ORGANIZATION

		$('.filter_option').on('click', function(e){
			e.preventDefault();
			var chosen_org = $(this).text();
			$('.filter_option').css('font-weight', '400');
			$(this).css('font-weight', '600');
			$('.event').fadeOut();
			$("div[data-author='"+chosen_org+"']").fadeIn();
			
			if($(this).attr('id') == "no-org-filter") {
				$('.event').fadeIn();
			}
		});
	// RESOURCES OVERLAY 
	$('.document-card').on('click', function(){
		var thisCard = $(this);
		thisCard.find(".overlay").toggle();
	});

	// DOWNLOAD COUNTER
	$('.download').on('click', function(){
		var thisDocument = $(this);

		var downloadIncrement = function() {
			var documentPath = thisDocument.attr('href');
			$.ajax({
				url: "../../wp-content/themes/Roots/download_counter.php",
				type: "POST",
				data: {
					document_path: documentPath
				},
				contentType: "application/x-www-form-urlencoded",
				dataType: "text",
				success: function(data){
					console.log(data);
				},
				error: function() {
					console.log("Sorry, there was an error.");
				}
			});
		};
		downloadIncrement();
	});

	// DELETE REQUEST

	$('.delete-request').on('click', function(){
		var thisRequest = $(this);
		var idRequest = thisRequest.data("id");


		var deleteRequest = function(idRequest) {
			$.ajax({
				url: "../resources/wp-content/themes/Roots/delete_request.php",
				type: "POST",
				data: {
					request_id: idRequest
				},
				contentType: "application/x-www-form-urlencoded",
				dataType: "text",
				success: function(data){
					console.log(data);
				},
				error: function() {
					console.log("Sorry, there was an error.");
				}
			});
		};
		deleteRequest(idRequest);
	});

	// DELETE EVENT

});