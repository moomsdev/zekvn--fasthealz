<?php get_header()?>
<main id="main">
    <?php get_template_part('breadcrums'); ?>
    <div class="page-body">
        <div class="container">
            <h1 class="title-single orange-color"><?php the_title(); ?></h1>
            <div class="banner-single full-width">
                <figure>
                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>">
                </figure>
            </div>

            <div class="row mt-5">
                <div class="col-12 col-lg-8 content-single">
                    <?php the_content(); ?>

                    <?php echo do_shortcode('[cusrev_reviews]'); ?>

                    <div class="row mt-5 related-posts">
                        <div class="col-12">
                            <h2 class="title text-primary text-uppercase text-start">Bài viết liên quan</h2>
                            <div class="row">
                                <?php
                                $categories = wp_get_post_categories(get_the_ID());
                                $args = array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 6,
                                    'post__not_in' => array(get_the_ID()),
                                    'orderby' => 'date',
                                    'order' => 'DESC',
                                    'post_status' => 'publish',
                                    'category__in' => $categories,
                                );
                                $related_posts = new WP_Query($args);
                                if ($related_posts->have_posts()) :
                                    while ($related_posts->have_posts()) : $related_posts->the_post();
                                ?>
                                    <div class="col-6 col-lg-4 related-post">
                                      <figure>
                                        <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>">
                                      </figure>
                                      <h3 class="title multi-line-2">
                                        <a href="<?php the_permalink(); ?>">
                                          <?php the_title(); ?>
                                        </a>
                                      </h3>
                                    </div>
                                <?php
                                    endwhile;
                                    wp_reset_postdata();
                                else :
                                    echo '<p>Không có bài viết liên quan.</p>';
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-lg-4 d-none d-lg-block">
                    <?php get_template_part('template-parts/sidebar'); ?>
                </div>
            </div>

            
        </div>
    </div>
</main>
<?php get_footer(); ?>