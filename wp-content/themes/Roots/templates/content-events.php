<!-- LEFT side -->
<div class="left-side events">
	<h2>Collective Calendar MONTH 1ST - LAStday</h2>
	<ul class="select-filter">
	    <li><a class="black-link-b" href="<?php echo esc_url(home_url('/')); ?>">All Events</a> /</li>
	    <li class="middle-gray-txt">Show Only</li>
	    <li><a class="blue-link-b" href="<?php echo esc_url(home_url('/')); ?>events">Meetings |</a></li>
	    <li><a class="blue-link-b" href="<?php echo esc_url(home_url('/')); ?>requests/">Socials |</a></li>
	    <li><a class="blue-link-b" href="<?php echo esc_url(home_url('/')); ?>resources/">Fundraisers</a></li>
	</ul>
	<button id="new-request"><i class="fa fa-plus margin-right-5"></i>Post Request</button>
	<!-- Assets showing according to filter -->
	<div class="request-modal all-modal">
		<h4>Post a request to the bulletin for all RYR members to see and reply to.</h4>
		<?php echo do_shortcode('[contact-form-7 id="53" title="Create Request"]'); ?>
		<button id="close-request">Close</button>
	</div>
	
	<!-- pagination -->
	<div class="calendar-pagination">
		<span><i class="fa fa-angle-double-left"></i></span>
		<h5 class="inline-block">Weeks</h5>
		<span><i class="fa fa-angle-double-right"></i></span>
	</div>

	<!-- Calendar -->
	<!-- event list is a repeater that displays events in that certain date -->
	<div id="calendar">
		<table>
		   <tr class="inactive">
		   		<th><h5>Sun</h5></th>
		      	<td class="day">
					<span class="date">1</span>
		      	</td>
		      	<td class="day">
		      		<span class="date">8</span>
		      	</td>
		   </tr>
		   <tr>
		   		<th><h5>Mon</h5></th>
		      	<td class="day">
		      		<span class="date">2</span>
		      		<div class="event-list">
		      			<span class="image"></span>
		      			<h6>Event Name Here</h6>
		      		</div>
		      	</td>
		      	<td class="day">
		      		<span class="date">9</span>
		      		<div class="event-list">
		      			<span class="image"></span>
		      			<h6>Event Name Here</h6>
		      		</div>
		      		<div class="event-list">
		      			<span class="image"></span>
		      			<h6>Event Name Here</h6>
		      		</div>
		      		<div class="event-list">
		      			<span class="image"></span>
		      			<h6>Event Name Here</h6>
		      		</div>
		      	</td>
		   </tr>
		   <tr>
		   		<th><h5>Tue</h5></th>
		      	<td class="day">
		      		<span class="date">3</span>
		      		<div class="event-list">
		      			<span class="image"></span>
		      			<h6>Event Name Here</h6>
		      		</div>
		      		<div class="event-list">
		      			<span class="image"></span>
		      			<h6>Event Name Here</h6>
		      		</div>
		      		<div class="event-list">
		      			<span class="image"></span>
		      			<h6>Event Name Here</h6>
		      		</div>
		      	</td>
		      	<td class="day">
		      		<span class="date">10</span>
		      		<div class="event-list">
		      			<span class="image"></span>
		      			<h6>Event Name Here</h6>
		      		</div>
		      	</td>
		   </tr>
		   <tr>
		   		<th><h5>Wed</h5></th>
		      	<td class="day">
		      		<span class="date">4</span>
		      		<div class="event-list">
		      			<span class="image"></span>
		      			<h6>Event Name Here</h6>
		      		</div>
		      	</td>
		      	<td class="day">
		      		<span class="date">11</span>
		      		<div class="event-list">
		      			<span class="image"></span>
		      			<h6>Event Name Here</h6>
		      		</div>
		      		<div class="event-list">
		      			<span class="image"></span>
		      			<h6>Event Name Here</h6>
		      		</div>
		      	</td>
		   </tr>
		   <tr>
		   		<th><h5>Thu</h5></th>
		      	<td class="day">
		      		<span class="date">5</span>
		      		<div class="event-list">
		      			<span class="image"></span>
		      			<h6>Event Name Here</h6>
		      		</div>
		      	</td>
		      	<td class="day">
		      		<span class="date">12</span>
		      		<div class="event-list">
		      			<span class="image"></span>
		      			<h6>Event Name Here</h6>
		      		</div>
		      		<div class="event-list">
		      			<span class="image"></span>
		      			<h6>Event Name Here</h6>
		      		</div><div class="event-list">
		      			<span class="image"></span>
		      			<h6>Event Name Here</h6>
		      		</div>
		      		<div class="event-list">
		      			<span class="image"></span>
		      			<h6>Event Name Here</h6>
		      		</div>
		      	</td>
		   </tr>
		   <tr>
		   		<th><h5>Fri</h5></th>
		      	<td class="day">
		      		<span class="date">6</span>
		      		<div class="event-list">
		      			<span class="image"></span>
		      			<h6>Event Name Here</h6>
		      		</div>
		      		<div class="event-list">
		      			<span class="image"></span>
		      			<h6>Event Name Here</h6>
		      		</div>
		      		<div class="event-list">
		      			<span class="image"></span>
		      			<h6>Event Name Here</h6>
		      		</div>
		      	</td>
		      	<td class="day">
		      		<span class="date">13</span>
		      		<div class="event-list">
		      			<span class="image"></span>
		      			<h6>Event Name Here</h6>
		      		</div>
		      	</td>
		   </tr>
		   <tr class="inactive sat">
		   		<th><h5>Sat</h5></th>
		      	<td class="day">
		      		<span class="date">7</span>
		      	</td>
		      	<td class="day">
		      		<span class="date">14</span>
		      	</td>
		   </tr>
		</table>
	</div>
	<h2 class="margin-top-20 margin-bottom-10">Upcomming</h2>
	<!-- repeater for events -->
	<div class="upcoming">
	    <ul>
	    	<li class="image"></li>
	    	<li><h4>High School Health Conference</h4></li>
	    	<li>
	    		<p>November 1, 2014</p>
	    		<p>3:30 - 5:30 PM</p>
	    	</li>
	    	<li>
	    		<p>Mississauga Central Library</p>
	    		<p>Meeting Room B</p>
	    	</li>
	    </ul>
	</div>

	<div class="upcoming">
	    <ul>
	    	<li class="image"></li>
	    	<li><h4>High School Health Conference</h4></li>
	    	<li>
	    		<p>November 1, 2014</p>
	    		<p>3:30 - 5:30 PM</p>
	    	</li>
	    	<li>
	    		<p>Mississauga Central Library</p>
	    		<p>Meeting Room B</p>
	    	</li>
	    </ul>
	</div>


	<div class="upcoming">
	    <ul>
	    	<li class="image"></li>
	    	<li><h4>High School Health Conference</h4></li>
	    	<li>
	    		<p>November 1, 2014</p>
	    		<p>3:30 - 5:30 PM</p>
	    	</li>
	    	<li>
	    		<p>Mississauga Central Library</p>
	    		<p>Meeting Room B</p>
	    	</li>
	    </ul>
	</div>
	
	<button class="add-event margin-bottom-20"><i class="margin-right-5 fa fa-plus"></i>Add to Calendar</button>	
</div>
<!-- RIGHT side -->
<div class="right-side events">
<button class="add-event"><i class="margin-right-5 fa fa-plus"></i>Add to calendar</button>
	<!-- Organizations List -->
<!-- 	<div>
		<h2>Explore events by <strong>Organization</strong></h2>
		<ul>
		    <li>Organization 1</li>
		    <li>Organization 1</li>
		    <li>Organization 1</li>
		    <li>Organization 1</li>
		</ul>
	</div> -->
	<!-- SELECTED Event -->
	<div class="selected-event">
		<h2>Event Name</h2>
		<img src="" alt="" />
		<p><img src="" alt="" /> Hosted by Organization Name</p>
		<h4>Type of Event</h4>
		<span>Weekday, Month day, YEAR</span>
		<span>startTime - EndTime</span>
		<span>Event Location</span>
		<!-- social -->
		<section>
			<span>Eventbrite Registration Page</span>
			<span>Facebook Event</span>
			<button><i class="fa fa-share"></i>Share</button>
		</section>

		<section>
			<h4>Notes</h4>
			<p>Additional Details Previously Typed</p>
		</section>
	</div>
	<!-- add an event form -->
	<div>
		<form>
			<h2>Add Title: <input type="text" /></h2>
			<label>Upload Image <input type="file"></label>
			<p><img src="" alt="" /> Hosted by YOUR Organization Name</p>
			<h4>Select type <input type="select"></h4>
			<label>Date <input type="date"></label>
			<!-- social -->
			<section>
				Eventbrite<input placeholder="Registration URL" type="url">
				Facebook<input placeholder="Event Page" type="url">
			</section>

			<section>
				<h4>Notes</h4>
				<textarea placeholder="Add additional details here. They will be shown only for Members. Example: Special share instructions, discount codes, reminders to other organizations"></textarea>
			</section>
			<input type="submit" />
		</form>
	</div>
</div>