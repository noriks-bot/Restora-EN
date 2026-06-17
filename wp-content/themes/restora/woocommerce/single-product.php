<?php
/**
 * Single product = served clone (Dormelle) + injected WP head/footer
 * so plugins (side cart) load. Theme's own cal-* assets dequeued to
 * avoid conflict with the self-styled clone.
 */
defined( 'ABSPATH' ) || exit;

// Remove theme's own CSS/JS (clone is self-styled); keep WooCommerce + side cart.
foreach ( array('main-style','header-style','footer-style','landing-style','product-style','checkout-style','cart-style','google-roboto') as $h ) { wp_dequeue_style( $h ); }
foreach ( array('header-js','price-update-js','checkout-fields') as $h ) { wp_dequeue_script( $h ); }

$html = file_get_contents( '/var/www/restora/en/static/site/products/oreiller-soya-2-0.html' );

ob_start(); wp_head();   $head = ob_get_clean();
ob_start(); wp_footer(); $foot = ob_get_clean();

$html = preg_replace( '#</head>#', $head . '</head>', $html, 1 );
$html = preg_replace( '#</body>#', $foot . '</body>', $html, 1 );

echo $html;
exit;
