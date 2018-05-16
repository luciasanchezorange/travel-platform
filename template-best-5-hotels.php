<?php 
/* Template Name: Best 5 hotels Page */
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

			

		?>

		<?php
		/* Start the Loop */
		while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php get_template_part( 'template-parts/content', 'header-intro' ); ?>

			<?php	
			/* hotels */ ?>

			<section id="hotels">
				<div class="">

					<?php	

					$post_objects = get_field('hotels');
					$count = '';
					if( $post_objects ): ?>
					<div id="hotel-list">
						<?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) 
						$count++;
						$even_odd_class = ( ($count % 2) == 0 ) ? "even" : "odd"; 

						setup_postdata($post); ?>
						<article class="hotel-highlights <?php echo $even_odd_class ?>">
							<div class="container">

								<div class="hotel-gallery">

									<?php 
									$imgs = get_field('gallery');
									$images_id ="";

									foreach( $imgs as $img):


										$image_id = $img["ID"];
										$image_id = str_replace("int(", "", $image_id);
										$image_id = str_replace(")", "", $image_id);

										$images_id = $images_id . $image_id.', ';


									endforeach;

									if(wp_is_mobile()) // On mobile
									{
										$shortcode = '[' . 'gallery ids="' .$images_id. '" size="hotel-feaured-mobile"  rel="lightbox"]';
									}
									else
									{
										$shortcode = '[' . 'gallery ids="' .$images_id. '" size="hotel-feaured"  rel="lightbox" captiontag="div"]]';
									}

									echo do_shortcode( $shortcode );
									$images_id="";
									?> 

								</div>

								<div class="hotel-content">
									<div class="square">
										<h3><?php the_title(); ?></h3>
										
										<?php 

										$location_text = get_field('location');
										$location_url = get_field('location_url');

										if ($location_url) : ?>

											<p class="location">LOCATION: <b> <a href="<?php echo $location_url;?>"> <?php echo $location_text ?> </b></a></p>
										
											<?php

										elseif ($location_text) : ?>
											<p class="location">LOCATION: <b> <?php echo $location_text;?></b></p>
											<?php
										
										endif; ?>

											<p class="price"> <?php __('PRICE', 'travelplatform') ?> PRICE:<b> <?php  echo get_field('price');?></b></p>
											<ul class="pros">

												<?php if( have_rows('pros') ):

												while ( have_rows('pros') ) : the_row(); ?>

												<li><?php the_sub_field('pro_item'); ?> </li>

												<?php
											endwhile;
										else :

										endif;

										?>
									</ul>
									<?php $hero = get_field('contras_group');?>


									<p class="conts"> <b> <?php echo $hero['cons_title'];?> </b>
										<?php echo $hero['cons_text'];?> </p>

										<?php $show_availability_button = get_field('show_availability_button');

										if ($show_availability_button)  : ?>
										<a rel="nofollow" class="btn" target="bank" href="<?php echo get_field('link');?>"><?php echo get_field('text_button');?></a>

										<?php
										endif; ?>

									</div>
								</div>

							</div>
						</article>
					<?php endforeach; ?>
				</div>
				<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			<?php endif;

			/* END hotels */

			?>
		</div>

	</section>


	<?php 
	/* FILTER SECTION */



	$show_filter_section = get_field('show_filter_section');

	if ($show_filter_section)  : ?>

	<section id="filter" class="container">
		<div class="aligncenter">
			<h2> <?php the_field('filter_title'); ?></h2>

		</div>
		<div id="filters">

			<?php

			if( have_rows('filters') ):?>

			<?php
			while ( have_rows('filters') ) : the_row(); ?>

			<ul class="links">

				<img src="<?php the_sub_field('filter_icon'); ?>">
				<h4><?php the_sub_field('filter_name'); ?></h4>

				<?php if( have_rows('filter_item') ):
				?>

				<?php while ( have_rows('filter_item') ) : the_row(); ?>

					<li><a href="<?php the_sub_field('filter_link_text'); ?>"><?php the_sub_field('filter_link_text'); ?></a></li>		

					<?php 
				endwhile;
			else :

			endif;
			?>
		</ul>

		<?php
	endwhile;
else :

endif;

?>

</div>
</section>	

<?php
endif; 

/*More info section*/


 get_template_part( 'template-parts/content', 'more-info' ); 



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
