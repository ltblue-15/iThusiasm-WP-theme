<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage i-max
 * @since i-max 1.0
 */
?>

		</div><!-- #main -->
		<footer id="colophon" class="site-footer" role="contentinfo">
        	<div class="footer-bg clearfix">
                <div class="widget-wrap">
                    <?php get_sidebar( 'main' ); ?>
                </div>
			</div>
			<div class="site-info">
                <div class="copyright">
                	<?php esc_attr_e( 'Copyright &copy;', 'imax' ); ?>  <?php bloginfo( 'name' ); ?>
                </div>            
            	<div class="credit-info">
					<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'imax' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'imax' ); ?>">
						<?php printf( __( 'Powered by %s', 'imax' ), 'WordPress' ); ?>
                    </a>
                    <?php printf( __( ', Designed and Developed by', 'imax' )); ?> 
                    <a href="<?php echo esc_url( __( 'http://www.templatesnext.org/', 'imax' ) ); ?>">
                   		<?php printf( __( 'templatesnext', 'imax' ) ); ?>
                    </a>
                </div>

			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>