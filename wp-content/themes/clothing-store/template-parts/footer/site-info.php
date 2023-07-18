<?php
/**
 * Displays footer site info
 *
 * @subpackage Clothing Store
 * @since 1.0
 * @version 1.4
 */

?>
<div class="site-info py-4 text-center">
    <?php
        echo esc_html( get_theme_mod( 'clothing_store_footer_text' ) );
        printf(
            /* translators: %s: Clothing Store WordPress Theme. */
            '<a href="' . esc_attr__( 'https://www.ovationthemes.com/wordpress/free-clothing-store-wordpress-theme/', 'clothing-store' ) . '"> %s</a>',
            esc_html__( 'Clothing Store WordPress Theme', 'clothing-store' )
        );
    ?>
</div>
