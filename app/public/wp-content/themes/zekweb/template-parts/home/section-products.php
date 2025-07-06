<?php
  $products = get_field('section3', 'option');
?>

<section class="section-products">
  <div class="container">
    <?php 
    foreach ($products as $product) : 
      $title = $product['title'];
      $qtt = $product['post_qtt'];

      $args = [
                'post_type'      => 'product',
                'posts_per_page' => $qtt,
                'tax_query' =>  [[ 'taxonomy' => 'product_cat', 'field'    => 'term_id', 'terms'    => $product['categories'], ]],
              ];

      if ($title) :
        echo '<h2 class="title text-primary text-uppercase">' . esc_html($title) . '</h2>';
      endif;
    ?>
      <div class="row">
        <?php
        $loop = new WP_Query($args);
        if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post();
          global $product;
        ?>
          <div class="col-6 col-md-4 product-item woocommerce h-100 d-flex flex-column">
              <div class="product-image">
                <figure>
                  <a href="<?= $product->get_permalink(); ?>">
                    <?php the_post_thumbnail('full', ['class' => 'img-fluid']); ?>
                  </a>
                </figure>
              </div>

              <div class="info flex-grow-1 d-flex flex-column justify-content-between">
                <h3 class="title multi-line-2">
                  <a href="<?= $product->get_permalink(); ?>"><?= $product->get_name(); ?></a>
                </h3>

                <div class="product-price text-center">
                  <span class="old"><?= number_format( $product->get_price(), 0, ',', '.' ) . 'đ'; ?></span>
                </div>
              </div>

              <div class="action d-flex justify-content-center gap-4 mt-auto">
                <a href="<?php echo esc_url($product->get_permalink()); ?>" class="button buy-now-button">
                  Xem thông tin
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