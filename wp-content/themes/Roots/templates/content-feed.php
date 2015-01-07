<!-- Feed template -->
<?php global $current_user;
      get_currentuserinfo();
?>

<!-- Wrapper -->
<div>
	<!-- Left side -->
	<div>
		<h2>Browse the bulletin, <?php echo $current_user->display_name; ?>!</h2>
		<ul>
		    <li class="active">All Bulletins /</li>
		    <span>Show Only</span>
		    <li>Events |</li>
		    <li>Requests |</li>
		    <li>Resources</li>
		</ul>
		<button><i class="fa fa-plus"></i>Post Request</button>
		<!-- Assets showing according to filter -->
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
				<form>
					<label>Send to <input type="select"></label>
					<label>Subject<input type="select"></label>
					<textarea></textarea>
					<label>From <input type="email" value="Sender Email"></label>
					<input type="submit" value="Send Message">
				</form>
			</div>
		</section>
	</div>
	<!-- Right side -->
	<div>
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
