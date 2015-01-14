<!-- Feed template -->
<?php global $current_user;
      get_currentuserinfo();
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
		    <li><a class="blue-link-b" href="<?php echo esc_url(home_url('/')); ?>resources/">Requests |</a></li>
		    <li><a class="blue-link-b" href="<?php echo esc_url(home_url('/')); ?>resources/">Resources</a></li>
		</ul>
		<button id="new-request"><i class="fa fa-plus margin-right-5"></i>Post Request</button>
		<!-- Assets showing according to filter -->
		<div class="request-modal all-modal">
			<h4>Post a request to the bulletin for all RYR members to see and reply to.</h4>
			<?php echo do_shortcode('[contact-form-7 id="53" title="Create Request"]'); ?>
		</div>
		<section>
			<ul>
			    <li>
			    	<!-- organization image -->
			    	<img src="" alt="">
			    	<span>Organization Name</span>
			    	<!-- Events -->
			    	<span>is hosting</span>
			    	<span>Event Name</span>
			    	<img src="" alt="">
			    	<!-- Document -->
			    	<span>uploaded</span>
			    	<span>Document Name</span>
			    	<img src="" alt="">
			    	<!-- Requests -->
		    		<span>requests</span>
		    		<span>Subject</span>
		    		<p>Request details</p>
		    		<a href="">Respond via E-mail</a> <a href="">Respond on Twitter</a>
			    </li>
			</ul>
			<!-- Modal for E-mail response -->
			<div>
				<h4>Your Email response</h4>
				<?php echo do_shortcode('[fep-contact-form]'); ?>
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
			<ul>
				<!-- Repeater for blog posts -->
			    <li>
			    	<a href="#">
			    		<h3>Blog Post Tilte Goes Here</h3>
			    		<p>Date</p>
			    	</a>
			    </li>
			</ul>
		</section>
	</div>
</div>
<!-- end of wrapper -->
