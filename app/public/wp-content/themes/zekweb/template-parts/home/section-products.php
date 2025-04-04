<?php
  $products = get_field('section3', 'option');
?>

<section class="section-products">
  <div class="container">
    <?php 
    foreach ($products as $product) : 
      $title = $product['title'];

      $args = [
                'post_type'      => 'product',
                'posts_per_page' => -1,
                'tax_query' =>  [[ 'taxonomy' => 'product_cat', 'field'    => 'term_id', 'terms'    => $product['categories'], ]],
              ];

      if ($title) :
        echo '<h2 class="title text-primary text-uppercase">' . esc_html($title) . '</h2>';
      endif;
    ?>
      <div class="row justify-content-center">
        <?php
        $loop = new WP_Query($args);
        if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post();
          global $product;
        ?>
          <div class="col-6 col-md-4 product-item woocommerce">
              <div class="product-image">
                <figure>
                  <a href="<?= $product->get_permalink(); ?>">
                    <?php the_post_thumbnail('full', ['class' => 'img-fluid']); ?>
                  </a>
                </figure>
              </div>

              <div class="info">
                <h3>
                  <a class="product-title multi-line-2 text-center" href="<?= $product->get_permalink(); ?>"><?= $product->get_name(); ?></a>
                </h3>

                <div class="product-price text-center">
                  <span class="old"><?= number_format( $product->get_price(), 0, ',', '.' ) . 'đ'; ?></span>
                </div>
              </div>

              <div class="action d-flex justify-content-center gap-4">
                <!-- Add to cart -->
                <?php $product_id = $product->get_id(); ?>
                <a href="?add-to-cart=<?php echo $product_id; ?>" 
                  data-quantity="1" 
                  class="button product_type_simple add_to_cart_button ajax_add_to_cart custom-add-to-cart" 
                  data-product_id="<?php echo $product_id; ?>" 
                  data-product_sku="<?php echo $product->get_sku(); ?>" 
                  aria-label="Thêm sản phẩm vào giỏ hàng" 
                  rel="nofollow">
                  <i class="fa-solid fa-cart-shopping product-addcart__icon"></i> Thêm vào giỏ
                </a>
                <!-- Buy now -->
                <?php
                $checkout_url = wc_get_checkout_url();
                $buy_now_url = add_query_arg(['add-to-cart' => $product_id, 'buy_now' => '1'], $checkout_url );
                ?>
                <a href="<?php echo esc_url($buy_now_url); ?>" class="button buy-now-button">
                  <img src="<?php bloginfo('template_url' ); ?>/images/buy-now.png" alt="buy-now">
                  Mua ngay
                </a>
              </div>
          </div>
        <?php
          endwhile;
          wp_reset_postdata();
        else :
            echo 'Không tìm thấy sản phẩm.';
        endif;
        ?>
      </div>
    <?php
    endforeach; 
    ?>
  </div>
</section>