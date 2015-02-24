<?php 
$request_id = $_POST['requestParam'];
$operation = $_POST['operation'];

$db_link = mysql_connect("localhost", "root", "root");
mysql_select_db("resources", $db_link);

// OPERATION 1 : PIN -- OPERATION 2 : UNPIN
if ($operation == 1) {
	$query = "UPDATE wp_requests SET pinned_request = 1 WHERE id = $request_id";
} elseif ($operation == 2) {
	$query = "UPDATE wp_requests SET pinned_request = 0 WHERE id = $request_id";
}

mysql_query($query) or die(mysql_error());

echo "success";

?>