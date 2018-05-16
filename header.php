<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package travelplatform
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Muli:400,700|Vollkorn:400,600i,700" rel="stylesheet">
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'travelplatform' ); ?></a>

		<header id="masthead" class="site-header">
			<div class="container">

				<?php if ( is_active_sidebar( 'before_header' ) ) : ?>
				<div id="pre-header" class="widget-area" role="complementary">
				
					<?php
					$languages = apply_filters( 'wpml_active_languages', NULL, 'skip_missing=0' );
					$items = "";


					if ( $languages ) {

						if(!empty($languages)){

							echo '<ul class="custom_lang_switcher menu"><li class="menu-item"><a><i class="fas fa-globe"></i> <span class="lang">'. __('LANGUAGE', 'custom_switcher') .'</span></a><ul class="sub-menu">';

							foreach($languages as $l){
								echo '<li class="menu-item"><a href="' . $l['url'] . '">' . $l['native_name'] . '</a></li>';
							}
							echo'</ul></li></div>';
						}
					}

					?>

					<?php dynamic_sidebar( 'before_header' ); ?>

				</div><!-- #primary-sidebar -->
			<?php endif; ?>


			<div class="site-branding">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
			<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<span class="line"></span>
			</button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
				) );
				?>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
