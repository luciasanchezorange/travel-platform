<?php 
/* Template Name: Destination home Page */
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


<?php 



/*More info section*/

get_template_part( 'template-parts/content', 'more-info' ); ?>





<?php 

/* Discover section*/
$show_discover_section = get_field('show_discover_section');

if ($show_discover_section)  : ?>


<section id="discover">
	<div class="container">
		<h2>Discover in <?php the_field('location'); ?></h2>

		<p class="intro-text"><?php the_field('discover_intro_text'); ?></p>




		<?php if( have_rows('discover_items') ):
		?> <ul class="discover-blocks">
			<?php	while ( have_rows('discover_items') ) : the_row(); ?>

				<li style="background-image:url(<?php the_sub_field('discover_image'); ?> )"> 

					<h3> <?php the_sub_field('discover_title'); ?><span class="location-name"><?php the_field('location'); ?></span></h3>
				</li>
				<?php


			endwhile;
		else :

		endif;

		?>

	</ul>







</div>
</section>


<?php
endif; ?>




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
