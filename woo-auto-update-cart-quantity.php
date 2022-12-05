<?php

/**
 * @link              https://titasbhukta.in
 * @since             1.0.0
 * @package           Woo_Auto_Update_Cart_Quantity
 *
 * @wordpress-plugin
 * Plugin Name:       Woo Auto Update Cart Quantity
 * Plugin URI:        https://https://titasbhukta.in/
 * Description:       This is a plugin to update the woocommerce cart automatically after changing quantity of the products on the cart page.
 * Version:           1.0.0
 * Author:            Titas Bhukta
 * Author URI:        https://titasbhukta.in
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       woo-auto-update-cart-quantity
 * Domain Path:       /languages
 */


add_action( 'wp_head', 'woo_auto_update_cart_quantity_style' );
function woo_auto_update_cart_quantity_style() { ?>
    <style>
        .woocommerce button[name="update_cart"],
        .woocommerce input[name="update_cart"] {
            display: none;
        }
    </style>
<?php }


add_action( 'wp_footer', 'woo_auto_update_cart_quantity_function' );
function woo_auto_update_cart_quantity_function() { ?>
    <script>
        jQuery( function( $ ) {
            let timeout;
            $('.woocommerce').on('change', 'input.qty', function(){
                if ( timeout !== undefined ) {
                    clearTimeout( timeout );
                }
                timeout = setTimeout(function() {
                    $("[name='update_cart']").trigger("click");
                }, 1000 );
            });
        } );
	</script>
<?php }

?>