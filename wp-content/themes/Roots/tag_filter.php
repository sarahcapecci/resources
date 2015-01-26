<?php 

$selected_tag = $_POST['tagParam'];

$tagged_docs = array();
$docs_ids = array();

// database connection
$db_link = mysql_connect("localhost", "root", "root");
mysql_select_db("resources", $db_link);


$query_one = "SELECT submit_time, field_name FROM wp_cf7dbplugin_submits WHERE form_name = 'Upload Document' AND field_value LIKE '%".$selected_tag."%'";

$result = mysql_query($query_one) or die(mysql_error());

while($row = mysql_fetch_assoc($result)) {

	if ($row['field_name'] == 'doc-tags') {
		array_push($docs_ids, $row['submit_time']);
	}

	$number_of_docs = sizeof($docs_ids);

	for ($i=0; $i < $number_of_docs ; $i++) { 
		$tagged_docs['doc_'.$i] = $docs_ids[$i];
	}
}

echo json_encode($tagged_docs);

?>