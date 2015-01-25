<!-- Left side -->
	<?php get_template_part('templates/resources', 'header') ?>
	<!-- Search and Upload -->
	<div class="search-file">
		<form class="inline-block" action=" " method="POST">
			<label>Search
				<input class="text-input" type="text" name="userinput" />
				<input type="submit" value=" "><i class="fa fa-search"></i>
			</label>
		</form>
	</div>
</div>
<div class="left-side-bottom">
	<h3>Search Result</h3>
	<div>
		<h3>Documents</h3>
		<div id="document-search-result">
			<?php echo do_shortcode(
				'[cfdb-html form="Upload Document" show="title,document-select,doc-description,doc-tags,file-upload,Submitted Login,Submitted" filelinks="url" stripbr="true" filter="doc-tags~~/.*$_POST(userinput).*/i||title~~/.*$_POST(userinput).*/i"]
				<div class="document-card doc-type all ${document-select}">
					<h4>${title}</h4>
					<span class="type">${document-select}</span>
					<img src="wp-content/themes/Roots/assets/img/document.png" alt="">
					<span class="doc-date">${Submitted}</span>
					<div class="overlay">
						<p class="font-light">${doc-description}</p>
						<a class="orange-link" href="${file-upload}">Download File</a>
					</div>
				</div>
				[/cfdb-html]'); ?>
				<p>Sorry, there's no match!</p>
		</div>
		<h3>Links</h3>
		<div id="link-search-result">
			<?php echo do_shortcode('[cfdb-html form="Upload link" show="link-title,link-notes,link-tags,select-category,link-url" filelinks="url"  stripbr="true" filter="link-title~~/.*$_POST(userinput).*/i||link-tags~~/.*$_POST(userinput).*/i"]<div class="link-card">
				<a href="${link-url}" target="_blank"><h4>${link-title}</h4></a>
				<span><strong>Tags |</strong> ${link-tags}</span>
				<span><strong>Notes |</strong> ${link-notes}</span>
		</div>[/cfdb-html]'); ?>
		<p>Sorry, there's no match!</p>
			
		</div>
		<h3>Contacts</h3>
		<div id="contact-search-result">
			<?php echo do_shortcode('[cfdb-html form="Upload Contact" show="contact-name,contact-organization,job-title,email,phone-number,support-info" stripbr="true" filter="contact-name~~/.*$_POST(userinput).*/i||support-info~~/.*$_POST(userinput).*/i"]<div class="contact-card">
				<h4>${contact-name}</h4>
					<span class="font-lg font-light">${contact-organization}</span>
					<span class="info-divider"></span>
					<p>${job-title}</p>
					<a class="block" href="mailto:${email}">${email}</a>
					<p>${phone-number}</p>
					<h5 class="margin-top-20">SUPPORT</h5>
					<span>${support-info}</span>
			</div>[/cfdb-html]'); ?>
			<p>Sorry, there's no match!</p>
		</div>
	</div>
</div>
	