<?php
class CranleighChildThemeCustomizer {

	public function __construct() {
		add_action("customize_register",array($this,"customizr"));
	}

	public function customizr($wp_customize)
	{
	
		$wp_customize->add_section("golfcoursestatus", array(
			"title" => __("Golf Course Status", "cranleigh-2016"),
			"priority" => 130,
			"description" => "Is the Golf Course Open or Closed?"
		));
	
		$wp_customize->add_setting("golf-course-status", array(
			"default" => "open",
			"transport" => "postMessage",
		));
	
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"golf-course-status",
			array(
				"label" => __("Course Status", "cranleigh-2016"),
				"section" => "golfcoursestatus",
				"settings" => "golf-course-status",
				"type" => "radio",
				'choices'  => array(
					'open'  => 'Course Open',
					'closed' => 'Course Closed',
				),
			)
		));
		
		$wp_customize->add_setting("golf-course-status-message", array(
			"default" => "",
			"transport" => "postMessage"
		));
		
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"golf-course-status-message",
			array(
				"label" => __("Message", "cranleigh-2016"),
				"section" => "golfcoursestatus",
				"settings" => "golf-course-status-message",
				"type" => "textarea",
				
			)
		));
		$wp_customize->add_setting("golf-course-status-widget", array(
			"default" => 0,
			"transport" => "postMessage"
		));
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"golf-course-status-widget",
			array(
				"label" => __("Show Widget?", "cranleigh-2016"),
				"section" => "golfcoursestatus",
				"settings" => "golf-course-status-widget",
				"type" => "checkbox"
			)
		));

	}



	}
	new CranleighChildThemeCustomizer();