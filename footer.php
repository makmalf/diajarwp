<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package diajarwp
 */
?>				
			</div> <!-- .row -->
		</div> <!-- .container-fluid -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer navbar-fixed-bottom" role="contentinfo">
		
			<div class="clearfix">

				<div class="site-info col-md-6">
					<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'diajarwp' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'diajarwp' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php printf( __( 'Theme: %1$s by %2$s.', 'diajarwp' ), '<a href="https://github.com/makmalf/diajarwp">diajarwp</a>', '<a href="http://makmalf.com" rel="designer">Makmalf</a>' ); ?>
				</div><!-- .site-info -->
			
				<div id="featured-footer" class="col-md-6 text-right">
					<?php 
						
							include get_template_directory() . '/inc/loop-shortWords.php'; 
						
					?>
				</div>

			</div>
		
	</footer><!-- #colophon -->

</div><!-- #page -->

<!-- The orange button :) -->
<a id="toggle-modal-scroll" href="#" class="btn btn-warning navbar-btn no-borderRadius" data-toggle="modal" data-target="#widgetExpand">
	<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
</a>

<?php wp_footer(); ?>


</body>
</html>
