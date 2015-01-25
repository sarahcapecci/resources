<?php
/*
Template Name: Resources-documents Template
*/
?>
<!-- Left side -->
	<?php get_template_part('templates/resources', 'header') ?>
	<!-- Search and Upload -->
	<div class="search-file">
	<form class="inline-block" action="/resources/resources" method="POST">
		<label>Search <input class="text-input" type="text" name="userinput">
		<input type="submit" value=" "><i class="fa fa-search"></i></label>
	</form>
		<span><strong>or</strong></span>
		<button id="open-document">Upload a Resource <i class="fa fa-upload margin-left-5"></i></button>
	
	</div>
</div>

<div class="left-side-bottom documents">
	<h3>Recently Uploaded</h3>	
	<!-- Color varies with type of document -->
	<?php echo do_shortcode(
	'[cfdb-html form="Upload Document" show="title,document-select,doc-description,doc-tags,file-upload,Submitted Login,Submitted" filelinks="url" stripbr="true" filter="doc-tags~~/.*$_POST(docsearch).*/i||title~~/.*$_POST(docsearch).*/i"]
	<div class="document-card doc-type ${document-select}">
		<h4>${title}</h4>
		<span class="type">${document-select}</span>
		<img src="../../wp-content/themes/Roots/assets/img/document.png" alt="">
		<span class="doc-date">${Submitted}</span>
		<div class="overlay">
			<p class="font-light">${doc-description}</p>
			<a class="orange-link" href="${file-upload}">Download File</a>
		</div>
	</div>
	[/cfdb-html]'); ?>
<!-- 
	<h3>TAG</h3>
	<h3>SEARCH RESULT</h3> -->
</div>
<div class="right-side documents">
	<h2>Popular Tags</h2>
	<a class="filter active" href="">Most Downloaded</a> / <a class="filter" href="">Sort A-Z</a>
	<ul>
		<?php 
			$tags = do_shortcode('[cfdb-value form="Upload Document" show="doc-tags"]');
			$tagsArray = explode(",", $tags);

			foreach ($tagsArray as $key => $value) {	    
			    $freqs = array_count_values($tagsArray);
			    $freq_value = $freqs[$value];
			    
			    if(isset($new_array[$value])) {
			    	$new_array[$value] += 1;
			    } else {
			    	$new_array[$value] = 1;
			    }
			    
			}

			foreach ($new_array as $tag => $n) {
			    if($n > 1) {
			    	echo "<li>" . $tag . " <span>(" . $n . ")</span></li>"; 
			    } else {
			    	echo "<li>" . $tag . " <span>(1)</span></li>";
			    }
			}		
		?>
	</ul>
</div>
