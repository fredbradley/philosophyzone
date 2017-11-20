<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cranleigh-2016
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php
		// If the site is loading the dev or staging version then tell robots not to follow or index it!
		if (strpos($_SERVER['HTTP_HOST'], "dev.org") || strpos($_SERVER['HTTP_HOST'], "stg.org")) {
			echo "<meta name=\"robots\" content=\"noindex, nofollow\" />";
		}
	?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<!--[if lt IE 9]>
<?php // Only crucial fixes. Let's not take this too far ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie.css">
<?php // Micro shim for non-HTML5 browsers ?>
	<script>
		var html5elements = ['header', 'footer', 'nav', 'article', 'section', 'aside'];
		for (var i = html5elements.length - 1; i >= 0; i--) {
			document.createElement(html5elements[i]);
		}
	</script>
<![endif]-->
<?php // If the site is loading the dev or staging version then tell robots not to follow or index it!
		if ((strpos($_SERVER['HTTP_HOST'], "dev.org") || strpos($_SERVER['HTTP_HOST'], "stg.org")) && is_user_logged_in()===false) {
			?><!-- Hotjar Tracking Code for http://www.cranleighstg.org -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:412422,hjsv:5};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
</script><?php
		}
		?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'cranleigh-2016' ); ?></a>
		<header id="masthead" class="site-header" role="banner">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-right">
						<?php get_template_part('template-parts/menus/portals');
?>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12">
						<?php
							// Site title for accessibility and SEO
							if ( is_front_page() ) : ?>
								<h1 class="sr-only"><a href="<?php echo esc_url( network_home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php else : ?>
								<p class="sr-only"><a href="<?php echo esc_url( network_home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
							endif;
						?>

						<a href="<?php echo esc_url(get_option('cranleigh_settings')['logo_ahref']); ?>">
							<?php if (file_exists(get_stylesheet_directory_uri().'/img/logo.jpg')) { ?>
								<img class="img-responsive" src="<?php echo esc_url( get_stylesheet_directory_uri() );?>/img/logo.jpg" alt="logo">
							<?php } else {
								echo '<h1 class="text-site-title">'.get_bloginfo().'</h1>';
							} ?>
						</a>

					</div>

					<div class="col-xs-4 col-sm-offset-4">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
				</div>

				<?php get_template_part( 'template-parts/menus/main' ); // 'template-parts/menus/mega.php'; ?>
			</div>
		</header><!-- #masthead -->

		<div id="content" class="site-content">

