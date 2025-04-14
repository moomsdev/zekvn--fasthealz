<?php
$term = get_queried_object();
?>
<div class="mb-5 border-1 border-dark pb-5">
  <h1 class="d-none"> <?php echo $term->name;?> </h1>
  <figure>
    <img src="<?php echo get_field('category_image', $term); ?>" alt="<?php echo $term->name;?>">
  </figure>
  <div class="row mt-5">
    <div class="col-12 col-lg-8">
      <div class="row">
        <?php
           if (have_posts()) :
            while (have_posts()) : the_post();
          ?>
            <div class="col-6 col-xl-6 mb-md-5 mb-5 mb-md-0 loop-post">
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
        <?php get_template_part('pagination'); ?>
      </div>
    </div>
    <div class="col-12 col-lg-4 d-none d-lg-block">
        <?php get_template_part('template-parts/sidebar'); ?>
      </div>
  </div>
</div>