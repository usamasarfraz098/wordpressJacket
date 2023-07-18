<?php
/**
 * Template part for displaying posts
 *
 * @subpackage Clothing Store
 * @since 1.0
 */
?>


<?php $clothing_store_post_option = get_theme_mod( 'clothing_store_grid_column','3_column');
    if($clothing_store_post_option == '1_column'){ ?>
    <div class="col-lg-12 col-md-12">
<?php }else if($clothing_store_post_option == '2_column'){ ?>
    <div class="col-lg-6 col-md-6">
<?php }else if($clothing_store_post_option == '3_column'){ ?>
    <div class="col-lg-4 col-md-4">
<?php }else if($clothing_store_post_option == '4_column'){ ?>
    <div class="col-lg-3 col-md-3">
<?php }else if($clothing_store_post_option == '5_column'){ ?>
    <div class="col-lg-2 col-md-2">
<?php }?>
<?php
  $video = construction_firm_get_media(array('video', 'object', 'embed', 'iframe'));
?>
	<div id="Category-section" class="entry-content w-100">
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="postbox smallpostimage p-2 mb-3">
				<h3 class="text-center"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
				<?php
      			if ( ! is_single() ) {
        		// If not a single post, highlight the video file.
        			if ( ! empty( $video ) ) {
          				foreach ( $video as $video_html ) {
            				echo '<div class="entry-video">';
            				echo $video_html;
            				echo '</div>';
          				}
        			};
      			};
      			?> 
	        	<div class="overlay pt-2 text-center">
	        		<div class="date-box mb-2">
	        			<?php if( get_option('clothing_store_date',false) != '1'){ ?>
	        				<span class="mr-2"><i class="far fa-calendar-alt mr-2"></i><?php the_time( get_option( 'date_format' ) ); ?></span>
	        			<?php } ?>
	        			<?php if( get_option('clothing_store_admin',false) != '1'){ ?>
	        				<span class="entry-author mr-2"><i class="far fa-user mr-2"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
	        			<?php }?>
	        			<?php if( get_option('clothing_store_comment',false) != '1'){ ?>
	      					<span class="entry-comments"><i class="fas fa-comments mr-2"></i> <?php comments_number( __('0 Comments','clothing-store'), __('0 Comments','clothing-store'), __('% Comments','clothing-store')); ?></span>
	      				<?php }?>
	    			</div>
	        		<p><?php the_excerpt();?></p>
	        	</div>
		      	<div class="clearfix"></div>
		  	</div>
		</div>
	</div>
</div>