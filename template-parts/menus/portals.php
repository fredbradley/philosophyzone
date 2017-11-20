<?php
$args = array(
	'post_type' => 'notices',
	'meta_query' => array(
		array(
			'key' => 'notice_expiry',
			'value' => date("Y/m/d"),
			'compare' => '>',
			'type' => 'DATE'
		)
	)
);

$notices = new WP_Query($args);

?>
<nav class="portals" id="portals-menu">
	<ul>
		<li>
			<a target="_blank" href="https://www.cranleigh.org/">cranleigh.org</a>
		</li>
		<li>
			<a href="<?php echo esc_url( network_home_url( '/search/' ) ); ?>" class="show-search">
				<i class="fa fa-fw fa-search"></i>
			</a>
		</li>


	</ul>




	<div id="search" class="fade popup search">
		<?php get_search_form(); ?>
	</div>
</nav>
