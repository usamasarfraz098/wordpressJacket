<?php
/**
 * The main template file
 *
 * @subpackage Clothing Store
 * @since 1.0
 */

get_header(); ?>

<?php
	$clothing_store_post_sidebar = get_option( 'clothing_store_post_sidebar' );
	if ( '1' == $clothing_store_post_sidebar ) {
	$clothing_store_column = 'col-lg-12 col-md-12';
	} else { 
	$clothing_store_column = 'col-lg-8 col-md-8';
	}
?>

<main id="content" class="mt-5">
	<div class="container">
		<?php if ( is_home() && ! is_front_page() ) : ?>
			<header class="page-header">
				<h1 class="page-title"><span><?php single_post_title(); ?></span></h1>
			</header>
		<?php else : ?>
			<header class="page-header">
				<h2 class="page-title"><span><?php esc_html_e( 'Posts', 'clothing-store' ); ?></span></h2>
			</header>
		<?php endif; ?>
		<div class="content-area">
			<div id="main" class="site-main" role="main">
		    	<div class="row m-0">
					<div class="content_area <?php echo esc_html( $clothing_store_column ); ?>">
				    	<section id="post_section">
				    		<div class="row">
								<?php
									if ( have_posts() ) :
									while ( have_posts() ) : the_post();

										$clothing_store_post_option = get_theme_mod( 'clothing_store_post_option','simple_post');
										if($clothing_store_post_option == 'simple_post'){ 

											get_template_part( 'template-parts/post/content',get_post_format() );

										}else if($clothing_store_post_option == 'grid_post'){

											get_template_part( 'template-parts/post/grid',get_post_format() );
										}

									endwhile;

									else :

										get_template_part( 'template-parts/post/content', 'none' );

									endif;
								?>
							</div>
							<div class="navigation">
				                <?php
				                    the_posts_pagination( array(
				                        'prev_text'          => __( 'Previous page', 'clothing-store' ),
				                        'next_text'          => __( 'Next page', 'clothing-store' ),
				                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'clothing-store' ) . ' </span>',
				                    ) );
				                ?>
				                <div class="clearfix"></div>
				       	 	</div>
						</section>
					</div>
					<?php if ( '1' != $clothing_store_post_sidebar ) {?>
						<div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-1'); ?></div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</main>

<?php get_footer();