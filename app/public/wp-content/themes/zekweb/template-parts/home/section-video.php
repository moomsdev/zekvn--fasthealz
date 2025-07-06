<?php
$media = get_field('section10', 'option');
$title = $media[0]['title'];
$videos = $media[0]['video'];
?>

<section class="video-section">
  <div class="container">
    <?php
      if ($title) :
        echo '<h2 class="title text-primary text-uppercase">' . esc_html($title) . '</h2>';
      endif;
    ?>
    <div class="row">
      <?php
      foreach ($videos as $item) :
        $video = $item['youtube_video'];
        $embed_url = getYoutubeEmbedUrl($video);

        if ($video) :
      ?>
        <div class="col-6 col-md-4 mb-5">
          <?php
          echo '<div class="video-thumbnail" data-video="' . esc_url($embed_url) . '">';
          echo '<img src="https://img.youtube.com/vi/' . getYoutubeVideoId($video) . '/maxresdefault.jpg" alt="Video thumbnail" class="img-fluid">';
          echo '<div class="play-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80L0 432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z"/></svg></div>';
          echo '</div>';
          ?>
        </div>
      <?php
        endif;
      endforeach;
      ?>
    </div>
  </div>
</section>