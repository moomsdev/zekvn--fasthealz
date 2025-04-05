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
              'posts_per_page' => 5,
              'orderby' => 'date',
              'order' => 'DESC',
              'post_status' => 'publish'
            );
            $post_query = new WP_Query($args);

            if ($post_query->have_posts()):
              while ($post_query->have_posts()):
                $post_query->the_post();
                ?>
                  <li class="multi-line-1"> <i class="fa-solid fa-play hotnews-icon"></i> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
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
</aside>