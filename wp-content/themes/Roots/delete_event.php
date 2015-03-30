<?php 
$event_id = $_POST['event_id'];

$db_link = mysql_connect("localhost", "root", "root");
mysql_select_db("resources", $db_link);

$query = "DELETE FROM wp_events WHERE id = $event_id";


mysql_query($query) or die(mysql_error());

echo "success";
?>