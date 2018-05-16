<?php 
/* Template Name: Hotel Page 
* Template Post Type: hotels
*/

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
 * @package eclore
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();


/*
$categories = get_the_category();
echo "<pre>"; 
var_dump($categories);
echo "</pre>";

*/

		?>


		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				
				<div id="main-image">
					<?php travelplatform_post_thumbnail(); ?>
				</div>			


			</header><!-- .entry-header -->

			

			<div class="entry-content">

				<div class="container">

					<div class="hotel-content">
						<div class="square">
							<h3><?php the_title(); ?></h3>


							<p class="location">LOCATION: <b><?php echo the_field('location');?></b></p>
							<p class="price">PRICE:<b> <?php  echo the_field('price');?></b></p>
							<p class="pros"><?php echo the_field('pros');?></p>
							<p class="conts"><?php  echo the_field('contras');?></p>
							<a class="btn" target="bank" href="<?php echo the_field('link');?>">Check Availability</a>
						</div>
					</div>
					<div class="hotel-gallery">

								<?php 
								$imgs = get_field('gallery');
								$images_id;
								foreach( $imgs as $img):
									

									$image_id = $img->ID;
									
									$image_id = str_replace("int(", "", $image_id);
									$image_id = str_replace(")", "", $image_id);
					
									$images_id = $images_id.', ' . $image_id;
									

							    endforeach;
								
								
								$shortcode = '[' . 'gallery ids="' .$images_id. '" size="medium"]';
								echo do_shortcode( $shortcode );
								$images_id="";
								
								?> 
								
							
							</div>

					<?php 
					
					if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php travelplatform_posted_on(); ?>

					</div><!-- .entry-meta -->
					<?php
					endif; ?>

					<?php
					the_content( sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'travelplatform' ),
							array(
								'span' => array(
									'class' => array(),
									),
								)
							),
						get_the_title()
						) );


						?>



						

					</div><!-- .entry-content -->




				</article><!-- #post-<?php the_ID(); ?> -->

				<?php


			endwhile; // End of the loop.
			?>



		</main><!-- #main -->
	</div><!-- #primary -->


</div>
<?php

get_footer();
