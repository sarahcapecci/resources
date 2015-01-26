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

echo json_encode($data);

?>