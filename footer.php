<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package travelplatform
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer">
	<div class="container">

		<!-- fix footer -->





		<div class="textwidget"></div>



		<div id="footer_column1" class="footer_column">


			We are a group of travel and hotel enthusiasts that wants to help other travellers to realise their dream journeys. This platform was created with the intent to simplify travellers decisions by offering a concise list of the best hotels, attractions and activities for each destination.

		</div>
		<div id="footer_column2" class="footer_column">


			<div class="menu-footer-links-container">
				<ul id="menu-footer-links" class="menu">

				</ul>
			</div>


		</div>
		<div id="footer_column3" class="footer_column" style="float:right">


			<ul class="social">
				<li><a target="_blank" alt="Facebook" href="https://www.facebook.com/best5travelcom/"><i class="fab fa-facebook-f"></i></a></li>
				<li><a target="_blank" href="https://nl.pinterest.com/best5travel/"><i class="fab fa-pinterest-p"></i></a></li>
				<li><a target="_blank" href="https://www.instagram.com/best5travel/"><i class="fab fa-instagram"></i></a></li>

			</ul>




		</div>



		<!-- end footer -->




<!--

		 <?php if ( is_active_sidebar( 'footer_title' ) ) : ?>
		
		<?php dynamic_sidebar( 'footer_title' ); ?>
		
	<?php endif; ?>


	<div id="footer_column1" class="footer_column">


		<?php /*if ( is_active_sidebar( 'footer_column1' ) ) :
		
		 dynamic_sidebar( 'footer_column1' ); 
*/
		echo get_bloginfo( 'description' );
		
	/* endif; */
?>


</div>
<div id="footer_column2" class="footer_column">


	<?php /*if ( is_active_sidebar( 'footer_column2' ) ) : ?>

	<?php dynamic_sidebar( 'footer_column2' ); ?>

<?php endif; */

	 wp_nav_menu(); 

	 ?>



</div>
<div id="footer_column3" class="footer_column">


	<?php /* if ( is_active_sidebar( 'footer_column3' ) ) : ?>

	<?php  dynamic_sidebar( 'footer_column3' ); */ ?>
	<ul class="social">
		<li><a target="_blank" alt="Facebook" href="https://www.facebook.com/best5travelcom/"><i class="fab fa-facebook-f"></i></a></li>
		<li><a target="_blank" href="https://nl.pinterest.com/best5travel/"><i class="fab fa-pinterest-p"></i></a></li>
		<li><a target="_blank" href="https://www.instagram.com/best5travel/"><i class="fab fa-instagram"></i></a></li>

	</ul>

<?php /*endif; */?>



</div>



<!--
	<div class="site-info">
		<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'travelplatform' ) ); ?>"><?php
		/* translators: %s: CMS name, i.e. WordPress. */
		printf( esc_html__( 'Proudly powered by %s', 'travelplatform' ), 'WordPress' );
		?></a>


	</div><!-- .site-info -->
</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
