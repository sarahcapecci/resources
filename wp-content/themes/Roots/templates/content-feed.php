<!-- Feed template -->
<?php global $current_user;
    get_currentuserinfo();
    $avatar = get_avatar($current_user->ID, 32);
    $email = $current_user->user_email;
    $twitter_handle = $current_user->user_firstname;
    $user_name = $current_user->display_name;
?>

<!-- Wrapper -->
<div>
	<!-- Left side -->
	<div class="left-side-top relative">
		<h2>Browse the bulletin, <?php echo $current_user->display_name; ?>!</h2>
		<ul class="select-filter">
		    <li><a class="black-link-b" href="<?php echo esc_url(home_url('/')); ?>">All Bulletins</a> /</li>
		    <li class="middle-gray-txt">Show Only</li>
		    <li><a class="blue-link-b" href="<?php echo esc_url(home_url('/')); ?>events">Events |</a></li>
		    <li><a class="blue-link-b" href="<?php echo esc_url(home_url('/')); ?>requests/">Requests |</a></li>
		    <li><a class="blue-link-b" href="<?php echo esc_url(home_url('/')); ?>resources/">Resources</a></li>
		</ul>
		<button id="new-request"><i class="fa fa-plus margin-right-5"></i>Post Request</button>
		<!-- Assets showing according to filter -->
		<div class="request-modal all-modal">
			<h4>Post a request to the bulletin for all RYR members to see and reply to.</h4>
			<form method="post" action="<?php echo get_template_directory_uri(); ?>/send_request.php">
				<label>Tile <textarea name="request_title" cols="40" rows="10" aria-invalid="false" placeholder="Example: Seeking for partners for Arts Event"></textarea></label>
				<label>Description <textarea name="request_description" cols="40" rows="10" aria-invalid="false" placeholder="Type a few sentences about the details of your request. No need to include your contact info."></textarea></label>
				<label>Twiter Handle <input type="text" name="user_twitter" value="<?php echo $twitter_handle; ?>" size="40" aria-invalid="false"></label>
				<input type="submit" value="Post Request" class="wpcf7-form-control wpcf7-submit">
				<input type="hidden" name="user_avatar" value="<?php echo htmlspecialchars($avatar); ?>">
				<input type="hidden" name="user_email" value="<?php echo $email; ?>">
				<input type="hidden" name="user_name" value="<?php echo $user_name; ?>">
			</form>
			<button id="close-request">Close</button>
		</div>
		<section>
		<h3>Resources</h3>
		<ul>
		<?php echo do_shortcode(
		'[cfdb-html form="Upload Document" show="title,document-select,doc-description,doc-tags,file-upload,Submitted Login,Submitted" filelinks="url" stripbr="true" limit="3"]
		<li class="entry">
			<span>Avatar</span>
			<p><strong>${Submitted Login}</strong> uploaded <strong>${title}</strong></p>
			<div class="document-card doc-type ${document-select}">
				<h4>${title}</h4>
				<span class="type">${document-select}</span>
			<img src="wp-content/themes/Roots/assets/img/document.png" alt="">
			<span class="doc-date">${Submitted}</span>
			</div>
		</li>[/cfdb-html]'); ?>
		</ul>
		<h3>Events</h3>
		<h3>Requests</h3>
		

		<ul>
			<?php 
			$connect = mysql_connect("localhost", "root", "root");
			mysql_select_db("resources", $connect);
			// Query the DB to a limit of 5 results
			$query = "SELECT * FROM wp_requests LIMIT 5";
			$result = mysql_query($query);

			// Displays the results as list items
			while($row = mysql_fetch_assoc($result)) {
					echo "<li><p><strong>" .$row['user_avatar'] .$row['user_name']. "</strong> requests <strong>" . $row['request_title'] . "</strong></p>" .
					     "<p>" .$row['request_description']. "</p><a class='margin-right-5 respond-request' href='#' data-id='" .$row['id']. "'>Respond via e-mail</a><a href='https://twitter.com/intent/tweet?screen_name=".$row['user_twitter']."' class='margin-left-5 twitter-mention-button'>".$row['user_twitter']."</a></li>";
					//delete request when complete     
					if($row['user_name'] == $user_name){
						echo "<button>Delete request</button>";
					}
			?>
			<div class='response-modal all-modal' id='request-<?php echo $row['id']; ?>'>
				<h4>Your e-mail response</h4>
				<button class='close-response'><i class='fa fa-close'></i></button>
				<img src='<?php echo get_template_directory_uri(); ?>/assets/img/email.png' alt=''>
				<form name='reply_form' action='<?php echo get_template_directory_uri(); ?>/reply_to_request.php' method='POST' novalidate='novalidate'>
					<label>Send to: <input type='email' name='email_to' size='40' aria-required='true' aria-invalid='false' value='<?php echo $row['user_email']; ?>'></label>
					<label>Subject: <input type='text' name='subject' value='<?php echo $row['request_title']; ?>' size='40' aria-required='true' aria-invalid='false'></label>
					<label>Message: <textarea name='message' cols='40' rows='10' aria-invalid='false'></textarea></label>
					<label>From:<input type='email' name='email_from' value='<?php echo $email; ?>' size='40' aria-invalid='false'>
					<input type='submit' value='Send Message' class=''></label>
					<input type='hidden' name='request' value='<?php echo $row['request_title']; ?>'>
					<input type='hidden' name='sender_name' value='<?php echo $user_name; ?>'>
				</form>
			</div>

			<?php
			}
			mysql_close();
			?>

			
		</section>
	</div>
	<!-- Right side -->
	<div class="right-side">
		<h2>Upcoming</h2>
		<a href="#">View calendar</a>
		<section>
			<ul>
				<?php 
				$connect = mysql_connect("localhost", "root", "root");
				mysql_select_db("resources", $connect);
				// Query the DB to a limit of 5 results
				$query = "SELECT * FROM wp_events LIMIT 5";
				$result = mysql_query($query);

				// Displays the results as list items
				while($row = mysql_fetch_assoc($result)) {
						echo "<li><div class='inline-block'>" .$row['submitted_by']. "</div><div class='inline-block'><h3>" . $row['event_title'] . "</h3>".
						     "<p>" .$row['event_date']. " | " .date('h:i A', $row['event_start_time']). " - " .date('h:i A', $row['event_end_time']). "</p>" .
						     "<p>" .$row['event_location'] . "</p></div></li>";   
				}
				mysql_close();
				?>
			</ul>
		</section>
		
		<h2>Updates</h2>
		<a href="#">Visit the blog</a>
		<section>
			<?php 
			$mydb = new wpdb('root','root','youth','localhost');
			$rows = $mydb->get_results("SELECT post_title, guid, post_date FROM wp_posts WHERE post_type = 'post'");
			echo "<ul>";
			foreach ($rows as $obj) :
				$new_date = date("M jS, Y", strtotime($obj->post_date));
				echo "<li><a href=".$obj->guid." target='_blank'>".$obj->post_title."</a></li>";
				echo "<p>".$new_date."</p>";
			endforeach;
			echo "</ul>";
			 ?>
		</section>
	</div>
</div>
<!-- end of wrapper -->

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

