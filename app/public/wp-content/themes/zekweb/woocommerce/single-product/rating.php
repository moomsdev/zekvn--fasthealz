<?php
/**
 * Single Product Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/rating.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $product;

if ( ! wc_review_ratings_enabled() ) {
	return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();

if ( $rating_count > 0 ) : ?>

<?php endif; ?>

<div class="head-rating d-flex flex-wrap gap-5 align-items-center">
	<div class="rating">
		<img src="<?php bloginfo('template_url'); ?>/images/star.png" alt="">
	</div>

	<div class="qtt-reviews">
		<span><?php the_field('review_count'); ?> Đánh giá</span>
	</div>

	<div class="product-sales">
		<!-- get product sales -->
		<span><?php the_field('sale_qtt'); ?> sản phẩm đã bán</span>
	</div>
</div>