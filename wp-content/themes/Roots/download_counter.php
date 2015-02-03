<?php 

// Download # Update Query

$increment = $_POST['increment'];
$document_path = $_POST['document_path'];
$document_url = parse_url($document_path);
parse_str($document_url['query'], $document_query);
$document_id = $document_query['s'];

$db_link = mysql_connect("localhost", "root", "root");
mysql_select_db("resources", $db_link);

$query = "UPDATE wp_cf7dbplugin_submits SET file_downloads = file_downloads + 1 WHERE submit_time = $document_id AND field_name = 'title'";


mysql_query($query) or die(mysql_error());

echo "success";

?>