<?php 
$request_id = $_POST['eventParam'];


$data = array();

$db_link = mysql_connect("localhost", "root", "root");
mysql_select_db("resources", $db_link);

$query = "SELECT event_title, event_img, submitted_by, event_type, event_date, event_start_time, event_end_time, eventbrite_url, facebook_url, event_location, event_notes, user_name, event_img_size, event_img_name, event_img_type FROM wp_events WHERE id = $request_id ";

$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_assoc($result)) {
	$data['event_title'] = $row['event_title'];
	$data['event_submitted_by'] = $row['event_submitted_by'];
	$data['event_type'] = $row['event_type'];
	$data['event_date'] = $row['event_date'];
	$data['event_start_time'] = $row['event_start_time'];
	$data['event_end_time'] = $row['event_end_time'];
	$data['eventbrite_url'] = $row['eventbrite_url'];
	$data['facebook_url'] = $row['facebook_url'];
	$data['event_location'] = $row['event_location'];
	$data['event_notes'] = $row['event_notes'];
	$data['id'] = $request_id;
	// $data['event_'] = $row['event_'];

	if ($row['event_img_size'] > 0) {
		$data['event_img'] = "../wp-content/themes/roots/assets/img/events_img/" .$row['event_img_name'];
	} else {
		$data['event_img'] = "../wp-content/themes/roots/assets/img/events_img/default-calendar.jpg";
	}

}

// echo $request_id;
echo json_encode($data);

?>