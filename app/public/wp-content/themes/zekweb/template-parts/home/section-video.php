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
        <div class="col-6 mb-5">
          <?php
          echo '<div class="video-thumbnail" data-video="' . esc_url($embed_url) . '">';
          echo '<img src="https://img.youtube.com/vi/' . getYoutubeVideoId($video) . '/maxresdefault.jpg" alt="Video thumbnail" class="img-fluid">';
          echo '<div class="play-button"><i class="fas fa-play"></i></div>';
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