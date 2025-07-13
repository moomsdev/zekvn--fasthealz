<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Check if the product is a valid WooCommerce product and ensure its visibility before proceeding.
if ( ! is_a( $product, WC_Product::class ) || ! $product->is_visible() ) {
	return;
}
?>
<div class="col-6 col-md-4 mb-5 d-flex" <?php wc_product_class( 'product-item', $product ); ?>>
	<div class="d-flex flex-column w-100">
		<div class="product-image">
			<?php the_post_thumbnail('large', array('alt'   => trim(strip_tags( $post->post_title )),'title' => trim(strip_tags( $post->post_title )),)); ?>
			<?php $product_id = $product->get_id(); ?>
			<a href="?add-to-cart=<?php echo $product_id; ?>" 
				data-quantity="1" 
				class="button add_to_cart_button ajax_add_to_cart custom-add-to-cart" 
				data-product_id="<?php echo $product_id; ?>" 
				data-product_sku="<?php echo $product->get_sku(); ?>" 
				aria-label="Thêm sản phẩm vào giỏ hàng" 
				rel="nofollow">
				<i class="fa-solid fa-cart-shopping product-addcart__icon"></i> Thêm vào giỏ
			</a>
				
			<div class="product-addcart__overlay"></div>
		</div>
		<h3 class="title multi-line-2">
				<a href="<?php the_permalink()?>"><?php the_title(); ?></a>
		</h3>
	
		<?php
			$manual_excerpt = get_post_field('post_excerpt', get_the_ID());
			if ( !empty( $manual_excerpt ) ) {
				echo '<div class="description multi-line-3">';
					echo  $manual_excerpt;
				echo '</div>';
			}
		?>
		
		<div class="product-bottom flex-wrap flex-lg-nowrap mt-auto">
				<div class="product-price"><?php echo $product->get_price_html(); ?></div>
				<a href="<?php the_permalink()?>">
					<button class="btn btn-primary product-looknow">Xem thông tin</button>
				</a>
		</div>
	</div>
</div>