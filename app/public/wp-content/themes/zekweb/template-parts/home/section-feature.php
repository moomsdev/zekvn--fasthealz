<?php
  $feature = get_field('section1', 'option');
?>

<section class="section-feature">
  <div class="container">
    <div class="row no-gap-row">
      <?php 
        foreach ($feature as $item) :
          $title = $item['title'];
          $icon = $item['icon'];
          $description = $item['description'];
          $button = $item['button'];
      ?>
        <div class="col-12 col-md-4 item">
          <div class="feature__inner">
           
            <div class="feature__description">
              <?php 
              if ($icon) :
                echo '<figure class="icon"><img src="' . $icon . '" alt="' . $title . '"></figure>';
              endif;
              ?>
              <div class="feature__content">
                <?php 
                if ($title) :
                  echo '<h3 class="title">' . $title . '</h3>';
                endif; 
                ?>
                <?php
                if ($description) :
                  echo '<div class="description">' . $description . '</div>';
                endif;
                ?>
              </div>

            </div>

            <?php
              if ($button) :
                echo '<a href="' . $button[0]['link'] . '" class="button rdu-3 text-center">' . $button[0]['text'] . ' <i class="fa-solid fa-arrow-right"></i></a>';
              endif;
            ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
