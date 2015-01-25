<?php
/*
Template Name: Resources-links Template
*/
?>
<!-- Left side -->
	<?php get_template_part('templates/resources', 'header') ?>
	<!-- Search and Upload -->
	<div class="search-file">
	<form class="inline-block" action="/resources/resources" method="POST">
		<label>Search <input class="text-input" type="text" name="userinput"><input type="submit" value=" "><i class="fa fa-search"></i></label>
	</form>
		<span><strong>or</strong></span>
		<button id="open-links">Upload a Resource <i class="fa fa-upload margin-left-5"></i></button>
	</div>
</div>
<div class="left-side-bottom links">
	<!-- Always blue -->
	<h3>Funding</h3>
	<?php echo do_shortcode('[cfdb-html form="Upload link" show="link-title,link-notes,link-tags,select-category,link-url" filelinks="url" stripbr="true" filter="select-category=Funding"]<div class="link-card">
		<a href="${link-url}" target="_blank"><h4>${link-title}</h4></a>
		<div>
			<span><strong>Tags |</strong> ${link-tags}</span>
			<span><strong>Notes |</strong> ${link-notes}</span>
		</div>
</div>[/cfdb-html]'); ?>
	<h3>Venues</h3>
		<?php echo do_shortcode('[cfdb-html form="Upload link" show="link-title,link-notes,link-tags,link-url,select-category" filelinks="link" stripbr="true" filter="select-category=Venue"]<div class="link-card">
			<a href="${link-url}" target="_blank"><h4>${link-title}</h4></a>
			<div>
				<span><strong>Tags |</strong> ${link-tags}</span>
				<span><strong>Notes |</strong> ${link-notes}</span>
			</div>
	</div>[/cfdb-html]'); ?>
	<h3>Services</h3>
	<?php echo do_shortcode('[cfdb-html form="Upload link" show="link-title,link-notes,link-tags,select-category,link-url" filelinks="url" filter="select-category=Services" stripbr="true"]<div class="link-card">
			<a href="${link-url}" target="_blank"><h4>${link-title}</h4></a>
			<div>
				<span><strong>Tags |</strong> ${link-tags}</span>
				<span><strong>Notes |</strong> ${link-notes}</span>
			</div>
	</div>[/cfdb-html]'); ?>

</div>
<div class="right-side">
	<h2>Popular</h2>
	<p>Recently added</p>
	<ul>
	<?php echo do_shortcode('[cfdb-html form="Upload link" show="link-title,link-url,Submitted Login" filelinks="link"]
		<li>
			<div class="orange"></div>
			<div>
				<h4>${link-title}</h4>
				<p>${Submitted Login}</p>
			</div>
		</li>[/cfdb-html]'); ?>	
	</ul>
</div>