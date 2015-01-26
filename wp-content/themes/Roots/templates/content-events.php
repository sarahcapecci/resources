<?php 

global $current_user;
get_currentuserinfo(); 
$username = $current_user->display_name;

include 'calendar.php';

?>

<!-- LEFT side -->
<div class="left-side events">
	<h2>Collective Calendar <?php echo date('F',$month); ?></h2>
	<ul class="select-filter">
	    <li><a data-id="3" class="event-filter black-link-b" href="<?php echo esc_url(home_url('/')); ?>">All Events</a> /</li>
	    <li class="middle-gray-txt">Show Only</li>
	    <li><a data-id="0" class="event-filter blue-link-b" href="#">Meetings |</a></li>
	    <li><a data-id="1" class="event-filter blue-link-b" href="#">Socials |</a></li>
	    <li><a data-id="2" class="event-filter blue-link-b" href="#">Fundraisers</a></li>
	</ul>
	
	
	<!-- pagination -->
	<div class="calendar-pagination text-al-right">
		<?php echo $controls; ?>
	</div>
	<!-- Calendar -->
	<!-- event list is a repeater that displays events in that certain date -->
	<div id="calendar">
		<?php echo draw_calendar($month,$year,$events); ?>
	</div>
	
	<?php 
	$connect = mysql_connect("localhost", "root", "root");
	mysql_select_db("resources", $connect);
	// Query the DB to a limit of 5 results
	$query = "SELECT * FROM wp_events LIMIT 7";
	$result = mysql_query($query);

	// Displays the results as list items
	while($row = mysql_fetch_assoc($result)) {
			echo "<div class='upcoming'><ul><li>" .$row['submitted_by']. "</li><li><h4>" . $row['event_title'] . "</h4></li>".
			     "<li><p>" .date('F j, Y', strtotime($row['event_date'])). "</p><p>" .date('h:i', strtotime($row['event_start_time'])). " - " .date('h:i A', strtotime($row['event_end_time'])). "</p></li>" .
			     "<li><p>" .$row['event_location'] . "<p></li></ul></div>";
	    
	}
	mysql_close();
	?>
	
	<button class="add-event margin-bottom-20"><i class="margin-right-5 fa fa-plus"></i>Add to Calendar</button>	
</div>
<!-- RIGHT side -->
<div class="right-side events">
<button class="add-event"><i class="margin-right-5 fa fa-plus"></i>Add to calendar</button>
	<!-- Organizations List -->
	<div class="right-sidebar organizations">
		<h2>Explore events by <strong>Organization</strong></h2>
		<ul>
		<?php 
		$connect = mysql_connect("localhost", "root", "root");
		mysql_select_db("resources", $connect);
		// Query the DB to a limit of 5 results
		$query = "SELECT DISTINCT user_name FROM wp_events";
		$result = mysql_query($query);

		// Displays the results as list items
		while($row = mysql_fetch_assoc($result)) {
				echo "<li>" .$row['user_name']. "</li>";
		    
		}
		mysql_close();
		?>
		</ul>
	</div>
	<!-- SELECTED Event -->
	<div class="selected right-sidebar">
		<h2 id="event-title">RYR Executive Meeting</h2>
		<img id="event-img" class="event" src="" alt="Event Image" />
		<span class="host"><span id="user-avatar"></span> Hosted by <span id="user-name"></span></span>
		<h5 id="event-type" class="font-light"></h5>
		<p id="event-date"></p>
		<p><span id="event-start-time"></span> - <span id="event-end-time"></span></p>
		<p id="event-location"></p>
		<!-- social -->
		<section>
			<a id="eventbrite-link" href="" target="_blank"><img class="margin-right-5 small" src="<?php echo get_template_directory_uri(); ?>/assets/img/eventbrite.png" alt="Eventbrite Icon">Eventbrite Registration Page</a>
			<a id="facebook-link" href="" target="_blank"><img class="margin-right-5 small" src="<?php echo get_template_directory_uri(); ?>/assets/img/facebook.png" alt="Facebook Icon">Facebook Event</a>
		</section>
		<button class="share block"><i class="fa fa-share"></i>Share</button>
		<h4 class="text-al-center">Notes</h4>
		<p id="event-notes">Cupcake fruitcake bonbon unerdwear.com apple pie candy canes danish lollipop. Pastry muffin liquorice dessert.</p>
	</div>
	<!-- add an event form -->
	<div class="new-event right-sidebar">
		<form name="myform" method="post" action="<?php echo get_template_directory_uri(); ?>/event_save.php" enctype="multipart/form-data">
			<input class="full title padding-left-none" type="text" name="event_title" placeholder="Add Title"/>
			<label class="margin-top-20 margin-bottom-20">Upload Image <input class="padding-left-none" type="file" name="event_img"></label>
			<label class="host block margin-bottom-20"><?php $avatar = get_avatar($current_user->ID, 32); echo $avatar; ?> Hosted by <?php echo $current_user->display_name; ?><input type="hidden" name="submitted_by" value="<?php echo htmlspecialchars($avatar) ?>"></label>
			<label class="block margin-top-10 text-al-center" for="">Event Type</label>
				<input type="radio" name="event_type" value="0">
				Meeting
				<input type="radio" name="event_type" value="1">
				Socials
				<input type="radio" name="event_type" value="2">
				Fundraising
			<label class="centered block text-al-center margin-top-20">Date <input class="def-width centered input-opac" type="date" name="event_date"></label>
			<label class="centered block text-al-center margin-top-10" for="">Start Time<input class="def-width centered input-opac" type="time" name="event_start_time"></label>
			<label class="centered block text-al-center margin-top-10" for="">End Time<input class="def-width centered input-opac" type="time" name="event_end_time"></label>
			<input class="def-width margin-top-20 margin-bottom-10 location centered input-opac" placeholder="Add Event Location" type="text" name="event_location">

			<label class="social-share block text-al-center" for=""><img class="margin-right-5" src="<?php echo get_template_directory_uri(); ?>/assets/img/eventbrite.png" alt=""><input class="larger centered margin-top-5 input-opac" placeholder="Registration URL" type="url" name="eventbrite_url"></label>
			<label class="social-share block text-al-center" for=""><img class="margin-right-5" src="<?php echo get_template_directory_uri(); ?>/assets/img/facebook.png" alt=""><input class="larger centered margin-top-5 margin-bottom-20 input-opac" placeholder="Event Page URL" type="url" name="facebook_url"></label>
			<input type="submit" name="submit" value="Add Event" />
			<input type="hidden" name="user_name" value="<?php echo $username; ?>">
			<section>
				<h4 class="text-al-center">Notes</h4>
				<textarea class="larger input-opac" placeholder="Add additional details here. They will be shown only for Members. Example: Special share instructions, discount codes, reminders to other organizations" name="event_notes"></textarea>
			</section>
		</form>
	</div>
</div>