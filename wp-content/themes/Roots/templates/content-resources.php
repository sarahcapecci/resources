<!-- Wrapper -->
<div>
	<!-- Left side -->
	<div>
		<h2>Resources</h2>
		<ul>
		    <li>All Resources /</li>
		    <li>Show Only</li>
		    <li>Documents |</li>
		    <li>Links |</li>
		    <li>Contacts</li>
		</ul>
		<p><strong>Welcome to the Torch Resources Database.</strong> This is your home to access a wealth of resources relevant specifically to youth-led organizations in Peel.</p>
		<!-- Search and Upload -->
		<div>
			<span>Search</span>
			<input type="text">
			<span>or</span>
			<button>Upload a Resource</button>
		</div>
		<!-- Modal for upload DOCUMENT -->
		<div>
			<h4>Add a Document</h4>
			<p>Ensure your title is very clear for others to understand and find.</p>
			<form>
				<label>Title<input type="text"></label>
				<label>Type <input type="select"></label>
				<label>Select file<input type="file"></label>
				<label>Description <textarea></textarea></label>
				<label>Tags <textarea></textarea></label>
				<button>Upload</button>
			</form>
		</div>

		<!-- Modal for upload LINK -->
		<div>
			<h4>Add a link</h4>
			<form>
				<label>Category <input type="select"></label>
				<label>Title <input type="text"></label>
				<label>URL/Link <input type="text"></label>
				<label>Tags <textarea></textarea></label>
				<label>Notes <textarea></textarea></label>
				<button>Add Link</button>
			</form>
		</div>

		<!-- Modal for upload CONTACT -->
		<div>
			<h4>Add a Contact</h4>
			<form>
				<label>Contact Name <input type="text"></label>
				<label>Organization/Company <input type="text"></label>
				<label>Job Title/Position <input type="text"></label>
				<label>E-mail <input type="e-mail"></label>
				<label>Phone <input type="number"></label>
				<label>Support <textarea placeholder="Tag how this person can help you or other organizations. E.g mentor, finance, event venues, etc."></textarea></label>
				<button>Add Link</button>
			</form>
		</div>

	<!-- Results -->
		<!-- DOCUMENTS -->
		<div>
			<!-- Color varies with type of document -->
			<div>
				<a href="">Document Name</a>
				<span>Document type</span>
				<span>Date uploaded</span>
			</div>
		</div>
		<!-- LINKS -->
		<div>
			<!-- Always blue -->
			<h3>Funding</h3>
			<div>
				<a href=""><h4>Document Name</h4></a>
				<span>Tags | Tag 1, Tag 2</span>
				<span>Notes | Lorem ipsum ha etobicoke hello</span>
			</div>
			<h3>Venues</h3>
			<div>
				<a href=""><h4>Document Name</h4></a>
				<span>Tags | Tag 1, Tag 2</span>
				<span>Notes | Lorem ipsum ha etobicoke hello</span>
			</div>
			<h3>Services</h3>
			<div>
				<a href=""><h4>Document Name</h4></a>
				<span>Tags | Tag 1, Tag 2</span>
				<span>Notes | Lorem ipsum ha etobicoke hello</span>
			</div>
		</div>
		<!-- CONTACTS -->
		<div>
			<h3>Recently Uploaded</h3>
			<div>
				<a href=""><h4>Contact Name</h4></a>
				<span>Organization Name</span>
				<span class="divider"></span>
				<span>Job title of the contact</span>
				<span>E-mail of the contact</span>
				<span>Phone Number of contact</span>
				<h4>SUPPORT</h4>
				<span>Tags, Tags, Tags</span>
			</div>
		</div>
	</div>
	<!-- Right side -->
	<div>
		<!-- if DOCUMENTS -->
		<h2>Popular Tags</h2>
		<a href="">Most Downloaded</a><a href="">Sort A-Z</a>
		<div>
			<ul>
				<!-- Ng-repeat for tags -->
			    <li>TAG 1 <span>(2)</span></li>
			</ul>
		</div>

		<!-- If LINKS -->

		<h2>Popular</h2>
		<p>Recently added</p>
		<a href="">Most Downloaded</a><a href="">Sort A-Z</a>
		<div>
			<ul>
				<!-- Ng-repeat for links -->
			    <li>
			    	<img src="" alt="">
			    	<h4>Link Name Goes Here</h4>
			    	<p>Who uploaded it?</p>
			    </li>
			</ul>
		</div>

		<!-- if Contacts, EMPTY -->
	</div>
</div>