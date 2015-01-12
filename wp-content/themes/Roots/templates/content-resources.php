<!-- Wrapper -->
<div>
	<!-- Left side -->
	<div class="left-side-top">
		<h2>Resources</h2>
		<ul class="select-filter">
		    <li>All Resources /</li>
		    <li class="middle-gray-txt">Show Only</li>
		    <li class="blue-txt">Documents |</li>
		    <li class="blue-txt">Links |</li>
		    <li class="blue-txt active">Contacts</li>
		</ul>
		<p class="description"><strong>Welcome to the Torch Resources Database.</strong> This is your home to access a wealth of resources relevant specifically to youth-led organizations in Peel.</p>
		<!-- Search and Upload -->
		<div class="search-file">
			<label>Search <input class="text-input" type="text"><input type="submit" value=" "><i class="fa fa-search"></i></label>
			<span><strong>or</strong></span>
			<button>Upload a Resource <i class="fa fa-upload margin-left-5"></i></button>
		</div>
	</div>

	<?php get_template_part('templates/content', 'documents'); ?>
	