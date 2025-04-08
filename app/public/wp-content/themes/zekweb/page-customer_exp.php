<?php
/*
Template Name: Trải nhiệm khách hàng
 */
$postObject = get_field('customer_exp');
$videos = get_field('video');
?>
<?php get_header(); ?>
  <main id="main">
    <?php get_template_part('breadcrums'); ?>
    <div class="page-body">
        <div class="container">
            <h1 class="title-orange text-uppercase"><?php the_title();?></h1>

            <?php if (has_post_thumbnail()) : ?>
            <div class="banner full-width mt-4 mb-4">
                <figure>
                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>">
                </figure>
            </div>
            <?php endif; ?>

            <div class="page-content customer-exp-page">
              <div class="row">
                <?php
                  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                  $post_query = new WP_Query([
                    'post_type'      => 'post',
                    'posts_per_page' => 6,
                    'post_status'    => 'publish',
                    'paged'          => $paged,
                    'tax_query'      => [[  'taxonomy' => 'category',
                                            'field' => 'term_id', 
                                            'terms' => $postObject,
                                            'include_children' => true,
                                        ],],
                  ]);

                  if ($post_query->have_posts()) :
                    while ($post_query->have_posts()) : $post_query->the_post();
                  ?>
                    <div class="col-6 col-xl-4 mb-md-5 mb-5 mb-md-0 loop-post ratio-3-2">
                      <a href="<?php the_permalink(); ?>" class="d-block">
                        <figure>
                          <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>">
                        </figure>
                      </a>
                      <h3 class="title multi-line-1 text-start mx-0 w-100">
                          <a href="<?php the_permalink(); ?>" class="d-block"><?php the_title();?></a>
                      </h3>
                      <div class="description multi-line-3 mb-0">
                        <?php echo get_the_excerpt();?>
                      </div>
                    </div>
                  <?php
                    endwhile;
                    wp_reset_postdata();
                  endif;
                  ?>
              </div>
              <div class="pagination">
                <?php bootstrap_pagination($post_query); ?>
              </div>
            </div>

            <?php if ($videos) : ?>
              <section class="video-section">
                <div class="container">
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
            <?php endif; ?>
        </div>
    </div>
  </main>
<?php get_footer(); ?>