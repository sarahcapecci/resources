<?php 
$link_id = $_POST['linkId'];

$db_link = mysql_connect("localhost", "root", "root");
mysql_select_db("resources", $db_link);

$query = "UPDATE wp_cf7dbplugin_submits SET file_downloads = file_downloads + 1 WHERE submit_time = $link_id AND field_name = 'link-title'";


mysql_query($query) or die(mysql_error());
echo "success";

?>