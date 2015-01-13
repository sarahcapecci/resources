<?php
/*
Template Name: Resources-contact Template
*/
?>
<!-- Left side -->
	<?php get_template_part('templates/resources', 'header') ?>
	<!-- Search and Upload -->
	<div class="search-file">
	<form action=" " method="POST">
		<label>Search <input class="text-input" type="text" name="contactsearch"><input type="submit" value=" "><i class="fa fa-search"></i></label>
		<span><strong>or</strong></span>
		<button>Upload a Resource <i class="fa fa-upload margin-left-5"></i></button>
	</form>
	</div>
</div>
<!-- Modal for upload CONTACT -->
<div class="resource-modal">
	<h4>Add a Contact</h4>
	<?php echo do_shortcode('[contact-form-7 id="17" title="Upload Contact"]'); ?>
</div>

<div class="left-side-bottom contact">
	<h3>Recently Uploaded</h3>
	<?php echo do_shortcode('[cfdb-html form="Upload Contact" show="contact-name,contact-organization,job-title,email,phone-number,support-info" stripbr="true" filter="contact-name~~/.*$_POST(contactsearch).*/i||support-info~~/.*$_POST(contactsearch).*/i"]
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