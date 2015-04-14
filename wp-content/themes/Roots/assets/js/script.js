$(document).ready(function(){

	// BULETTIN ORGANIZATION
	$('#request-filter-feed').on('click', function(e){
		e.preventDefault();
		$('#events-feed').hide();
		$('#resources-feed').hide();
		$('#requests-feed').show();
	});

	$('#resources-filter-feed').on('click', function(e){
		e.preventDefault();
		$('#events-feed').hide();
		$('#requests-feed').hide();
		$('#resources-feed').show();
	});

	$('#event-filter-feed').on('click', function(e){
		e.preventDefault();
		$('#events-feed').show();
		$('#resources-feed').hide();
		$('#requests-feed').hide();
	});

	$('#no-filter-feed').on('click', function(e){
		e.preventDefault();
		$('#events-feed').show();
		$('#resources-feed').show();
		$('#requests-feed').show();
	});

	// PIN A REQUEST
	$('.pin-request').on('click', function(){
		var requestId = $(this).data("id");
		var pinned = $(this).data("pinned");

		var pinRequest = function(requestId) {
			$.ajax({
				url: "wp-content/themes/Roots/pin_request.php",
				type: "POST",
				data: {
					requestParam : requestId,
					operation: 1
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

		var unpinRequest = function(requestId) {
			$.ajax({
				url: "wp-content/themes/Roots/pin_request.php",
				type: "POST",
				data: {
					requestParam : requestId,
					operation: 2
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

		// 1 - pinned, 0 - unpinned
		if(pinned == 1) {
			unpinRequest(requestId);
		} else if (pinned == 0) {
			pinRequest(requestId);
		}
	});

	// DOCUMENTS
	$('.show-all').on('click', function(){
		var thisButton = $(this);
	  	$('.show-all-files').toggle();
	  	if(thisButton.html() == "Show All"){
	  		thisButton.html("Show Less");
	  	} else {
	  		thisButton.html("Show All");
	  	}
	});

	// LINKS
	$('.link-filter').on('click', function(){
		var filterType = $(this).data("filter");
		$('.link-section').hide();
		$('#'+ filterType + '-sec').show();
	});

	$('#sort-popular').on('click', function(e){
		e.preventDefault();
		$('#popular-sorted').show();
		$('#recent-sorted').hide();
	});
	$('#sort-recent').on('click', function(e){
		e.preventDefault();
		$('#popular-sorted').hide();
		$('#recent-sorted').show();
	});

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
	  	// this request information
	  	var senderEmail = $("#request_sender_"+request_id).val();
	  	var requestSubject = $("#request_name_"+request_id).val();

	  	// insert information into input
	  	$('#request-' + request_id).find('.send_to').val(senderEmail);
	  	$('#request-' + request_id).find('.request_title').val(requestSubject);

	});

	$('.close-response').on('click', function(e){
		e.preventDefault();
		$('.response-modal').hide();
	});

	$('.add-event').on('click', function(){
		$('.selected').hide();
		$('.organizations').hide();
		$('.new-event').show();
		if($(window).width() < 400) {
			//scroll down if mobile
			$('body').animate({
			    scrollTop: $('#new-event').offset().top
			}, 2000);

		} else {
			//scroll up if not mobile
			$('body').animate({
			    scrollTop: 100
			}, 2000);
		}

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

	// event display function
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
				$('.selected').show();
				$('#event-title').html(data.event_title);
				$('#event-img').css('background-image', "url(" + data.event_img + ")");
				$('#user-avatar').html(data.event_submitted_by);
				$('#user-name').html(data.user_name);
				$('#event-date').html(data.event_date);
				$('#event-start-time').html(data.event_start_time);
				$('#event-end-time').html(data.event_end_time);
				$('#event-location').html(data.event_location);
				$('#event-notes').html(data.event_notes);
				$('#event-id-locator').html(event_id);

				if(data.eventbrite_url) {
					$('#eventbrite-link').attr('href', data.eventbrite_url);
				} else {
					$('#eventbrite-link').hide();
				}

				if(data.facebook_url) {
					$('#facebook-link').attr('href', data.facebook_url);
				} else {
					$('#facebook-link').hide();
				}
				

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

				// show and hide divs
				$('.new-event').hide();
				$('.organizations').hide();

				
				// screen positioning
				if($(window).width() < 400) {
					//scroll down if mobile
					$('body').animate({
					    scrollTop: $('#selected-event').offset().top
					}, 2000);

				} else {
					//scroll up if not mobile
					$('body').animate({
					    scrollTop: 100
					}, 2000);
				}
			},
			error: function() {
				console.log("Sorry, there was an error.");
			}
		});
	};

	// URL PARSER
	function getUrlVars() {
	    var vars = [], hash;
	    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
	    
	    for (var i = 0; i < hashes.length; i++) {
	        hash = hashes[i].split('=');
	        vars.push(hash[0]);
	        vars[hash[0]] = hash[1];
	    }
	    return vars.eventid;
	};


	// DISPLAY EVENT DETAIL ON SIDEBAR
	$('.event').on('click', function(){
		var event_id = $(this).data("id");
		eventDisplay(event_id);

	});

	// Display event by URL
	if(getUrlVars() != undefined) {
		var eventIdNumber = getUrlVars();
		eventDisplay(eventIdNumber);
	}
	

	// EVENTS FILTER

		// BY TYPE
	$('.event-filter').on('click', function(e){
		e.preventDefault();
		$('.event-filter').removeClass('selected-opt');
		$(this).addClass('selected-opt');
		var eventType = $(this).data('id');
		
		if(eventType == 3) {
			$('.event').fadeIn();
		} else {
		$('.event').fadeOut();
		$("div[data-type='"+eventType+"']").fadeIn();
		}

	});
		// BY ORGANIZATION

		$('.filter_option').on('click', function(e){
			e.preventDefault();
			var chosen_org = $(this).text();
			$('.filter_option').css('font-weight', '400');
			$(this).css('font-weight', '600');
			$('div.event').fadeOut(); //inside calendar
			$("div[data-author='"+chosen_org+"']").fadeIn();

			$('.upcoming ul').fadeOut(); // upcoming lines
			$("ul[data-author='"+chosen_org+"']").fadeIn();

			if($(this).attr('id') == "no-org-filter") {
				$('.event').fadeIn();
				$('.upcoming ul').fadeIn();
			}
		});

		// UPCOMING EVENTS SHOW ALL
		$('#show-all-upcoming').on('click', function(){
			$('#all-upcoming').show();
		});


	// RESOURCES OVERLAY 
	$('.document-card').on('click', function(){
		var thisCard = $(this);
		thisCard.find(".overlay").toggle();
	});

	// ADD USER AVATAR ON WPCF DB
	$('.wpcf7-form').submit(function(){
		var avatar = $('#avatar-value').find('img').attr('src');
		$('.hidden-avatar').val(avatar);
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

	// Link Popularity Increment

	$('.resource-link').on('click', function(){
		var linkId = $(this).data("id");

		var clickIncrement = function(linkId) {
			$.ajax({
				url: "../../wp-content/themes/Roots/link_increment.php",
				type: "POST",
				data: {
					linkId: linkId
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
		clickIncrement(linkId);
	});

	

	$('#share-btn').on('click', function(){
		$('.share-btn').toggle();
		// SHARE EVENT ON FB OR TWITTER
		
		// TWITTER
		window.twttr = (function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));

		var eventIdentification = $('#event-id-locator').html();  
		var oldUrl = 'http://youthroundtable.ca/events/?eventid=' + eventIdentification;
		var encodedUrl = encodeURIComponent(oldUrl);
		$('.twitter-share-button').attr('href', 'https://twitter.com/intent/tweet?url=' + encodedUrl);

		function FBshare(){
		  shareURL = encodedUrl;
		  console.log(shareURL);
		  window.open(
		     'https://www.facebook.com/sharer/sharer.php?u='+shareURL, 
		     'facebook-share-dialog', 
		     'width=626,height=436'); 
		  return false;
		}


		$(".facebook").bind("click", function(){
		   FBshare();
		});
		
	});

	// delete event

	$('.delete-event').on('click', function(){
		var thisEvent = $(this);
		var idEvent = thisEvent.data("id");


		var deleteEvent = function(idEvent) {
			$.ajax({
				url: "../wp-content/themes/Roots/delete_event.php",
				type: "POST",
				data: {
					event_id: idEvent
				},
				contentType: "application/x-www-form-urlencoded",
				dataType: "text",
				success: function(data){
					$('[data-event-id=' + idEvent + ']').hide();
					thisEvent.hide();
				},
				error: function() {
					console.log("Sorry, there was an error.");
				}
			});
		};
		deleteEvent(idEvent);
	});

});