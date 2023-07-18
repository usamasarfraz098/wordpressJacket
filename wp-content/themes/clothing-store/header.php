<?php
/**
 * The header for our theme
 *
 * @subpackage Clothing Store
 * @since 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}
?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'clothing-store' ); ?></a>
	<?php if( get_option('clothing_store_theme_loader','') != 'off'){ ?>
		<div class="preloader">
			<div class="load">
			  <hr/><hr/><hr/><hr/>
			</div>
		</div>
	<?php }?>
	<div id="page" class="site">
		<div id="header">
			<div class="wrap_figure">
				<div class="top_bar py-2 text-center text-lg-left text-md-left">
					<div class="container">
						<div class="row">							
							<div class="col-lg-4 col-md-4 col-sm-4 align-self-center text-md-center text-lg-left header-text">
								<?php if( get_theme_mod('clothing_store_top_phone') != '' ){ ?>
									<span><i class="fas fa-phone-volume mr-3"></i><?php esc_html_e('HOTLINE','clothing-store'); ?> <?php echo esc_html(get_theme_mod('clothing_store_top_phone','')); ?></span>
								<?php }?>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 align-self-center text-md-center text-lg-left header-text">
								<?php if( get_theme_mod('clothing_store_top_text') != '' ){ ?>
									<span><?php echo esc_html(get_theme_mod('clothing_store_top_text','')); ?></span>
								<?php }?>
							</div>							
							<?php if( get_option('clothing_store_social_enable',false) != 'off'){ ?>
								<?php						  		
						 		$clothing_store_header_fb_target = esc_attr(get_option('clothing_store_header_fb_target','true'));
						 		$clothing_store_header_twt_target = esc_attr(get_option('clothing_store_header_twt_target','true'));					 		
						 		$clothing_store_header_ut_target = esc_attr(get_option('clothing_store_header_ut_target','true'));
						 		$clothing_store_header_ins_target = esc_attr(get_option('clothing_store_header_ins_target','true'));
							 	?>
								<div class="col-lg-4 col-md-4 col-sm-4 align-self-center text-md-right social-box">
									<?php if( get_theme_mod('clothing_store_facebook') != ''){ ?>
										<a <?php if($clothing_store_header_fb_target !='off') { ?>target="_blank" <?php } ?>href="<?php echo esc_url(get_theme_mod('clothing_store_facebook','')); ?>">
										<i class="<?php echo esc_html(get_theme_mod('clothing_store_facebook_icon','fab fa-facebook-f')); ?> mr-3"></i>
										</a>					
									<?php }?>
									<?php if( get_theme_mod('clothing_store_twitter') != ''){ ?>
										<a <?php if($clothing_store_header_twt_target !='off') { ?>target="_blank" <?php } ?>href="<?php echo esc_url(get_theme_mod('clothing_store_twitter','')); ?>">
										<i class="<?php echo esc_html(get_theme_mod('clothing_store_twitter_icon','fab fa-twitter')); ?> mr-3"></i></a>
									<?php }?>
									<?php if( get_theme_mod('clothing_store_youtube') != ''){ ?>
										<a <?php if($clothing_store_header_ut_target !='off') { ?>target="_blank" <?php } ?>href="<?php echo esc_url(get_theme_mod('clothing_store_youtube','')); ?>">
										<i class="<?php echo esc_html(get_theme_mod('clothing_store_youtube_icon','fab fa-youtube')); ?> mr-3"></i>
									</a>
									<?php }?>
									<?php if( get_theme_mod('clothing_store_instagram') != ''){ ?>
										<a <?php if($clothing_store_header_ins_target !='off') { ?>target="_blank" <?php } ?>href="<?php echo esc_url(get_theme_mod('clothing_store_instagram','')); ?>">
										<i class="<?php echo esc_html(get_theme_mod('clothing_store_instagram_icon','fab fa-instagram')); ?> mr-3"></i>
										</a>
									<?php }?>
									<?php
										if ( class_exists( 'WooCommerce' ) ) { ?>
										<?php if ( is_user_logged_in() ) { ?>
											<a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" class="mr-3 mx-md-3"><i class="fas fa-user mr-3"></i><?php esc_html_e( 'MY ACCOUNT','clothing-store');?></a>
										<?php } else { ?>
											<a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" class="mr-3 mx-md-3"><i class="fas fa-sign-out-alt mr-3"></i><?php esc_html_e( 'LOGIN / REGISTER','clothing-store');?></a>
										<?php } ?>
									<?php } ?>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="menu_header py-3">
					<div class="container">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-3 align-self-center">
								<div class="logo text-center text-md-left text-sm-left py-3 py-md-0">
							        <?php if ( has_custom_logo() ) : ?>
					            		<?php the_custom_logo(); ?>
						            <?php endif; ?>
					              	<?php $clothing_store_blog_info = get_bloginfo( 'name' ); ?>
						                <?php if ( ! empty( $clothing_store_blog_info ) ) : ?>
						                  	<?php if ( is_front_page() && is_home() ) : ?>
												<?php if( get_option('clothing_store_logo_title','') != 'off' ){ ?>
						                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
																	<?php }?>
						                  	<?php else : ?>
												<?php if( get_option('clothing_store_logo_title','') != 'off' ){ ?>
					                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
																		<?php }?>
					                  		<?php endif; ?>
						                <?php endif; ?>
						                <?php
					                  		$clothing_store_description = get_bloginfo( 'description', 'display' );
						                  	if ( $clothing_store_description || is_customize_preview() ) :
						                ?>
						                <?php if( get_option('clothing_store_logo_text','') != 'off' ){ ?>
					                  	<p class="site-description">
					                    	<?php echo esc_html($clothing_store_description); ?>
					                  	</p>
					                  <?php }?>
					              	<?php endif; ?>
							    </div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 align-self-center">
								<div class="product-search">
									<?php
									if ( class_exists( 'WooCommerce' ) ) { ?>
										<?php get_product_search_form(); ?>
									<?php }?>
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 pl-0 align-self-center text-center mt-2 mt-md-0 text-md-right">
								<?php
									if ( class_exists( 'WooCommerce' ) ) { ?>
									<?php global $woocommerce; ?>
									<a href="<?php echo esc_html( wc_get_cart_url()) ?>" class="header-cart"><i class="fas fa-shopping-cart"></i> <?php esc_html_e('CART','clothing-store'); ?> <span>( <?php echo esc_html( $woocommerce->cart->cart_contents_count )?></span> )</a>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
				<div class="menu_header_box py-2">
					<div class="container">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4 col-9 align-self-center">
								<?php dynamic_sidebar( 'product-cat' ); ?>
							</div>
							<div class="col-lg-8 col-md-8 col-sm-8 col-3 align-self-center">
								<?php if(has_nav_menu('primary')){?>
									<div class="toggle-menu gb_menu text-md-right">
										<button onclick="clothing_store_gb_Menu_open()" class="gb_toggle p-2"><i class="fas fa-ellipsis-h"></i><p class="mb-0"><?php esc_html_e('Menu','clothing-store'); ?></p></button>
									</div>
								<?php }?>
				   				<?php get_template_part('template-parts/navigation/navigation'); ?>
			   				</div>
			   			</div>
					</div>
				</div>
			</div>
		</div>
