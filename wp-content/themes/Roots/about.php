<?php
/*
Template Name: About Template
*/
// $youth_img_path = 'http://localhost:8888/roundtable/wp-content/uploads/';

// $connect = mysql_connect("localhost", "root", "root");
// mysql_select_db("youth", $connect);
// // 
// //////// ABOUT TEXT QUERY
// $query_about = "SELECT post_content FROM wp_posts WHERE post_type = 'page' AND post_name = 'about'";
// $result_about = mysql_query($query_about);

// while($row = mysql_fetch_assoc($result_about)) {
// 	$first_paragraph = $row['post_content'];
// }

//////// VISION & MISSION QUERY 
// $query_vis_mis = "SELECT meta_key, meta_value FROM wp_postmeta WHERE meta_key = 'mission' OR meta_key = 'vision' ORDER BY meta_id DESC LIMIT 2";
// $result_vis_mis = mysql_query($query_vis_mis);

// while($row_vm = mysql_fetch_assoc($result_vis_mis)) {
// 	// if ($row_vm['meta_key'] == 'mission') {
// 	// 	$mission = $row_vm['meta_value'];
// 	// } elseif ($row_vm['meta_key'] == 'vision') {
// 	// 	$vision = $row_vm['meta_value'];
// 	// }
// }


//sponsors

// $query_nine = "SELECT meta_key, meta_value FROM wp_postmeta WHERE post_id = 9";
// $result_nine = mysql_query($query_nine);


// while($row_nine = mysql_fetch_assoc($result_nine)) {
// 	// print_r($row_nine);

// 	// vision and mission
// 	if ($row_nine['meta_key'] == 'mission') {
// 		$mission = $row_nine['meta_value'];
// 	} elseif ($row_nine['meta_key'] == 'vision') {
// 		$vision = $row_nine['meta_value'];
// 	}

// 	$thumbnail_id = array();
// 	$thumbnail_path = array();

	// sponsors
	
		// if ($row_nine['meta_key'] == $value) {
		// 	$this_path = $row_nine['meta_value'];
		// 	array_push($thumbnail_path, $this_path);
		// }

		
	// 	// $query_img = "SELECT meta_key, meta_value FROM wp_postmeta WHERE post_id = $this_path";
	// 	// $result_img = mysql_query($query_img);

	// 	// while($row_img = mysql_fetch_assoc($result_img)) {
	// 	// 	echo $row_img;
	// 	// 	// echo "<img src='"$youth_img_path.$row_img['meta_value']."'/>";
	// 	// }

	// if ($row_nine['meta_key'] == 'sponsors'){
	// 	$num_of_sponsors = $row_nine['meta_value'];
	// }

	// // MAKING ARRAYS TO GET IMAGES
	// for ($i = 0; $i < $num_of_sponsors ; $i++) { 
	// 	$this_id = "sponsors_".$i."_thumbnail";
	// 	array_push($thumbnail_id, $this_id);
		
	// }


	// foreach ($thumbnail_id as $item) { 
	// 	echo " ".$item;	
	// 	if ($row_nine['meta_key'] == $item) {
	// 	$this_path = $row_nine['meta_value'];
	// 	array_push($thumbnail_path, $this_path);
	// 	}

	// }
	// if ($row_nine['meta_key'] == "sponsors_".$i."_thumbnail") {
	// 	$this_path = $row_nine['meta_value'];
	// 	array_push($thumbnail_path, $this_path);
	// }

	// if ($row_nine['meta_key'] == "sponsors_0_thumbnail") {
	// 	$this_path = $row_nine['meta_value'];
	// 	array_push($thumbnail_path, $this_path);
	// }

	// QUERY DB FOR IMAGE PATH
	
	
// } // ends WHILE LOOP



// print_r($thumbnail_path);
// print_r($thumbnail_id);


// $meta_rows_sp = $mydb->get_results("SELECT meta_key, meta_value FROM wp_postmeta WHERE meta_key = 'sponsors'");
// $length = sizeof($meta_rows_sp) - 1;
// $num_of_sp = $meta_rows_sp[$length]->meta_value; // number of sponsors
// $meta_keys = array(); 

// for ($i=0; $i < $num_of_sp; $i++) { 
// 	array_push($meta_keys, "sponsors_".$i."_thumbnail");
// }
// print_r($meta_keys);

// foreach ($meta_keys as $obj) :
// 	echo $obj;

// $meta_rows_result = $mydb->get_results("SELECT meta_key, meta_value FROM wp_postmeta WHERE meta_key = $obj");

// print_r($meta_rows_result);

// endforeach;

// // partners
// $meta_rows_part = $mydb->get_results("SELECT meta_key, meta_value FROM wp_postmeta WHERE meta_key = 'partners'");

// $length = sizeof($meta_rows_part) - 1;
// $num_of_part = $meta_rows_part[$length]->meta_value;

// foreach ($meta_rows_part as $obj) :
	
// 	// elseif ($obj->meta_key == 'sponsors') {
// 	// 	$sponsors = $obj->meta_value; // length of sponsors
// 	// 	// echo end($sponsors);
// 	// 	echo $sponsors;
// 	// } elseif ($obj->meta_key == 'partners') {
// 	// 	$partners = $obj->meta_value; // length of sponsors
// 	// 	// echo end($partners);
// 	// 	echo $partners;
// 	// }
// endforeach;

// mysql_close();
?>
