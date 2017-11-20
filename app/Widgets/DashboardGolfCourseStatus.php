<?php

namespace CranleighSchool\CranleighActivitiesTheme\Widgets;

class DashboardGolfCourseStatus {
		public function __construct() {
			add_action('wp_dashboard_setup', array($this,'add_dashboard_widgets' ));
		}

		public function dashboard_widget_function( $post, $callback_args ) {
		if (isset($_POST['golf-course-status'])) {
			set_theme_mod('golf-course-status', $_POST['golf-course-status']);
			set_theme_mod('golf-course-status-message', $_POST['golf-course-status-message']);
			if (isset($_POST['golf-course-status-widget'])) {
				set_theme_mod('golf-course-status-widget', true);
			} else {
				set_theme_mod('golf-course-status-widget', false);
			}
		}
		$theme_mod = get_theme_mod( 'golf-course-status' );
		$current_status = get_theme_mod("golf-course-status");
		?>
		<p><strong>Current Status: <?php echo ucwords($current_status); ?></strong></p>
		<form method="post">
			<input type="radio" name="golf-course-status" value="open" <?php if ($current_status=="open") echo "checked"; ?> />Open<br />
			<input type="radio" name="golf-course-status" value="closed" <?php if ($current_status=="closed") echo "checked"; ?> />Closed

			<p>Message</p>
			<div class="textarea-wrap" id="golf-course-status-message-wrap">
			<textarea name="golf-course-status-message" id="golf-course-status-message" style="margin: 0 0 8px;
    padding: 6px 7px;" class="mceEditor" rows="3" cols="15" autocomplete="off" style="overflow: hidden; height: 33px;"><?php echo get_theme_mod('golf-course-status-message'); ?></textarea>
		</div>
		<p><input type="checkbox" name="golf-course-status-widget" <?php if (get_theme_mod('golf-course-status-widget')===true) echo "checked"; ?> />Show Sidebar Widget</p>
			<p><input class="button button-primary" type="submit" /></p>
		</form>
		<?php
	}

	// Function used in the action hook
	public function add_dashboard_widgets() {
		add_meta_box('dashboard_widget', 'Golf Course Status', array($this,'dashboard_widget_function'), 'dashboard', 'side', 'high');
		wp_add_dashboard_widget('dashboard_widget', 'Example Dashboard Widget', 'dashboard_widget_function');
	}
}
