<?php
$term = get_queried_object();
$banner =  get_field('category_image', $term);
?>
<div class="mb-5 border-1 border-dark pb-5">
  <h1 class="d-none"> <?php echo $term->name;?> </h1>
  <?php if($banner) : ?>
  <figure>
    <img src="<?php echo $banner; ?>" alt="<?php echo $term->name;?>">
  </figure>
  <?php endif; ?>
  <div class="row mt-5">
    <div class="col-12 col-lg-8">
      <div class="row">
        <?php
          $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
          $post_query = new WP_Query([
            'post_type'      => 'post',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
            'paged'          => $paged,
            'tax_query'      => [[  'taxonomy' => 'category',
                                    'field' => 'term_id', 
                                    'terms' => $term->term_id,
                                    'include_children' => true,
                                ],],
          ]);

          if ($post_query->have_posts()) :
            while ($post_query->have_posts()) : $post_query->the_post();
          ?>
            <div class="col-6 col-xl-6 mb-md-5 mb-5 mb-md-0 loop-post">
              <a href="<?php the_permalink(); ?>" class="d-block">
                <figure>
                  <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>">
                </figure>
              </a>
              <h3 class="title multi-line-2 text-start mx-0 w-100">
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
        <?php get_template_part('pagination'); ?>
      </div>
    </div>
    <div class="col-12 col-lg-4 d-none d-lg-block">
        <?php get_template_part('template-parts/sidebar'); ?>
      </div>
  </div>
</div>