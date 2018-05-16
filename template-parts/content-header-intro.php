<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package travelplatform
 */

?>

<?php 
if ( is_page_template( 'template-where-to.php' ) ) {
 
   ?>
   <div id="main-image">
				<?php 

				$location = get_field('map');

				if( !empty($location) ):
					?>
				<div class="acf-map">
					<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
				</div>
				<?php endif; 

				?>


			</div>
	<?php
    
} else { ?>
   

	<header>
		<div id="main-image">
			<?php

			if(wp_is_mobile()) // On mobile
			{
				the_post_thumbnail('main-image-mobile');
			}
			else
			{
				the_post_thumbnail('main-image');
			}

			?>
		</div>
	</header>

<?php }?>


<section id="intro">
	<div class="container">
		<div class="left-side">
			<h2 class="intro-text">

				<?php 
				$title_field = get_field('title_intro');;
				$five = "<span class='five'></span>";


				$title_field2 = str_replace('5', $five, $title_field);

				echo $title_field2 ?>

			</h2>

			<h1 class="intro-text"><?php the_field('title_intro_2'); ?></h1>
			<p class="intro-text"><?php the_field('text_intro'); ?></p>
		</div>
	</div>
</section>