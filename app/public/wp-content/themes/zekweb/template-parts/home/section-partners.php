<?php
$section9 = get_field('section9', 'option');
if ($section9) :
  foreach ($section9 as $section) :
    $title = $section['title'];
    $partners = $section['partners'];
?>
    <section class="partners">
      <div class="container">
        <?php
          if ($title):
            echo '<h2 class="title text-primary text-uppercase">' . esc_html($title) . '</h2>';
          endif;
        ?>

        <div class="row justify-content-center">
          <?php
          foreach ($partners as $partner) :
            $url = $partner['url'];
            $logo = $partner['logo'];
            $name = $partner['name'];

            echo '<div class="col-6 col-lg-3 mb-4 partner-item">';
              if ($url) :
                echo '<a href="' . $url . '" target="_blank">';
              endif;

                echo '<figure><img src="' . $logo . '" alt="' . $name . '"></figure>';
              
              if ($url) :
                echo '</a>';
              endif;
            echo '</div>';
          endforeach;
          ?>
        </div>
      </div>
    </section>
<?php
  endforeach;
endif;
?>
