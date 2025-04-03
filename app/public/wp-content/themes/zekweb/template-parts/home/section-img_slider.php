<?php
$galleries = get_field('section7', 'option');

if ($galleries):
  foreach ($galleries as $gallery):
    $title = $gallery['title'];
    $url = $gallery['url'];
    $images = $gallery['list'];
?>
    <section class="slider section-img-slider">
      <div class="container">
        <?php
        if ($title):
          echo '<h2 class="title text-primary text-uppercase">' . esc_html($title) . '</h2>';
        endif;
        ?>

        <!-- Swiper wrapper container -->
        <div class="swiper-wrapper-container position-relative">
          <div class="swiper swiper-media">
            <div class="swiper-wrapper">
              <?php
              foreach ($images as $image):
                $name = $image['name'];
                $img = $image['img'];
              ?>
                <div class="swiper-slide">
                  <figure>
                    <img src="<?= $img; ?>" alt="<?= $name; ?>" class="image mb-5">
                  </figure>

                  <div class="description text-center"><?= $name; ?></div>
                </div>
              <?php 
              endforeach;
              ?>
            </div>
          </div>

          <div class="swiper-button-prev image-slider-prev"></div>
          <div class="swiper-button-next image-slider-next"></div>
        </div>
        <!-- End swiper wrapper container -->
        
        <?php
        if ($url):
          foreach ($url as $btn):
            echo '<div class="w-100 text-center">';
              echo '<div class="btn-home">';
                echo '<a href="' . $btn['link'] . '">' . $btn['text'] . '</a>';
              echo '</div>';
            echo '</div>';
          endforeach;
        endif;
        ?>
      </div>
    </section>
<?php
  endforeach;
endif;
