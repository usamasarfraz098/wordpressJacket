<?php
/**
 * Template part for displaying posts
 *
 * @subpackage Clothing Store
 * @since 1.0
 */
?>

<div id="Category-section" class="entry-content">
	<div id="post-<?php the_ID(); ?>" <?php post_class('quotepost'); ?>>
		<div class="postbox smallpostimage p-2 mb-3">
			<div class="box-content-quote text-center">
		        <a href="<?php the_permalink(); ?>"><h1 class="quote-content"><?php  echo get_the_content();?></h1></a> 
	            	
	            </div>
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
        		
        	</div>
	      	<div class="clearfix"></div>
	  	</div>
	</div>
</div>