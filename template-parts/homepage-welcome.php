<?php
	$cranleigh_settings = get_option("cranleigh_settings", array("welcome"=>"You can set this welcoming paragraph in "));
	if (!isset($cranleigh_settings['welcome'])) {
		$cranleigh_settings['welcome'] = "<p class=\"alert alert-warning\">You can set this welcoming paragraph in your 'Cranleigh Options' settings panel under 'Appearance' in your <a href=\"/wp-admin\" target=\"_blank\">Admin Panel</a></p>";
	}
?>
<section class="welcome entry-content">
		<div class="container">
			<div class="row border-bottom">
				<div class="col-sm-12">
					<h2>Welcome to the Cranleigh Philosophy Zone</h2>
					<?php echo wpautop($cranleigh_settings['welcome']); ?>
				</div>
			</div>
		</div>
	</section>
