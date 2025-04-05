<?php
$title = get_field('section8', 'option');
?>

<section class="latest-posts">
  <div class="container">
    <?php
    if ($title):
      echo '<h2 class="title text-primary text-uppercase">' . esc_html($title) . '</h2>';
    endif;
    ?>

    <div class="row justify-content-between">
      <?php
      // Get latest posts
      $first_post_args = array(
        'post_type' => 'post',
        'posts_per_page' => 1,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish'
      );
      $first_post = new WP_Query($first_post_args);

      if ($first_post->have_posts()):
        while ($first_post->have_posts()):
          $first_post->the_post();
          ?>
          <div class="col-12 col-lg-6 mb-5 mb-lg-0 ">
            <a href="#" class="d-block">
              <figure class="ratio-4-3">
                <img src="<?php the_post_thumbnail_url('full'); ?>"
                  alt="<?php the_title(); ?>" class="image rounded-4">
              </figure>
            </a>

            <h3 class="title multi-line-1 text-start mx-0 w-100">
              <a href="<?php the_permalink(); ?>"
                class="d-block"><?php the_title(); ?></a>
            </h3>

            <div class="description multi-line-3 mb-0">
              <?php the_excerpt(); ?>
            </div>
          </div>
          <?php
        endwhile;
        wp_reset_postdata();
      endif;
      ?>

      <div class="col-12 col-lg-6 mb-4">
        <h3 class="title-posts mb-0 border-bottom border-1">
          CHĂM SÓC VẾT THƯƠNG VÀ CHỮA LÀNH SẸO
        </h3>
        <div class="home-blogs">
          <?php
          // Get latest posts
          $args = array(
            'post_type' => 'post',
            'posts_per_page' => 10,
            'orderby' => 'date',
            'order' => 'DESC',
            'post_status' => 'publish',
            'offset' => 1
          );
          $latest_posts = new WP_Query($args);

          if ($latest_posts->have_posts()):
            while ($latest_posts->have_posts()):
              $latest_posts->the_post();
              ?>
              <div class="row mb-3">
                <div class="col-5 col-md-4">
                  <a href="<?php the_permalink(); ?>" class="d-block">
                    <figure class="ratio-23-14">
                      <img src="<?php the_post_thumbnail_url('full'); ?>"
                        alt="<?php the_title(); ?>"
                        class="image rounded-4">
                    </figure>
                  </a>
                </div>
                <div class="col-7 col-md-8 d-flex flex-column justify-content-center">
                  <div class="content-wrapper">
                    <h4 class="title-post multi-line-1">
                      <a href="<?php the_permalink(); ?>"
                        class="d-block"><?php the_title(); ?></a>
                    </h4>
                    <div class="description multi-line-3 mt-3">
                      <?php the_excerpt(); ?>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            endwhile;
            wp_reset_postdata();
          endif;
          ?>
        </div>
      </div>
    </div>

    <!-- <div class="w-100 text-center">
      <div class="btn-home">
        <a href="#">Xem thêm</a>
      </div>
    </div> -->

  </div>
</section>