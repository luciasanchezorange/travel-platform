<?php 
/* Template Name: Main home Page */
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Travel Platform
 */

get_header(); ?>

<div id="primary" class="content-area destination-page">
	<main id="main" class="site-main"> 
		<?php
		if ( have_posts() ) :


			/* Start the Loop */
		while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php get_template_part( 'template-parts/content', 'header-intro' ); ?>

			
			<section id="main-page-sites" class="container">
				<?php if( have_rows('sites_links') ):

				while ( have_rows('sites_links') ) : the_row();

				$url = get_sub_field('destination_url');
				
				if ($url) {

					?>
					<a target="_blank" href="<?php the_sub_field('destination_url'); ?>" style="background:url('<?php the_sub_field('destination_image'); ?>')">


						<h2><?php the_sub_field('destination_name'); ?></h2>
					</a>

					<?php 
				}
				else {

					?>
					<a style="background:url('<?php the_sub_field('destination_image'); ?>')">


						<h2><?php the_sub_field('destination_name'); ?></h2>
					</a>

					<?php 



				}

			
				endwhile;
				else :

					endif;

				?>

			</section>






			<?php if ( get_edit_post_link() ) : ?>


		<?php endif; ?>
	</article><!-- #post-<?php the_ID(); ?> -->
	<?php
	endwhile;

	the_posts_navigation();

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif; ?>

</main><!-- #main -->
</div><!-- #primary -->

<?php

get_footer();
