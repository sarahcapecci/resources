<!-- Modal for upload DOCUMENT -->
<div class="resource-modal document">
	<h4>Add a Document</h4>
	<p>Ensure your title is very clear for others to understand and find.</p>
	<form>
		<label>Title<input type="text"></label>
		<label>Type 
		<select name="carlist" form="carform">
		  <option value="volvo">PDF</option>
		  <option value="saab">Word</option>
		  <option value="opel">Excel</option>
		  <option value="audi">JPG</option>
		</select>
		</label>
		<label>Select file<input type="file"></label>
		<label class="textarea">Description <textarea placeholder="Use sentences to dsecribe this document."></textarea></label>
		<label class="textarea">Tags <textarea placeholder="Financial, Mississauga, Budget, Finance, Other Tags, Tags, More Tags, All Tags"></textarea></label>
		<button><i class="fa fa-upload margin-right-5"></i>Upload</button>
	</form>
</div>

<div class="left-side-bottom documents">
	<h3>Recently Uploaded</h3>	
	<!-- Color varies with type of document -->
	<div class="document-card doc-type">
		<a href=""><h4>Document Name</h4></a>
		<span class="type">Document type</span>
		<span class="doc-date">Date uploaded</span>
	</div>
	<div class="document-card doc-type">
		<a href=""><h4>Document Name</h4></a>
		<span class="type">Document type</span>
		<span class="doc-date">Date uploaded</span>
	</div>
	<div class="document-card doc-type">
		<a href=""><h4>Document Name</h4></a>
		<span class="type">Document type</span>
		<span class="doc-date">Date uploaded</span>
	</div>
	<div class="document-card doc-type">
		<a href=""><h4>Document Name</h4></a>
		<span class="type">Document type</span>
		<span class="doc-date">Date uploaded</span>
	</div>
</div>
<div class="right-side documents">
	<h2>Popular Tags</h2>
	<a class="filter active" href="">Most Downloaded</a> / <a class="filter" href="">Sort A-Z</a>
	<ul>
		<!-- Ng-repeat for tags -->
	    <li>TAG 1 <span>(2)</span></li>
	    <li>TAG 1 <span>(2)</span></li>
	    <li>TAG 1 <span>(2)</span></li>
	    <li>TAG 1 <span>(2)</span></li>
	    <li>TAG 1 <span>(2)</span></li>
	    <li>TAG 1 <span>(2)</span></li>
	</ul>
</div>