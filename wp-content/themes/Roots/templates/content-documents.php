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
	<div>
		<h3 id="document-search">Recently Uploaded</h3>	
		<!-- Color varies with type of document -->
		<?php echo do_shortcode(
		'[cfdb-html form="Upload Document" show="title,document-select,doc-description,doc-tags,file-upload,Submitted Login,Submitted" filelinks="url" stripbr="true" filter="doc-tags~~/.*$_POST(tag_filter).*/i"]
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
	</div>
</div>
<div class="right-side documents">
	<h2>Popular Tags</h2>
	<ul>
	<?php 
		$tags = do_shortcode('[cfdb-value form="Upload Document" show="doc-tags"]');
		$tagsArray = explode(", ", $tags);
		asort($tagsArray);

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
		    	echo "<li><a href='#' class='filter-option'>". $tag. "</a><span class='margin-left-5'>(" . $n . ")</span></li>"; 
		    } else {
		    	echo "<li><a href='#' class='filter-option'>".$tag."</a><span class='margin-left-5'>(1)</span></li>";
		    }
		}	
	?>
	</ul>
	<form class="tag" id="tag-filter-form" method="post" action=" ">
		<input type='text' id='tag-filter' name='tag_filter' value="">	
	</form>
</div>
