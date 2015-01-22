<?php 

global $current_user;
get_currentuserinfo();

/* draws a calendar */
function draw_calendar($month,$year, $events = array()){

	/* draw table */
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

	/* table headings */
	$headings = array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

	/* days and weeks vars now ... */
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	/* row for week one */
	$calendar.= '<tr class="calendar-row-day">';

	/* print "blank" days until the first of the current week */
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td class="calendar-day-np"> </td>';
		$days_in_this_week++;
	endfor;

	/* keep going with days.... */
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		$calendar.= '<td class="calendar-day">';
			/* add in the day number */
			$calendar.= '<div class="day-number">'.$list_day.'</div>';

			/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY  **/
			$event_day = $year.'-'.$month.'-'.$list_day;
			$right_date = date('Y-m-d',strtotime($event_day));
			if(isset($events[$right_date])) {
				foreach($events[$right_date] as $event) {
					$calendar.= '<div class="event">'.$event['event_title']. $event['event_img'].'</div>';
				}
			}
			else {
				$calendar.= str_repeat("<p></p>",2);

			}
			
		$calendar.= '</td>';
		if($running_day == 6):
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="calendar-row-day">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;

	/* finish the rest of the days in the week */
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendar-day-np"> </td>';
		endfor;
	endif;

	/* final row */
	$calendar.= '</tr>';

	/** DEBUG **/
		$calendar = str_replace('</td>','</td>'."\n",$calendar);
		$calendar = str_replace('</tr>','</tr>'."\n",$calendar);

	/* end the table */
	$calendar.= '</table>';
	
	/* all done, return result */
	return $calendar;
}

//events query

/* get all events for the given month */
$events = array();

$db_link = mysql_connect("localhost", "root", "root");
mysql_select_db("resources", $db_link);

$query = "SELECT event_title, event_date FROM wp_events";

$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_assoc($result)) {
	$events[$row['event_date']][] = $row;	
}


// CONTROLS

/* date settings */
$month = (int) ($_GET['month'] ? $_GET['month'] : date('m'));
$year = (int)  ($_GET['year'] ? $_GET['year'] : date('Y'));

/* select month control */
$select_month_control = '<select name="month" id="month">';
for($x = 1; $x <= 12; $x++) {
	$select_month_control.= '<option value="'.$x.'"'.($x != $month ? '' : ' selected="selected"').'>'.date('F',mktime(0,0,0,$x,1,$year)).'</option>';
}
$select_month_control.= '</select>';

/* select year control */
$year_range = 7;
$select_year_control = '<select name="year" id="year">';
for($x = ($year-floor($year_range/2)); $x <= ($year+floor($year_range/2)); $x++) {
	$select_year_control.= '<option value="'.$x.'"'.($x != $year ? '' : ' selected="selected"').'>'.$x.'</option>';
}
$select_year_control.= '</select>';

/* "next month" control */
$next_month_link = '<a href="?month='.($month != 12 ? $month + 1 : 1).'&year='.($month != 12 ? $year : $year + 1).'" class="control"><span><i class="fa fa-angle-double-right"></i></span></a>';

/* "previous month" control */
$previous_month_link = '<a href="?month='.($month != 1 ? $month - 1 : 12).'&year='.($month != 1 ? $year : $year - 1).'" class="control"><i class="fa fa-angle-double-left"></i></a>';

/* bringing the controls together */
$controls = '<form method="get">' .$previous_month_link.'  Month   '.$next_month_link.' </form>';


    


?>

<!-- LEFT side -->
<div class="left-side events">
	<h2>Collective Calendar </h2>
	<ul class="select-filter">
	    <li><a class="black-link-b" href="<?php echo esc_url(home_url('/')); ?>">All Events</a> /</li>
	    <li class="middle-gray-txt">Show Only</li>
	    <li><a class="blue-link-b" href="<?php echo esc_url(home_url('/')); ?>events">Meetings |</a></li>
	    <li><a class="blue-link-b" href="<?php echo esc_url(home_url('/')); ?>requests/">Socials |</a></li>
	    <li><a class="blue-link-b" href="<?php echo esc_url(home_url('/')); ?>resources/">Fundraisers</a></li>
	</ul>
	<!-- Assets showing according to filter -->
	<div class="request-modal all-modal">
		<h4>Post a request to the bulletin for all RYR members to see and reply to.</h4>
		<?php echo do_shortcode('[contact-form-7 id="53" title="Create Request"]'); ?>
		<button id="close-request">Close</button>
	</div>
	
	<!-- pagination -->
	<div class="calendar-pagination">
		<?php echo $controls; ?>
		<!-- <span><i class="fa fa-angle-double-left"></i></span>
		<h5 class="inline-block">Weeks</h5>
		<span><i class="fa fa-angle-double-right"></i></span> -->
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
			     "<li><p>" .date('F j, Y', strtotime($row['event_date'])). "</p><p>" .date('h:i A', $row['event_start_time']). " - " .date('h:i A', $row['event_end_time']). "</p></li>" .
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
<!-- 	<div>
		<h2>Explore events by <strong>Organization</strong></h2>
		<ul>
		    <li>Organization 1</li>
		    <li>Organization 1</li>
		    <li>Organization 1</li>
		    <li>Organization 1</li>
		</ul>
	</div> -->
	<!-- SELECTED Event -->
	<div class="selected right-sidebar">
		<h2>RYR Executive Meeting</h2>
		<img class="event" src="<?php echo get_template_directory_uri(); ?>/assets/img/default-calendar.jpg" alt="" />
		<?php echo get_avatar(get_the_author_meta( 'ID' ), 32); ?> <span class="margin-left-5">Hosted by Regional Youth Roundtable</span>
		<h5 class="font-light">Type of Event</h5>
		<p>Thursday, February 1, 2015</p>
		<p>3:30 PM - 7 PM</p>
		<p>Mississauga City Hall</p>
		<!-- social -->
		<section>
			<p><img class="margin-right-5 small" src="<?php echo get_template_directory_uri(); ?>/assets/img/eventbrite.png" alt="">Eventbrite Registration Page</p>
			<p><img class="margin-right-5 small" src="<?php echo get_template_directory_uri(); ?>/assets/img/facebook.png" alt="">Facebook Event</p>
		</section>
		<h4 class="text-al-center">Notes</h4>
		<p>Cupcake fruitcake bonbon unerdwear.com apple pie candy canes danish lollipop. Pastry muffin liquorice dessert.</p>
	</div>
	<!-- add an event form -->
	<div class="new-event right-sidebar">
		<form name="myform" method="post" action="<?php echo get_template_directory_uri(); ?>/event_save.php" enctype="multipart/form-data">
			<input type="text" name="event_title" placeholder="Add Title"/>
			<label>Upload Image <input type="file" name="event_img"></label>
			<label><?php $avatar = get_avatar($current_user->ID, 32); echo $avatar; ?> Hosted by <?php echo $current_user->display_name; ?><input type="hidden" name="submitted_by" value="<?php echo htmlspecialchars($avatar) ?>"></label>
			<input type="radio" name="event_type" value="0">
			Meeting
			<input type="radio" name="event_type" value="1">
			Socials
			<input type="radio" name="event_type" value="2">
			Fundraising
			<label>Date <input type="date" name="event_date"></label>
			<input placeholder="Start Time" type="time" name="event_start_time">
			<input placeholder="End Time" type="time" name="event_end_time">
			<input placeholder="Location" type="text" name="event_location">
			<label for="">Eventbrite<input class="input-opac" placeholder="Registration URL" type="url" name="eventbrite_url"></label>
			<label for="">Facebook<input class="input-opac" placeholder="Event Page" type="url" name="facebook_url"></label>
			<input type="submit" name="submit" value="Add Event" />
			<section>
				<h4 class="text-al-center">Notes</h4>
				<textarea class="input-opac" placeholder="Add additional details here. They will be shown only for Members. Example: Special share instructions, discount codes, reminders to other organizations" name="event_notes"></textarea>
			</section>
		</form>
	</div>
</div>