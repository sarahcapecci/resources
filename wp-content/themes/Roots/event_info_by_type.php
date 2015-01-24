<?php 

if(isset($_POST['event_type'])) {
	$request_type = $_POST['event_type'];
	$query = "SELECT event_title, id, event_img_name, event_date, user_name FROM wp_events WHERE event_type = $request_type";	
	$events = array();

	$db_link = mysql_connect("localhost", "root", "root");
	mysql_select_db("resources", $db_link);

	$result = mysql_query($query) or die(mysql_error());

	while($row = mysql_fetch_assoc($result)) {
		$events[$row['event_date']][] = $row;	
	}
} else {
	$query = "SELECT event_title, id, event_img_name, event_date, user_name FROM wp_events";
	$events = array();

	$db_link = mysql_connect("localhost", "root", "root");
	mysql_select_db("resources", $db_link);

	$result = mysql_query($query) or die(mysql_error());

	while($row = mysql_fetch_assoc($result)) {
		$events[$row['event_date']][] = $row;	
	}
}




////////////////////

// $data = array();

// $db_link = mysql_connect("localhost", "root", "root");
// mysql_select_db("resources", $db_link);

// $query = "SELECT event_title, event_img, submitted_by, event_date, event_start_time, event_end_time, eventbrite_url, facebook_url, event_location, event_notes, user_name, event_img_size, event_img_name, event_img_type FROM wp_events WHERE event_type = $request_type ";

// $result = mysql_query($query) or die(mysql_error());

// while($row = mysql_fetch_assoc($result)) {
	

// }

// echo json_encode($data);

?>