<?php
/**
 * The template for displaying the footer
 *
 * @subpackage Clothing Store
 * @since 1.0
 */

?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="copyright">
			<div class="container footer-content">
				<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
			</div>
		</div>
		<?php get_template_part( 'template-parts/footer/site', 'info' ); ?>
		<?php if( get_option( 'clothing_store_scroll_enable',false) != '1') { ?>
			<div class="scroll-top">
				<button type=button id="clothing-store-scroll-to-top" class="scrollup"><i class="<?php echo esc_html(get_theme_mod('clothing_store_scroll_top_icon','fas fa-chevron-up')); ?>"></i></button>
			</div>	
		<?php }?> 
	</footer>
<?php wp_footer(); ?>

</body>
</html>