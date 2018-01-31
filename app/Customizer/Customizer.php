<?php
namespace CranleighSchool\PhilosophyZoneTheme;

use WP_Customize_Control;

class Customizer {

	private $customizer;

	public function __construct() {
		add_action("customize_register",array($this,"customizr"));
	}
	private function add_setting($setting, $default=null) {
		return $this->customizer->add_setting($setting, [
			"defualt" => $default,
			"transport" => "postMessage"
		]);
	}

	private function add_section(string $section, string $title, int $priority, string $description, array $moreArr=array()) {
		$meta = [
			"title" => __($title, "cranleigh-2016"),
			"priority" => $priority,
			"description" => $description
		];

		return $this->customizer->add_section($section, array_merge($meta, $moreArr));
	}

	private function add_control(string $setting, array $array) {
		return $this->customizer->add_control(new WP_Customize_Control(
			$this->customizer,
			$setting,
			$array
		));
	}

	public function golfcourse() {
		$setting = "golf-course-status";
		$section = "golfcoursestatus";

		$this->add_section($section, "Golf Course Status", 130, "Is the Golf Course Open of Closed?");

		$this->add_setting($setting, "closed");

		$this->customizer->add_control(new WP_Customize_Control(
			$this->customizer,
			$setting,
			[
				"label" => "Course Status",
				"section" => $section,
				"settings" => $setting,
				"type" => "radio",
				"choices" => [
					"open" => "Open",
					"closed" => "Closed"
				]
			]
		));
	}

	public function philosophyhomepage(  ) {
		$section = "philosophy-homepage";
		$setting = "philosophy-homepage-about";
		$this->add_section($section, "Homepage", 1, "Edit items of text on the homepage");

		$this->add_setting($setting);
		$this->add_control($setting, [
			"label" => "test",
			"section" => $section,
			"settings" => $setting,
			"type" => "wysiwyg"
		]);


	}
	public function customizr($wp_customize)
	{
		$this->customizer = $wp_customize;
		$this->golfcourse();
		$this->philosophyhomepage();


	}

}