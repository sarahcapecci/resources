<?php 

global $current_user;
get_currentuserinfo(); 
$username = $current_user->display_name;

include 'calendar.php';

?>

<!-- LEFT side -->
<div class="left-side events">
	<h2>Collective Calendar <?php echo update_date($month, $year); ?></h2>
	<ul class="select-filter">
	    <li><a data-id="3" class="selected-opt event-filter black-link-b" href="<?php echo esc_url(home_url('/')); ?>">All Events</a> /</li>
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
	<div class="upcoming">
	<h2>Upcoming</h2>
	<label class="mobile-only" for="">Filter by month</label>
	<form action="#" method="POST" name="upcoming_filter" class="margin-bottom-20 mobile-only">
	<select name="month">
		<option value="1">January</option>
		<option value="2">February</option>
		<option value="3">March</option>
		<option value="4">April</option>
		<option value="5">May</option>
	</select>
	<input type="submit" name="submit" value="filter">
	</form>
	<?php 
	if(isset($_POST['submit'])){
		// IF MONTH FILTER IS SELECTED
		$selected_month = $_POST['month'];

		$connect = mysql_connect("localhost", "root", "root");
		mysql_select_db("resources", $connect);
		// Query the DB to a limit of 5 results
		$query = "SELECT * FROM wp_events WHERE MONTH(event_date) = $selected_month ";
		$result = mysql_query($query);

		// Displays the results as list items
		while($row = mysql_fetch_assoc($result)) {
				echo "<ul data-author='".$row['user_name']."'><li>" .$row['submitted_by']. "</li><li><h4><a class='event' href='#' data-id='". $row['id']."'>" . $row['event_title'] . "</a></h4></li>".
				     "<li><p>" .date('F j, Y', strtotime($row['event_date'])). "</p><p>" .date('h:i', strtotime($row['event_start_time'])). " - " .date('h:i A', strtotime($row['event_end_time'])). "</p></li>" .
				     "<li><p>" .$row['event_location'] . "<p></li></ul>";

				if($row['user_name'] == $username){
					echo "<button class='delete-event' data-id='" .$row['id']. "'>Delete</button>";
				}
		    
		}
		mysql_close();
	
	} else {
		// IF THERE'S NO FILTER
		$connect = mysql_connect("localhost", "root", "root");
		mysql_select_db("resources", $connect);
		// Query the DB to a limit of 5 results
		$query = "SELECT * FROM wp_events WHERE MONTH(event_date) = $month LIMIT 10";
		$result = mysql_query($query);

		// Displays the results as list items
		while($row = mysql_fetch_assoc($result)) {
				echo "<ul data-author='".$row['user_name']."'><li>" .$row['submitted_by']. "</li><li><h4>" . $row['event_title'] . "</h4></li>".
				     "<li><p>" .date('F j, Y', strtotime($row['event_date'])). "</p><p>" .date('h:i', strtotime($row['event_start_time'])). " - " .date('h:i A', strtotime($row['event_end_time'])). "</p></li>" .
				     "<li><p>" .$row['event_location'] . "<p></li></ul>";
				     if($row['user_name'] == $username){
				     	echo "<button class='delete-event' data-id='" .$row['id']. "'>Delete</button>";
				     }
		    
		}
		mysql_close();
	}

	
	?>
	<button id="show-all-upcoming">Show All</button>
	<div id="all-upcoming">
	<?php 
		$connect = mysql_connect("localhost", "root", "root");
		mysql_select_db("resources", $connect);
		// Query the DB to a limit of 5 results
		$query = "SELECT * FROM wp_events WHERE MONTH(event_date) = $month LIMIT 10, 20";
		$result = mysql_query($query);

		// Displays the results as list items
		while($row = mysql_fetch_assoc($result)) {
				echo "<ul data-author='".$row['user_name']."'><li>" .$row['submitted_by']. "</li><li><h4>" . $row['event_title'] . "</h4></li>".
				     "<li><p>" .date('F j, Y', strtotime($row['event_date'])). "</p><p>" .date('h:i', strtotime($row['event_start_time'])). " - " .date('h:i A', strtotime($row['event_end_time'])). "</p></li>" .
				     "<li><p>" .$row['event_location'] . "<p></li></ul>";
				     if($row['user_name'] == $user_name){
				     	echo "<button class='delete-event' data-id='" .$row['id']. "'>Delete request</button>";
				     }
		    
		}
		mysql_close();
		
	?>
	</div>
	</div>
	<button class="add-event margin-bottom-20"><i class="margin-right-5 fa fa-plus"></i>Add to Calendar</button>	
</div>
<!-- RIGHT side -->
<div class="right-side events">
<button class="add-event second"><i class="margin-right-5 fa fa-plus"></i>Add to calendar</button>
	<!-- Organizations List -->
	<div class="right-sidebar organizations">
		<h2>Explore events by <strong>Organization</strong></h2>
		<ul>
		<li><a class='filter_option' id="no-org-filter" href="#">Show All</a></li>
		<?php 
		$connect = mysql_connect("localhost", "root", "root");
		mysql_select_db("resources", $connect);
		// Query the DB to a limit of 5 results
		$query = "SELECT DISTINCT user_name FROM wp_events LIMIT 10";
		$result = mysql_query($query);

		// Displays the results as list items
		while($row = mysql_fetch_assoc($result)) {
				echo "<li><a class='filter_option' href='#'>" .$row['user_name']. "</a></li>";
		    
		}
		mysql_close();
		?>
		</ul>
	</div>
	<!-- SELECTED Event -->
	<div class="selected right-sidebar" id="selected-event">
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
		<button id="share-btn" class="share block">Share<i class="fa fa-share margin-left-5"></i></button>
		<div class="share-btn">
			<div class="inline-block fb-share-button" data-href="http://youthroundtable.ca/events" data-layout="button_count"></div>
			<a href="https://twitter.com/share" id="share-event-twitter" class="inline-block twitter-share-button" data-url="http://youthroundtable.ca/events" data-text="Check out this event!">Tweet</a>
		</div>
		<h4 class="text-al-center">Notes</h4>
		<p id="event-notes">Cupcake fruitcake bonbon unerdwear.com apple pie candy canes danish lollipop. Pastry muffin liquorice dessert.</p>
	</div>
	<!-- add an event form -->
	<div class="new-event right-sidebar" id="new-event">
		<form name="myform" method="POST" action="<?php echo get_template_directory_uri(); ?>/event_save.php" enctype="multipart/form-data">
			<input class="full title padding-left-none" type="text" name="event_title" placeholder="Add Title"/>
			<label class="margin-top-20 margin-bottom-20">Upload Image <input class="padding-left-none" type="file" name="event_img"></label>
			<label class="host block margin-bottom-20"><?php $avatar = get_avatar($current_user->ID, 32); echo $avatar; ?> Hosted by <?php echo $current_user->display_name; ?><input type="hidden" name="submitted_by" value="<?php echo htmlspecialchars($avatar) ?>"></label>
			<label class="block margin-top-10 text-al-center" for="event_type">Event Type</label>
			<select class="block def-width" name="event_type">
				<option value="0">Meeting</option>
				<option value="1">Socials</option>
				<option value="2">Fundraising</option>
			</select>
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
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>
window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));
</script>
