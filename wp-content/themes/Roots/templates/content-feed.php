<!-- Feed template -->
<?php global $current_user;
    get_currentuserinfo();
    $avatar = get_avatar($current_user->ID, 32);
    $email = $current_user->user_email;
    $twitter_handle = $current_user->user_firstname;
    $user_name = $current_user->display_name;
    $user_login = $current_user->user_login;

    $event_img_path = 'wp-content/themes/roots/assets/img/events_img/';
    $img_path = 'wp-content/themes/roots/assets/img/';

?>

<!-- Wrapper -->
<div id="feed-wrapper">
	<!-- Left side -->
	<div class="left-side-top relative">
		<h2>Browse the bulletin, <?php echo $current_user->display_name; ?>!</h2>
		<ul class="select-filter">
		    <li><a id="no-filter-feed" class="black-link-b" href="#">All Bulletins</a> /</li>
		    <li class="middle-gray-txt">Show Only</li>
		    <li><a id="event-filter-feed" class="blue-link-b" href="#">Events |</a></li>
		    <li><a id="request-filter-feed" class="blue-link-b" href="#">Requests |</a></li>
		    <li><a id="resources-filter-feed" class="blue-link-b" href="#">Resources</a></li>
		</ul>
		<button id="new-request"><i class="fa fa-plus margin-right-5"></i>Post Request</button>
		<!-- REQUEST MODAL -->
		<div class="request-modal all-modal">
			<h4>Post a request to the bulletin for all RYR members to see and reply to.</h4>
			<form method="post" action="<?php echo get_template_directory_uri(); ?>/send_request.php">
				<label>Title <textarea name="request_title" cols="40" rows="10" aria-invalid="false" placeholder="Example: Seeking for partners for Arts Event"></textarea></label>
				<label>Description <textarea name="request_description" cols="40" rows="10" aria-invalid="false" placeholder="Type a few sentences about the details of your request. No need to include your contact info."></textarea></label>
				<label>Twiter Handle <input type="text" name="user_twitter" value="<?php echo $twitter_handle; ?>" size="40" aria-invalid="false"></label>
				<input type="submit" value="Post Request" class="wpcf7-form-control wpcf7-submit">
				<input type="hidden" name="user_avatar" value="<?php echo htmlspecialchars($avatar); ?>">
				<input type="hidden" name="user_email" value="<?php echo $email; ?>">
				<input type="hidden" name="user_name" value="<?php echo $user_name; ?>">
			</form>
			<button id="close-request">Close</button>
		</div>
		<!-- Assets showing according to filter -->
		<section id="resources-feed">
			<!-- <h3>Resources</h3> -->
			<ul>
			<?php echo do_shortcode(
			'[cfdb-html form="Upload Document" show="title,document-select,user_avatar,doc-description,doc-tags,file-upload,Submitted Login,Submitted" filelinks="url" stripbr="true" limit="3"]
			<li class="entry">
				<p><img class="avatar" src="${user_avatar}" alt="User avatar"/><strong>${Submitted Login}</strong> uploaded <strong>${title}</strong></p>
				<div class="document-card doc-type ${document-select}">
					<h4>${title}</h4>
					<span class="type">${document-select}</span>
				<img src="wp-content/themes/Roots/assets/img/document.png" alt="">
				<span class="doc-date">${Submitted}</span>
				</div>
			</li>[/cfdb-html]'); ?>
			</ul>
		</section>
		<section class="small-section" id="events-feed">
			<!-- <h3>Events</h3> -->
			<ul>
				<?php 
				$connect = mysql_connect("localhost", "root", "root");
				mysql_select_db("resources", $connect);
				// Query the DB to a limit of 5 results
				$query = "SELECT * FROM wp_events ORDER BY id desc LIMIT 3";
				$result = mysql_query($query);

				// Displays the results as list items
				while($row = mysql_fetch_assoc($result)) {
						echo "<li class='single-event'><p>".$row['submitted_by']."<strong>" .$row['user_name']. "</strong> is hosting <strong>" .$row['event_title']. "</strong></p>";
						// handle the image
						if ($row['event_img']) {
							echo "<img class='event-img-feed' src='" .$event_img_path.$row['event_img_name']. "'/></li>";
						} else {
							echo "<img class='event-img-feed' src='".$event_img_path."default-calendar.jpg' alt='Default Event Image'/></li>";

						    
						}
				}
				mysql_close();
				?>
			</ul>
		</section>
		<section class="small-section" id="requests-feed">
			<h3>Pinned Requests</h3>
			<ul id="#pinned-requests">
				<?php 
				$connect = mysql_connect("localhost", "root", "root");
				mysql_select_db("resources", $connect);
				// Query the DB to a limit of 5 results
				$query = "SELECT * FROM wp_requests WHERE pinned_request = 1 LIMIT 2";
				$result = mysql_query($query);

				// Displays the results as list items
				while($row = mysql_fetch_assoc($result)) {
						echo "<li class='single-request' data-id='" .$row['id']. "'><p><img src='".$img_path."pin_icon.png' alt='Pinned Request Icon'/>".$row['user_avatar']."<strong>".$row['user_name']. "</strong> requests <strong>" . $row['request_title'] . "</strong></p>" .
						     "<p class='request-desc'>" .$row['request_description']. "</p><a class='margin-right-5 respond-request' href='#' data-id='" .$row['id']. "'>Respond via e-mail</a><a href='https://twitter.com/intent/tweet?screen_name=".$row['user_twitter']."' class='margin-left-5 twitter-mention-button'>".$row['user_twitter']."</a></li>";
						if ($user_login == 'admin') {
						echo "<button class='pin-request' data-id='" .$row['id']. "' data-pinned='".$row['pinned_request']."'>Unpin this request</button>";
						}
				}
				?>
			</ul>
			<h3>All Requests</h3>
			<ul>
				<?php 
				$connect = mysql_connect("localhost", "root", "root");
				mysql_select_db("resources", $connect);
				// Query the DB to a limit of 5 results
				$query = "SELECT * FROM wp_requests LIMIT 5";
				$result = mysql_query($query);

				// Displays the results as list items
				while($row = mysql_fetch_assoc($result)) {
						echo "<li class='single-request' data-id='" .$row['id']. "'><p>".$row['user_avatar']."<strong>".$row['user_name']. "</strong> requests <strong>" . $row['request_title'] . "</strong></p>" .
						     "<p class='request-desc'>" .$row['request_description']. "</p><a class='margin-right-5 respond-request' href='#' data-id='" .$row['id']. "'>Respond via e-mail</a><a href='https://twitter.com/intent/tweet?screen_name=".$row['user_twitter']."' class='margin-left-5 twitter-mention-button'>".$row['user_twitter']."</a></li>";
						echo "<input id='request_sender_".$row['id']."' type='hidden' value=".$row['user_email']."><input id='request_name_".$row['id']."' type='hidden' value=".escapeshellarg($row['request_title']).">";

						// Pin the request
						if($user_login == 'admin' and $row['pinned_request'] == 0){
							echo "<button class='pin-request' data-id='" .$row['id']. "' data-pinned='".$row['pinned_request']."'>Pin this request</button>";
						} elseif ($user_login == 'admin' and $row['pinned_request'] == 1) {
							echo "<button class='pin-request' data-id='" .$row['id']. "' data-pinned='".$row['pinned_request']."'>Unpin this request</button>";
						}

						//delete request when complete     
						if($row['user_name'] == $user_name){
							echo "<button class='delete-request' data-id='" .$row['id']. "'>Delete request</button>";
						}

				?>
				<div class='response-modal all-modal' id='request-<?php echo $row['id']; ?>'>
					<h4>Your e-mail response</h4>
					<button class='close-response'><i class='fa fa-close'></i></button>
					<img src='<?php echo get_template_directory_uri(); ?>/assets/img/email.png' alt=''>
					<?php echo do_shortcode('[contact-form-7 id="103" title="Reply to Request"]'); ?>
				</div>

				<?php
				}
				mysql_close();
				?>
		</section>
	</div>
	<!-- Right side -->
	<div class="right-side">
		<h2>Upcoming Events</h2>
		<a class="block margin-bottom-20 black-link" href="<?php echo esc_url(home_url('/')); ?>events">View calendar</a>
		<section class="event-preview">
			<ul>
				<?php 
				$connect = mysql_connect("localhost", "root", "root");
				mysql_select_db("resources", $connect);
				// Query the DB to a limit of 5 results
				$query = "SELECT * FROM wp_events ORDER BY id desc LIMIT 5";
				$result = mysql_query($query);

				// Displays the results as list items
				while($row = mysql_fetch_assoc($result)) {
						echo "<li><div class='inline-block'>" .$row['submitted_by']. "</div><div class='inline-block'><h3>" . $row['event_title'] . "</h3>".
						     "<p>" .date('F j, Y', strtotime($row['event_date'])). " | " .date('h:i', strtotime($row['event_start_time'])). " - " .date('h:i A', strtotime($row['event_end_time'])). "</p>" .
						     "<p>" .$row['event_location'] . "</p></div></li>";   
				}
				mysql_close();
				?>
			</ul>
		</section>
		
		<h2>Blog Updates</h2>
		<a class="block margin-bottom-20 black-link" href="http://youthroundtable.ca/" target="_blank">Visit the blog</a>
		<section class="blog-updates">
			<?php 
			$mydb = new wpdb('root','root','youth','localhost');
			$rows = $mydb->get_results("SELECT post_title, guid, post_date FROM wp_posts WHERE post_type = 'post'");
			echo "<ul>";
			foreach ($rows as $obj) :
				$new_date = date("F j, Y", strtotime($obj->post_date));
				echo "<li><a class='black-link' href=".$obj->guid." target='_blank'><h4>".$obj->post_title."</h4></a>";
				echo "<p>".$new_date."</p></li>";
			endforeach;
			echo "</ul>";
			 ?>
		</section>
	</div>
</div>
<!-- end of wrapper -->

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

