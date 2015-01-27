<?php 
/* draws a calendar */
function draw_calendar($month,$year, $events = array()){
	$event_img_path = '../wp-content/themes/roots/assets/img/events_img/';

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
					$calendar.= "<div class='event' data-author='".$event['user_name']. "' data-type='".$event['event_type']."' data-id='".$event['id']."'>".$event['event_title'];

					if($event['event_img_name']){
						$calendar .= "<img class='event-img' src='" .$event_img_path.$event['event_img_name']."'/></div>";

					} else {
						$calendar .= "<img class='event-img' src='" .$event_img_path."/default-calendar.jpg' alt='Default Event Image' /></div>";
					}
					// DELETE EVENT IF USER LOGGED IS THE SAME
					// if($event['user_name'] = $username) {
					// 	$calendar .= "<button>delete</button>";
					// }
				}
			}
			else {
				$calendar.= str_repeat("<p>" .$username. "</p>",2);

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
			$calendar.= '<td class="calendar-day-np"></td>';
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
	update_date($month);
}

function update_date($month, $year) {
	// return $month;
	// $monthArray = 

	if ($month == 1) {
		return "January, " .$year;
	} elseif ($month == 2) {
		return "February, " .$year;
	} elseif ($month == 3){
		return "March, " .$year;
	} elseif ($month == 4){
		return "April, " .$year;
	} elseif ($month == 5){
		return "May, " .$year;
	} elseif ($month == 6){
		return "June, " .$year;
	} elseif ($month == 7){
		return "July, " .$year;
	} elseif ($month == 8){
		return "August, " .$year;
	} elseif ($month == 9){
		return "September, " .$year;
	} elseif ($month == 10){
		return "October, " .$year;
	} elseif ($month == 11){
		return "November, " .$year;
	} elseif ($month == 12){
		return "December, " .$year;
	}
}


//events query

/* get all events for the given month */
$events = array();

$db_link = mysql_connect("localhost", "root", "root");
mysql_select_db("resources", $db_link);

$query = "SELECT event_title, id, event_img_name, event_date, event_type, user_name FROM wp_events";

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