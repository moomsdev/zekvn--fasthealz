<?php
/*
Template Name: Đội ngũ chuyên gia
 */

$faq = get_field('faq');
$faq_latest = get_field('faq_latest');
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
            <div class="page-content employee-page">
              <div class="inner-content">
                <?php the_content(); ?>
              </div>
              <!-- Latest FAQ -->
              <?php if ($faq_latest) : 
                // Set up pagination
                $items_per_page = 5;
                $current_page = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                $total_items = count($faq_latest);
                $total_pages = ceil($total_items / $items_per_page);
                
                // Get items for current page
                $offset = ($current_page - 1) * $items_per_page;
                $paged_items = array_slice($faq_latest, $offset, $items_per_page);
              ?>
                <div class="latest-faq">
                  <h2 class="title-orange text-uppercase">Câu hỏi gần đây</h2>
                  <div class="faq-list">
                    <?php foreach ($paged_items as $item) : ?>
                    <div class="faq-item">
                      <h3 class="faq-title"><?php echo $item['question']; ?></h3>
                      <div class="faq-content">
                        <?php echo $item['answer']; ?>
                      </div>
                    </div>
                    <?php endforeach; ?>
                  </div>
                  
                  <?php if ($total_pages > 1) : ?>
                    <div class="pagination">
                      <?php 
                        // Create a custom WP_Query object for pagination
                        $pagination_query = new WP_Query();
                        $pagination_query->max_num_pages = $total_pages;
                        $pagination_query->query_vars['paged'] = $current_page;
                        
                        // Call bootstrap_pagination with our custom query
                        bootstrap_pagination($pagination_query);
                      ?>
                    </div>
                  <?php endif; ?>
                </div>
              <?php endif; ?>

              <!-- FAQ -->
              <?php if ($faq) : ?>
                <?php get_template_part('template-parts/faq'); ?>
              <?php endif; ?>
            </div>
        </div>
    </div>
  </main>
<?php get_footer(); ?>