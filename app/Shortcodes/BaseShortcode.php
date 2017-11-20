<?php

namespace CranleighSchool\PhilosophyZoneTheme\Shortcodes;

abstract class BaseShortcode {

	public function __construct() {
		$this->init();
	}

	private function init() {
		add_shortcode($this->tag, array($this, 'render'));
	}

	abstract public function render($atts, $content = null);

}
