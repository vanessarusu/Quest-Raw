<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package questRaw
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
		<div class="logo">
			<?php if( get_theme_mod( 'footer_logo' ) ) : ?>
			<img src="<?php echo get_theme_mod( 'footer_logo' ) ?>" alt="Quest">
			<?php else: ?>
				<p>Pets 4 Life</p>
			<?php endif ?>
			<p class="copyright-info">&copy; <?php echo date("Y"); ?> All Rights Reserved</p>
		</div>
		<div class="contact-info">
			<?php if( get_theme_mod( 'business_name' ) ) : ?>
			<p> <?php echo esc_attr( get_theme_mod( 'business_name' ) ); ?></p>
			<?php else: ?>
				<p>Pets 4 Life</p>
			<?php endif ?>
			<?php if( get_theme_mod( 'business_address' ) ) : ?>
			<p> <?php echo esc_attr( get_theme_mod( 'business_address' ) ) ?></p>
			<?php else: ?>
				<p>Unit 3 - 2 Currah Rd, St Thomas, ON Canada</p>
			<?php endif ?>
			<?php if( get_theme_mod( 'business_contact' ) ) : ?>
			<p> <?php echo esc_attr( get_theme_mod( 'business_contact' ) ) ?></p>
			<?php else: ?>
				<p>Toll Free: 1.866.899.4999 • Email: sales@pets4life.com</p>
			<?php endif ?>
		</div>
			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
