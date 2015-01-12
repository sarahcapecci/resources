<!-- Modal for upload DOCUMENT -->
<div class="resource-modal document">
	<h4>Add a Document</h4>
	<p>Ensure your title is very clear for others to understand and find.</p>
	<?php echo do_shortcode('[contact-form-7 id="40" title="Upload Document"]'); ?>
<!-- 	<form>
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
	</form> -->
</div>

<div class="left-side-bottom documents">
	<h3>Recently Uploaded</h3>	
	<!-- Color varies with type of document -->
<!-- 	<div class="document-card doc-type">
		<h4>Document Name</h4>
		<span class="type">Document type</span>
		<span class="doc-date">Date uploaded</span>
		<div class="overlay">
			<p class="font-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa voluptates repellendus, accusantium sed quisquam dolorem necessitatibus blanditiis enim iure omnis fugit laborum, atque esse velit. Assumenda asperiores voluptates doloribus pariatur?</p>
			<a class="orange-link" href="#">Upload File</a>
		</div>
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
	</div> -->

	<?php echo do_shortcode('[cfdb-html form="Upload Document" show="title,document-select,doc-description,doc-tags,file-upload,Submitted Login,Submitted" filelinks="url" stripbr="true"]<div class="document-card doc-type ${document-select}">
		<h4>${title}</h4>
		<span class="type">${document-select}</span>
		<span class="doc-date">${Submitted}</span>
		<div class="overlay">
			<p class="font-light">${doc-description}</p>
			<a class="orange-link" href="${file-upload}">Download File</a>
		</div>
	</div>[/cfdb-html]'); ?>
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