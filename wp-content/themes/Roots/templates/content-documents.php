<!-- Modal for upload DOCUMENT -->
<div class="modal">
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

<div class="left-side-bottom">
	<div class="reduced-width">
		<!-- Color varies with type of document -->
		<div class="document-card doc-type">
			<a href="">Document Name</a>
			<span>Document type</span>
			<span>Date uploaded</span>
		</div>
	</div>
</div>
<div class="right-side">
	<h2>Popular Tags</h2>
	<a href="">Most Downloaded</a><a href="">Sort A-Z</a>
	<div>
		<ul>
			<!-- Ng-repeat for tags -->
		    <li>TAG 1 <span>(2)</span></li>
		</ul>
	</div>
</div>