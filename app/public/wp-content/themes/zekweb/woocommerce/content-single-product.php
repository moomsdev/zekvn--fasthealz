<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
	<div class="detail-head">
		<div class="row row-margin">
			<div class="col-12 col-lg-4 ">
				<?php
				/**
				 * Hook: woocommerce_before_single_product_summary.
				 *
				 * @hooked woocommerce_show_product_sale_flash - 10
				 * @hooked woocommerce_show_product_images - 20
				 */
				do_action( 'woocommerce_before_single_product_summary' );
				?>
				<div class="highlight">
					<p>
					Khách hàng có thể mua Fasthealz chính hãng tại các nhà thuốc lớn trên toàn quốc hoặc mua online qua sàn thương mại điện tử chính thống
					</p>
				</div>
			</div>
			<div class="col-12 col-lg-8">
				<?php
				/**
				 * Hook: woocommerce_single_product_summary.
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 * @hooked WC_Structured_Data::generate_product_data() - 60
				 */
				do_action( 'woocommerce_single_product_summary' );
				?>
				<div class="support d-flex align-items-center justify-content-center flex-wrap">
					<div class="support-item text-center">
						<figure>
							<img src="<?php bloginfo('template_url' ); ?>/images/tu-van-icon.png" alt="">
						</figure>
						<span> Tư vấn 24/7 </span>
					</div>
					<div class="support-item text-center">
						<figure>
							<img src="<?php bloginfo('template_url' ); ?>/images/giao-hang-icon.png" alt="">
						</figure>
						<span> Giao hàng nhanh chóng </span>
					</div>
					<div class="support-item text-center">
						<figure>
							<img src="<?php bloginfo('template_url' ); ?>/images/chat-luong-icon.png" alt="">
						</figure>
						<span> Cam kết chất lượng </span>
					</div>
				</div>
			</div>

			<div class="col-12 d-flex align-items-center justify-content-center gap-5 flex-wrap">
					<a class="button rdu-1 d-flex align-items-center justify-content-center gap-3 blue-btn img-btn">
						<img src="<?php bloginfo('template_url' ); ?>/images/shop-icon.png" alt="">
						<span> Mua hàng tại nhà thuốc </span>
					</a>
					<a class="button rdu-1 d-flex align-items-center justify-content-center gap-3 black-btn img-btn">
						<img src="<?php bloginfo('template_url' ); ?>/images/tiktok-icon.png" alt="">
						<span> Mua hàng tại Tiktok Shop </span>
					</a>
					<a class="button rdu-1 d-flex align-items-center justify-content-center gap-3 red-btn img-btn">
						<img src="<?php bloginfo('template_url' ); ?>/images/shopee-icon.png" alt="">
						<span> Mua hàng tại Shopee Mall</span>
					</a>
			</div>

			<div class="col-12">
				<figure class="media">
					<img src="<?= get_field('banner') ?>" alt="">
				</figure>
			</div>
  </div>
</div>
	</div>
	<div class="detail-body">
		<div class="block-content">
			<div class="content-post clearfix">
				<?php the_content();?>
			</div>
		</div>
	</div>
	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	get_template_part('template-parts/faq');
  	echo do_shortcode('[cusrev_reviews]');
	?>
</div>
<script type="text/javascript" src="<?php bloginfo('template_url' ); ?>/js/qty.js"></script>
<?php do_action( 'woocommerce_after_single_product' ); ?>
