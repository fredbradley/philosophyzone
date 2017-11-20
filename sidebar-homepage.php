<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cranleigh-2016
 */
?>

<aside id="secondary" class="col-sm-4 widget-area" role="complementary">
	
	<?php if (get_theme_mod('golf-course-status-widget')===true): ?>
		<div id="golf-course-status-widget" class="widget notice golf-course-status-widget">
			<div class="widget-header">
				<h4 class="widget-title">Golf Course Status</h4>
			</div>	
			<p>The golf course is currently: <strong><?php echo ucwords(get_theme_mod('golf-course-status')); ?>.</strong></p>
			<?php
				if (!empty(get_theme_mod('golf-course-status-message'))) 
					echo wpautop(get_theme_mod('golf-course-status-message')); ?>
		</div>
	<?php endif; ?>
	
	<?php dynamic_sidebar( 'homepage-sidebar' ); ?>

</aside><!-- #secondary -->

