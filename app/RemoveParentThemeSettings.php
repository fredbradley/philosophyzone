<?php
/**
 * Created by PhpStorm.
 * User: fredbradley
 * Date: 23/10/2017
 * Time: 11:44
 */

namespace CranleighSchool\PhilosophyZoneTheme;

class RemoveParentThemeSettings {

	public static function run() {
		add_action("widgets_init", array(__CLASS__, "remove_sidebars"), 11);
		add_action("init", array(__CLASS__, "register_menus"));
		add_action("wp_enqueue_scripts", array(__CLASS__, "my_theme_enqueue_styles"));
	}

	public static function my_theme_enqueue_styles() {
		wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	}

	public static function remove_sidebars() {
		$remove = [
			"admissions",
			"cranleigh-activities",
			"development",
			"information",
			"our-family",
			"our-school",
			"welcome",
			"beyond-cranleigh",
			"careers",
			"cranleigh-friends",
			"foundation",
			"work-at-cranleigh",
			"our-ethos",
			"medical-centre",
			"sportsdesk",
			"headmaster"
		];

		foreach ($remove as $sidebar):
			unregister_sidebar( $sidebar.'-sidebar' );
		endforeach;
	}

	public static function register_menus() {
		register_nav_menus(
			array(
				"main-menu" => __('Main Menu')
			)
		);
	}
}
