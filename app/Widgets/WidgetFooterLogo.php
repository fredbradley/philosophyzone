<?php
if (!class_exists("Cranleigh_Footer_Logo")):
class Cranleigh_Footer_Logo extends WP_Widget {
	function __construct() {
		$widget_ops = array(
			'classname' => 'footer-logo',
			'description' => 'Shows the logo for the Site Footer'
		);
		parent::__construct('footer-logo', 'Cranleigh Footer Logo', $widget_ops);
	}

	function widget($args, $instance) {
				echo $args['before_widget'];
?>
		<a href="<?php echo esc_url(get_option('cranleigh_settings')['logo_ahref']); ?>">
			<img class="img-responsive" src="<?php echo esc_url(get_stylesheet_directory_uri());?>/img/logo.jpg" alt="" />
		</a>
		<?php
			echo $args['after_widget'];
	}

	function update($new_instance, $old_instance) {
		$instance = array();
		$instance['safeguarding_text'] = ( ! empty( $new_instance['safeguarding_text'] ) ) ? strip_tags( $new_instance['safeguarding_text'] ) : '';

		return $instance;
	}

	function form($instance) {
		$safeguarding_text = ! empty( $instance['safeguarding_text'] ) ? $instance['safeguarding_text'] : __( 'Cranleigh School is committed to the safeguarding of children and child protection.', 'cranleigh-2016' );
		echo '<br />This widget is uneditable, you need a coder to have a look at the plugin code to change the image<br /><br />';
		?><?php
	}
}
endif;
