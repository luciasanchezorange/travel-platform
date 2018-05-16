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
/*More info section*/

$show_more_section = get_field('show_more_section');

if ($show_more_section)  : ?>

<section id="more" class="">
	<div class="container">
	<div class="aligncenter">
		<h2><?php the_field('more-title'); ?></h2>

	</div>
	<div id="more-links-wrapper">
		<div class="column3 more-links-text">
			<p><?php the_field('more_intro_text'); ?></p>

		</div>
		<div class="column23 more-links-links">
			<p>
				<?php if( have_rows('best-in-location') ):

				while ( have_rows('best-in-location') ) : the_row(); ?>


				<a href="<?php the_sub_field('link_to'); ?> ">

					<span class='five'></span> <span class="best">BEST</span> <?php the_sub_field('best'); ?> <?php the_field('location'); ?></a>

					<?php
					endwhile;
					else :

						endif;

					?>
				</p>
			</div>
		</div>
		</div>
	</section>	

	<?php
	endif; ?>