<?php
/*
Template Name: Resources-links Template
*/

	global $current_user;
    get_currentuserinfo();
    $avatar = get_avatar($current_user->ID, 32);
    echo '<span class="invisible" id="avatar-value">'.$avatar.'</span>';
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
	<div class="category-filter">
		<h3>Filter by:</h3>
		<button class="link-filter" data-filter="funding">Funding</button><button class="link-filter" data-filter="venue">Venues</button><button class="link-filter" data-filter="service">Services</button>
	</div>
</div>
<div class="left-side-bottom links">
	<div class="link-section" id="funding-sec">
	<h3>Funding</h3>
	<?php echo do_shortcode('[cfdb-html form="Upload link" show="submit,link-title,link-notes,link-tags,select-category,link-url" filelinks="url" stripbr="true" filter="select-category=Funding"]<div class="link-card">
		<a class="resource-link" data-id="${submit_time}" href="${link-url}" target="_blank"><h4>${link-title}</h4></a>
		<div>
			<span><strong>Tags |</strong> ${link-tags}</span>
			<span><strong>Notes |</strong> ${link-notes}</span>
		</div>
</div>[/cfdb-html]'); ?>
	</div>
	<div class="link-section" id="venue-sec">
	<h3>Venues</h3>
		<?php echo do_shortcode('[cfdb-html form="Upload link" show="submit,link-title,link-notes,link-tags,link-url,select-category" filelinks="link" stripbr="true" filter="select-category=Venue"]<div class="link-card">
			<a class="resource-link" data-id="${submit_time}" href="${link-url}" target="_blank"><h4>${link-title}</h4></a>
			<div>
				<span><strong>Tags |</strong> ${link-tags}</span>
				<span><strong>Notes |</strong> ${link-notes}</span>
			</div>
	</div>[/cfdb-html]'); ?>
	</div>
	<div class="link-section" id="service-sec">
	<h3>Services</h3>
	<?php echo do_shortcode('[cfdb-html form="Upload link" show="submit,link-title,link-notes,link-tags,select-category,link-url" filelinks="url" filter="select-category=Services" stripbr="true"]<div class="link-card">
			<a class="resource-link" data-id="${submit_time}" href="${link-url}" target="_blank"><h4>${link-title}</h4></a>
			<div>
				<span><strong>Tags |</strong> ${link-tags}</span>
				<span><strong>Notes |</strong> ${link-notes}</span>
			</div>
	</div>[/cfdb-html]'); ?>
	</div>
</div>
<div class="right-side">
	<h2>Popular</h2>
	<p><a id="sort-recent" class="black-link" href="#">Recently Added</a> / <a id="sort-popular" class="black-link" href="#">Popular</a></p>
	<ul id="recent-sorted">
	<?php echo do_shortcode('[cfdb-html form="Upload link" show="link-title,link-url,Submitted Login" filelinks="link"]
		<li>
			<div class="links">
				<h4><a class="black-link" href="${link-url}">${link-title}</a></h4>
				<p>${Submitted Login}</p>
			</div>
		</li>[/cfdb-html]'); ?>	
	</ul>
	<ul id="popular-sorted">
		<?php 

		// *************
		// echoing the popular LINKS
		$db_link = mysql_connect("localhost", "root", "root");
		mysql_select_db("resources", $db_link);

		$query = "SELECT field_value, file_downloads, submit_time FROM wp_cf7dbplugin_submits WHERE field_name = 'link-title'  ORDER BY file_downloads DESC";

		$result = mysql_query($query) or die(mysql_error());

		while($row = mysql_fetch_assoc($result)) {
			$link_id = $row['submit_time'];
			
			//getting who posted
			$second_query = "SELECT field_value, submit_time FROM wp_cf7dbplugin_submits WHERE submit_time = $link_id  AND field_name = 'Submitted Login' ";
			$second_result = mysql_query($second_query) or die(mysql_error());

			while ($second_row = mysql_fetch_assoc($second_result)) {
				//getting LINK
				$third_query = "SELECT field_value FROM wp_cf7dbplugin_submits WHERE submit_time = $link_id  AND field_name = 'link-url' ";

				$third_result = mysql_query($third_query) or die(mysql_error());

				while($third_row = mysql_fetch_assoc($third_result)) {
					echo '<li><div class="links"><h4><a class="black-link" href="'.$third_row['field_value'].'">'.$row['field_value'].'</a></h4></div>';
					echo '<p>'.$second_row['field_value'].'</p></li>';
				}
			}
		}
		?>
	</ul>
</div>