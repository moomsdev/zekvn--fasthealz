<?php
$post_slider = get_field('section6', 'option');

if ($post_slider):
  foreach ($post_slider as $section):
    $title = $section['title'];
    $subtitle = $section['subtitle'];
    $category = $section['category'];
    
    $args = [
      'post_type'      => 'post',
      'posts_per_page' => -1,
      'tax_query' =>  [[ 'taxonomy' => 'category', 'field'    => 'term_id', 'terms'    => $category, ]],
    ];
?>
    <section class="slider mb-5">
      <div class="container">
        <?php
        if ($title):
          echo '<h2 class="title text-primary text-uppercase">' . esc_html($title) . '</h2>';
        endif;

        if ($subtitle):
          echo '<div class="description text-center">' . esc_html($subtitle) . '</div>';
        endif;
        ?>
        <!-- Swiper wrapper container -->
        <div class="swiper-wrapper-container">
          <div class="swiper swiper-posts">
            <div class="swiper-wrapper">
              <?php
              $loop = new WP_Query($args);
              if ($loop->have_posts()) : 
                while ($loop->have_posts()) : $loop->the_post();
              ?>
                <div class="swiper-slide">
                  <figure>
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Placeholder Image" class="image">
                  </figure>

                  <h4 class="title multi-line-1"> <a href="<?php the_permalink(); ?>"><?= get_the_title(); ?></a></h4>

                  <div class="description multi-line-3"><?= get_the_excerpt(); ?></div>
                </div>
              <?php 
                endwhile;
                wp_reset_postdata();
              else :
                echo 'Không tìm thấy bài viết.';
              endif;
              ?>
            </div>
          </div>

          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>
        <!-- End swiper wrapper container -->
      </div>
    </section>
<?php
  endforeach;
endif;
