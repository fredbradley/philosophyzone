<?php
/**
 * The template for displaying the homepage.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cranleigh-2016
 */

get_header();
cranleigh_2016_hero_image();
?>

<main id="main" class="site-main" role="main">

	<?php // get_template_part('template-parts/homepage', 'cta'); ?>
	<?php get_template_part('template-parts/homepage', 'welcome'); ?>
	<?php get_template_part('template-parts/homepage', 'newsalt'); ?>

</main><!-- #main -->

<?php
get_footer();

