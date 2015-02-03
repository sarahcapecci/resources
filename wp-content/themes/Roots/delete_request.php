<?php 
$request_id = $_POST['request_id'];

$db_link = mysql_connect("localhost", "root", "root");
mysql_select_db("resources", $db_link);

$query = "DELETE FROM wp_requests WHERE id = $request_id";


mysql_query($query) or die(mysql_error());

echo "success";
?>