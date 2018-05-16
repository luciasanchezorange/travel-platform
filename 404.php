<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package travelplatform
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found container">
				<img src="/wp-content/themes/travelplatform/images/search.png">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'travelplatform' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content" style="margin-bottom: 30px">


					<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'travelplatform' ); ?></p>

					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Take me back to <?php bloginfo( 'name' ); ?></a>

					<p><br></p>
<!--
					<?php
						get_search_form();

						the_widget( 'WP_Widget_Recent_Posts' );
					?>

	-->				

					<?php

						/* translators: %1$s: smiley */
					?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
