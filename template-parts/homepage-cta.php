<!-- Cards -->
<?php
	$args = array(
		'post_type' => 'homepage-cards',
		'posts_per_page' => -1,
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'tax_query' => array(
			array(
				'taxonomy' => 'card-type',
				'field' => 'slug',
				'terms' => 'homepage',
				'include_children' => true
			)
		)
	);
	$cards = new WP_Query($args);
	?>

	

	<section class="cta">
		<h2 class="sr-only">Useful Links</h2>
		<div class="container-fluid">
			<div class="rows">
				<?php
					if ($cards->have_posts()):
						echo '<div id="owl-demo" class=" owl-carousel owl-theme">';
						while($cards->have_posts()): $cards->the_post(); ?>

				<div class="item">
					<div class="card">
						<div class="card-image">
							<a href="<?php echo get_post_meta(get_the_ID(), 'card_url', true); ?>">
								<?php the_post_thumbnail('homepage-card', array("class"=>"img-responsive")); ?>
							</a>
						</div>
						<div class="card-text">
							<h3><a href="<?php echo get_post_meta(get_the_ID(), 'card_url', true); ?>"><?php the_title(); ?></a></h3>
							<p><?php echo get_post_meta(get_the_ID(), 'card_cta', true); ?></p>
						</div>
					</div>
				</div>

				<?php
						endwhile;
						echo '</div>';
						wp_reset_query();
						wp_reset_postdata();
					else:

				?>

					<div class="col-md-12 text-center">
						<h3 class="text-center">No Cards Found</h3>
						<p><a href="/wp-admin/post-new.php?post_type=homepage-cards" target="_blank">Add some here...</a>
					</div>

				<?php

					endif; // have_posts()

				?>
			</div>
		</div>
	</section> 
