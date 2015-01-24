<?php 
$event_title = $_POST['event_title'];
$event_img = $_FILES['event_img']['tmp_name']; // image temporary name
$submitted_by = $_POST['submitted_by'];
$event_type = $_POST['event_type'];
$event_date = $_POST['event_date'];
$event_start_time = $_POST['event_start_time'];
$event_end_time = $_POST['event_end_time'];
$eventbrite_url = $_POST['eventbrite_url'];
$facebook_url = $_POST['facebook_url'];
$event_location = $_POST['event_location'];
$event_notes = $_POST['event_notes'];
$user_name = $_POST['user_name'];
$event_img_size = $_FILES['event_img']['size']; // image size
$event_img_name = $_FILES['event_img']['name']; // image name
$event_img_type = $_FILES['event_img']['type']; // image type


if(!get_magic_quotes_gpc())
{
    $event_img_name = addslashes($event_img_name);
}


$upload_dir = 'assets/img/events_img/';
$file_path = $upload_dir . $event_img_name;
$upload_sucessful = move_uploaded_file($event_img, $file_path);

///////////////// DATABASE CONNECTION ////////////////////
$connect = mysql_connect("localhost", "root", "root");
mysql_select_db("resources", $connect);

$query = " INSERT INTO wp_events (ID, event_title, event_img, submitted_by, event_type, event_date, event_start_time, event_end_time, eventbrite_url, facebook_url, event_location, event_notes, user_name, event_img_size, event_img_name, event_img_type) VALUES ('NULL', '".$event_title."', '".$event_img."', '".$submitted_by."', '".$event_type."', '".$event_date."', '".$event_start_time."', '".$event_end_time."', '".$eventbrite_url."', '".$facebook_url."', '".$event_location."', '".$event_notes."', '".$user_name."', '".$event_img_size."', '".$event_img_name."', '".$event_img_type."')";

mysql_query($query) or die(mysql_error());

header("Location:http://localhost:8888/resources/events");

?>


