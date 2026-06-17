<?php
defined( 'ABSPATH' ) || exit;
global $product;
if ( empty( $product ) || ! $product->is_visible() ) { return; }
$link = get_permalink( $product->get_id() );
?>
<li <?php wc_product_class( 'dormelle-card', $product ); ?>>
  <a href="<?php echo esc_url( $link ); ?>" class="dormelle-card-link">
    <div class="dormelle-card-img"><?php echo $product->get_image( 'woocommerce_single' ); ?></div>
    <h3 class="dormelle-card-title"><?php echo esc_html( $product->get_name() ); ?></h3>
    <div class="dormelle-card-price"><?php echo $product->get_price_html(); ?></div>
  </a>
</li>
