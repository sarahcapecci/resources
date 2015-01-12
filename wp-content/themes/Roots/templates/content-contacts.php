<!-- Modal for upload CONTACT -->
<div class="resource-modal">
	<h4>Add a Contact</h4>
	<?php echo do_shortcode('[contact-form-7 id="17" title="Upload Contact"]'); ?>
</div>

<div class="left-side-bottom contact">
	<h3>Recently Uploaded</h3>
	<?php echo do_shortcode('[cfdb-html form="Upload Contact" show="contact-name,contact-organization,job-title,email,phone-number,support-info" stripbr="true"]<div class="contact-card">
		<a href="#">
		<h4>${contact-name}</h4>
			<span class="font-lg font-light">${contact-organization}</span>
			<span class="info-divider"></span>
			<p>${job-title}</p>
			<p>${email}</p>
			<p>${phone-number}</p>
			<h5 class="margin-top-20">SUPPORT</h5>
			<span>${support-info}</span>
		</a>
	</div>[/cfdb-html]'); ?>
</div>

<!-- no right side -->