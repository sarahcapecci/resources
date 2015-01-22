<?php 
$request_title = $_POST['request_title'];
$request_description = $_POST['request_description'];
$user_twitter = $_POST['user_twitter'];
$user_email = $_POST['user_email'];
$user_avatar = $_POST['user_avatar'];
$user_name = $_POST['user_name'];


$connect = mysql_connect("localhost", "root", "root");
mysql_select_db("resources", $connect);

$query = " INSERT INTO wp_requests (ID, request_title, request_description, user_twitter, user_email, user_avatar, user_name) VALUES ('NULL', '".$request_title."', '".$request_description."', '".$user_twitter."', '".$user_email."', '".$user_avatar."', '".$user_name."')";

mysql_query($query) or die(mysql_error());

header("Location:http://localhost:8888/resources/");

?>