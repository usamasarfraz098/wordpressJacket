<?php
/**
 * Displays footer site info
 *
 * @subpackage T-Shirt Clothing
 * @since 1.0
 * @version 1.4
 */

?>
<div class="site-info py-4 text-center">
    <?php
        echo esc_html( get_theme_mod( 'clothing_store_footer_text' ) );
        printf(
            /* translators: %s: T-Shirt Clothing WordPress Theme. */
            '<a href="' . esc_attr__( 'https://www.ovationthemes.com/wordpress/free-t-shirt-wordpress-theme/', 't-shirt-clothing' ) . '"> %s</a>',
            esc_html__( 'T-Shirt Clothing WordPress Theme', 't-shirt-clothing' )
        );
    ?>
</div>
