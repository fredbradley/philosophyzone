<?php

namespace CranleighSchool\PhilosophyZoneTheme;

use CranleighSchool\PhilosophyZoneTheme\CustomPostTypes\PhilosophyDocsCustomPostType;

class Setup {
	public static function run() {
		RemoveParentThemeSettings::run();
		self::wpActionsFilters();
		self::CustomPostTypes();
	}

	public static function wpActionsFilters() {
		add_action('customize_register', array(self::class, 'remove_custom_header'));
		add_action( 'wp_enqueue_scripts', array(self::class, 'enqueue_styles'));
		add_action('widgets_init', array(get_called_class(), 'register_sidebars'));
	}


	public static function remove_custom_header( $wp_customize ) {
		$wp_customize->remove_section( 'header_image' );
	}
	public static function CustomPostTypes() {
		PhilosophyDocsCustomPostType::run();
		add_filter( 'post_type_link', array(PhilosophyDocsCustomPostType::class,'wpa_show_permalinks'), 1, 2 );

	}

	public static function enqueue_styles() {
		wp_enqueue_style('activities-style', get_stylesheet_directory_uri() . '/css/stylesheet.min.css', ['cranleigh-2016-style']);
		wp_enqueue_style('owlcdn', '//cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css', ['cranleigh-2016-style']);
		wp_enqueue_style('owltheme', '//cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css', ['owlcdn']);
		wp_enqueue_style('owl-carousel', get_stylesheet_directory_uri() . '/template-javascript/owlcss.css', ['owlcdn']);
		wp_enqueue_style('cfont', get_stylesheet_directory_uri() . '/cranfont/styles.css');

		wp_enqueue_script( 'owl-carousel-cdn', '//cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js', ['jquery'], 'owl', false );
		wp_enqueue_script( 'templatejs', get_stylesheet_directory_uri().'/template-javascript/javascript.js', ['jquery','bootstrap'], 'owl', true );
		wp_enqueue_script( 'owl-carousel', get_stylesheet_directory_uri() . '/template-javascript/owljs.js', ['jquery'], 'owl', false );

	}
	public static function cranleigh_2016_get_sidebars() {
		if (function_exists("cs_category_creation_plugin")):
			$sidebars = cs_category_creation_plugin();
		else:
			$sidebars = array();
		endif;

		$section_lead_pages = array("Homepage");

		$other_personalised_sidebars = array("Work At Cranleigh");

		$section_lead_page_sidebars = array();

		foreach (array_merge($section_lead_pages, $other_personalised_sidebars) as $lead_page):
			$sidebars[] = array(
				'name' => esc_html__( $lead_page.' Sidebar', 'cranleigh-2016' ),
				"id" => self::cs_sanitize_slug($lead_page)."-sidebar",
				"description" => "The sidebar for ".$lead_page,
			);
		endforeach;

		$sort = array();
		foreach ($sidebars as $k=>$v):
			$sort['id'][$k] = $v['name'];
		endforeach;

		array_multisort($sort['id'], SORT_ASC, $sidebars);

		return $sidebars;
	}
	public static function cs_sanitize_slug($category) {
		$category = trim($category);
		$category = str_replace(" ", "-", $category);
		$category = strtolower($category);
		return $category;
	}
	public static function register_sidebars() {

		foreach (self::cranleigh_2016_get_sidebars() as $sidebar):
			register_sidebar(
				wp_parse_args($sidebar, self::cranleigh_2016_sidebar_defaults())
			);
		endforeach;
	}

	public static function cranleigh_2016_sidebar_defaults($id=null, $class=null) {
		if ($id==null || $class == null) {
			$id = '%1$s';
			$class = '%2$s';
		}

		return array(
			'before_widget' => '<div id="'.$id.'" class="widget '.$class.'">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-header"><h4 class="widget-title">',
			'after_title'   => '</h4></div>',
		);
	}
}
