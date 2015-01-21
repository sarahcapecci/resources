<!-- Feed template -->
<?php global $current_user;
    get_currentuserinfo();
?>

<!-- Wrapper -->
<div>
	<!-- Left side -->
	<div class="left-side-top relative">
		<h2>Browse the bulletin, <?php echo $current_user->display_name; ?>!</h2>
		<?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>

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
			<?php echo do_shortcode('[contact-form-7 id="53" title="Create Request"]'); ?>
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
		<?php echo do_shortcode(
		'[cfdb-html form="Create Request" show="request-title,request-twitter,request-desc,Submitted Login,Submitted" filelinks="url" stripbr="true" limit="3"]
		<li class="entry">
			<span>Avatar</span>
			<p><strong>${Submitted Login}</strong> requests <strong>${request-title}</strong></p>
			<p>${request-desc}</p>
			<a id="open-response" href="#">Respond via E-mail</a>
			<a href="https://twitter.com/intent/tweet?screen_name=${request-twitter}" class="twitter-mention-button" data-related="sarahcapecci" data-dnt="true"></a>
		</li>
		[/cfdb-html]'); ?>
			<!-- Modal for E-mail response -->
			<div class="response-modal all-modal">
				<h4>Your e-mail response</h4>
				<button id="close-response"><i class="fa fa-close"></i></button>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/email.png" alt="">
				<?php echo do_shortcode('[contact-form-7 id="51" title="Request Response"]'); ?>
			</div>
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
						echo "<li><h3>" . $row['event_title'] . "</h3>".
						     "<p>" .$row['event_date']. " | " .date('h:i A', $row['event_start_time']). " - " .date('h:i A', $row['event_end_time']). "</p>" .
						     "<p>" .$row['event_location'] . "</p></li>";
				    
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

