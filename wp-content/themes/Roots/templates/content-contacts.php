<?php
/*
Template Name: Resources-contact Template
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
		<button id="open-contacts">Upload a Resource <i class="fa fa-upload margin-left-5"></i></button>
	</div>
</div>

<div class="left-side-bottom contact">
	<h3>Recently Uploaded</h3>
	<?php echo do_shortcode('[cfdb-html form="Upload Contact" show="contact-name,contact-organization,job-title,email,phone-number,support-info" stripbr="true"]
		<div class="contact-card">
		<h4>${contact-name}</h4>
			<span class="font-lg font-light">${contact-organization}</span>
			<span class="info-divider"></span>
			<p>${job-title}</p>
			<a class="block" href="mailto:${email}">${email}</a>
			<p>${phone-number}</p>
			<h5 class="margin-top-20">SUPPORT</h5>
			<span>${support-info}</span>
	</div>[/cfdb-html]'); ?>
</div>

<!-- no right side -->