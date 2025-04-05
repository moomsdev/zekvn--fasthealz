<?php
$term = get_queried_object();
$categories = get_terms('category', [
  'parent' => $term->term_id,
  'hide_empty' => true,
]);

foreach ( $categories as $category ) :
?>
<div class="mb-5 border-bottom border-1 border-dark pb-5">
  <h2 class="heading-orange"><a href="<?php echo get_term_link($category) ?>"><?php echo $category->name;?></a></h2>
  <div class="row">
    <!-- first post -->
    <?php
    $post_query = new WP_Query([
      'post_type'      => 'post',
      'posts_per_page' => 1,
      'post_status'    => 'publish',
      'tax_query'      => [[  'taxonomy' => 'category',
                              'field' => 'term_id',
                              'terms' => $category->term_id,
                              'include_children' => true,
                          ],],
    ]);

    if ($post_query->have_posts()) :
        while ($post_query->have_posts()) : $post_query->the_post();
    ?>
        <div class="col-md-12 col-xl-6 mb-md-5 first-post mb-5 mb-md-0">
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
    <!-- other post -->
    <div class="col-md-12 col-xl-6 d-flex flex-column justify-content-between">
      <?php
      $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
      $posts_per_page = 4;
      $initial_offset = 1; // bỏ qua bài đầu tiên đã hiển thị riêng
      
      // Tính offset theo số trang hiện tại
      $offset = ($paged - 1) * $posts_per_page + $initial_offset;
      
      $args = [
          'post_type'      => 'post',
          'posts_per_page' => $posts_per_page,
          'offset'         => $offset,
          'post_status'    => 'publish',
          'tax_query'      => [
              [
                  'taxonomy'         => 'category',
                  'field'            => 'term_id', 
                  'terms'            => $category->term_id,
                  'include_children' => true,
              ],
          ],
          // Tham số 'paged' có thể giữ lại để truy cập vào thuộc tính max_num_pages trong WP_Query
          'paged'          => $paged,
      ];
      $post_query = new WP_Query($args);

      if ($post_query->have_posts()) :
        while ($post_query->have_posts()) : $post_query->the_post();
      ?>
        <div class="row health-blog mb-5 mb-md-0">
            <div class="col-md-12 col-xl-4">
                <a href="<?php the_permalink(); ?>" class="d-block">
                    <figure>
                      <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>">
                    </figure>
                </a>
            </div>
            <div class="col-md-12 col-xl-8">
              <h3 class="title multi-line-1 text-start mx-0 w-100">
                <a href="<?php the_permalink(); ?>" class="d-block"><?php the_title();?></a>
              </h3>
              <div class="description multi-line-3">
                  <?php echo get_the_excerpt();?>
              </div>
            </div>
        </div>
    <?php
      endwhile;
      wp_reset_postdata();
    endif;
    ?>
    <!-- pagination -->
    
    </div>

    <div class="pagination">
    <?php get_template_part( 'pagination' ); ?>
    </div>
  </div>
</div>
<?php
endforeach;