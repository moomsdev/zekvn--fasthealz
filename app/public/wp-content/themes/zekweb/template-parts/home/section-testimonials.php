<?php
$testimonials = get_field('section5', 'option');
$title = $testimonials[0]['title'];
$gallery = $testimonials[0]['gallery'];
$list = $testimonials[0]['list'];
?>

<section class="review bg-color">
  <div class="container">
    <?php
    if ($title):
      echo '<h2 class="title text-primary text-uppercase">' . esc_html($title) . '</h2>';
    endif;
    ?>

    <?php
    if ($gallery):
    ?>
      <div class="row align-items-end mb-3r">
        <?php
        foreach ($gallery as $index => $image) :
          // Fisrt image
          if ($index === 0):
            echo '<div class="col-12 col-md-4 mb-5 mb-md-0 first-image">
                    <figure>
                      <img src="' . esc_url($image) . '" alt="" class="image">
                    </figure>
                  </div>';
          endif;
        endforeach;
        ?>

        <div class="col-12 col-md-8 other-images">
          <div class="row g-5">
            <?php
            foreach ($gallery as $index => $image) :
              if ($index !== 0):
                echo '<div class="col-6 col-md-4">
                        <figure>
                          <img src="' . esc_url($image) . '" alt="" class="image">
                        </figure>
                      </div>';
              endif;
            endforeach;
            ?>
          </div>
        </div>
      </div>
    <?php
    endif;
    ?>

    <div class="swiper swiper-testimonials">
			<div class="swiper-wrapper">
				<?php foreach ($list as $item) : ?>
				<div class="swiper-slide">
          <a href="<?php echo $item['post_url']; ?>" class="link">
          <div class="profile">
            <figure>
              <img src="<?php echo $item['img']; ?>" alt="Placeholder Image" class="image rounded-circle">
            </figure>

            <h3 class="title"><?= $item['name']; ?></h3>

            <div class="description text-center multi-line-4">
              <?= $item['description']; ?>
            </div>
          </div>
          </a>
				</div>
				<?php endforeach; ?>
			</div>
      <div class="swiper-pagination"></div>
		</div>
  </div>
</section>