<?php 
$event_title = $_POST['event_title'];
$event_img = $_POST['event_img'];
$submitted_by = $_POST['submitted_by'];
$event_type = $_POST['event_type'];
$event_date = $_POST['event_date'];
$event_start_time = $_POST['event_start_time'];
$event_end_time = $_POST['event_end_time'];
$eventbrite_url = $_POST['eventbrite_url'];
$facebook_url = $_POST['facebook_url'];
$event_location = $_POST['event_location'];
$event_notes = $_POST['event_notes'];

$connect = mysql_connect("localhost", "root", "root");
mysql_select_db("resources", $connect);

$query = " INSERT INTO wp_events (ID, event_title, event_img, submitted_by, event_type, event_date, event_start_time, event_end_time, eventbrite_url, facebook_url, event_location, event_notes) VALUES ('NULL', '".$event_title."', '".$event_img."', '".$submitted_by."', '".$event_type."', '".$event_date."', '".$event_start_time."', '".$event_end_time."', '".$eventbrite_url."', '".$facebook_url."', '".$event_location."', '".$event_notes."')";

mysql_query($query) or die(mysql_error());

header("Location:http://localhost:8888/resources/events");

?>


