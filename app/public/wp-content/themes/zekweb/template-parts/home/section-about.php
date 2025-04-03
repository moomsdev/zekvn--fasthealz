<?php
  $aboutUs = get_field('section2', 'option');
  $title = $aboutUs[0]['title'];
  $thumbnail = $aboutUs[0]['thumbnail'];
  $video = $aboutUs[0]['video'];
  $embed_url = getYoutubeEmbedUrl($video);
  $description = $aboutUs[0]['description'];
?>

<section class="about-us">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-6">
        <?php
          if ($video) :
            echo '<div class="video-thumbnail" data-video="' . esc_url($embed_url) . '">';
            echo '<img src="https://img.youtube.com/vi/' . getYoutubeVideoId($video) . '/maxresdefault.jpg" alt="Video thumbnail" class="img-fluid">';
            echo '<div class="play-button"><i class="fas fa-play"></i></div>';
            echo '</div>';
          endif;
        ?>
      </div>

      <div class="col-12 col-lg-6 mt-5 mt-lg-0">
        <?php
          if ($title) :
            echo '<h2 class="title text-primary text-uppercase">' . esc_html($title) . '</h2>';
          endif;

          if ($description) :
            echo '<div class="description">' . apply_filters('the_content', $description) . '</div>';
          endif;
        ?>
      </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</div>

<style>

</style>

<script>
jQuery(document).ready(function($) {
  $('.video-thumbnail').click(function() {
    var videoUrl = $(this).data('video');
    $('#videoModal iframe').attr('src', videoUrl);
    $('#videoModal').modal('show');
  });
  
  // Sửa lại event close modal
  $('.close, #videoModal').on('click', function () {
    $('#videoModal iframe').attr('src', '');
    $('#videoModal').modal('hide');
  });
  
  // Ngăn modal đóng khi click vào video
  $('.modal-content').on('click', function(e) {
    e.stopPropagation();
  });
});
</script>