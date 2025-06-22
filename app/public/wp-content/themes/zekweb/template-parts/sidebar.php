<aside class="sidebar">
  <div class="hotnews">
      <div class="hotnews-head">
          <h3>Bài mới nhất</h3>
      </div>
      <div class="hotnews-body">
          <ul>
            <?php 
            $args = array(
              'post_type' => 'post',
              'posts_per_page' => 10,
              'orderby' => 'date',
              'order' => 'DESC',
              'post_status' => 'publish'
            );
            $post_query = new WP_Query($args);

            if ($post_query->have_posts()):
              while ($post_query->have_posts()):
                $post_query->the_post();
                ?>
                  <li class="multi-line-2"> 
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80L0 432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z"/></svg>
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php
              endwhile;
              wp_reset_postdata();
            endif;
            ?>
          </ul>
      </div>
  </div>
  <div class="consultation-form">
      <div class="consultation-form__head">
          <h3>dược sĩ tư vấn</h3>
      </div>
      <div class="consultation-form__body">
          <!-- <form action="#">
              <input type="text" placeholder="Họ tên" id="fullname" name="fullname" required>
              <input type="text" placeholder="Số điện thoại" id="phone" name="phone" required>
              <input type="email" placeholder="Email của bạn" id="email" name="email" required>
              <textarea name="question" id="question" placeholder="Câu hỏi"></textarea>
              <div class="d-flex justify-content-center">
                  <button type="submit" class="button-submit">Đăng ký</button>
              </div>
          </form> -->
          <?php echo do_shortcode('[contact-form-7 id="08d9800" title="Dược sĩ tư vấn"]'); ?>
      </div>
  </div>
  
  <div class="videofasthealz">
      <div class="videofasthealz-head">
          <h3>video fasthealz</h3>
      </div>
      <div class="videofasthealz-body">
        <?php
        $videos = get_field('video', 'option');
        foreach ($videos as $item) :
          $video = $item['url'];
          $embed_url = getYoutubeEmbedUrl($video);

          if ($video) :
        ?>
          <div class="videofasthealz-item">
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
</aside>