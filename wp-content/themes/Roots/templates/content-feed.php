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
		</li>
		[/cfdb-html]'); ?>
		</ul>
		<h3>Events</h3>
		<h3>Requests</h3>
		<ul>
		<?php echo do_shortcode(
		'[cfdb-html form="Create Request" show="request-title,request-desc,Submitted Login,Submitted" filelinks="url" stripbr="true" limit="3"]
		<li class="entry">
			<span>Avatar</span>
			<p><strong>${Submitted Login}</strong> requests <strong>${request-title}</strong></p>
			<p>${request-desc}</p>
			<a href="">Respond via E-mail</a> <a href="">Respond on Twitter</a>
		</li>
		[/cfdb-html]'); ?>
			<!-- Modal for E-mail response -->
			<div>
				<h4>Your Email response</h4>
			</div>
		</section>
	</div>
	<!-- Right side -->
	<div class="right-side">
		<h2>Upcoming</h2>
		<a href="#">View calendar</a>
		<section>
			<ul>
				<!-- Repeater for events -->
			    <li>
			    	<a href="#">
			    		<img src="" alt="">
			    		<h3>Event name</h3>
			    		<p>Event date | event time</p>
			    		<p>Event place, event city</p>
			    	</a>
			    </li>
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
				echo "<li><a href=".$obj->guid.">".$obj->post_title."</a></li>";
				echo "<p>".$new_date."</p>";
			endforeach;
			echo "</ul>";
			 ?>
		</section>
	</div>
</div>
<!-- end of wrapper -->

