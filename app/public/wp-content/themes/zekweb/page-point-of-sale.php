<?php
/*
Template Name: Điểm bán
 */
?>
<?php get_header(); ?>
<main id="main">
  <?php get_template_part('breadcrums'); ?>
  <div class="container">
  <?php 
  $position = get_field('position');
  foreach ($position as $item) :
  ?>
    <section class="place pt-5 pb-5">
      <div class="place-title">
        <img src="<?php bloginfo('template_url'); ?>/images/place-icon.png" alt="map icon">
        <h2><?php echo $item['city']; ?></h2>
      </div>
      <div class="place-content">
        <?php echo $item['content']; ?>
      </div>
    </section>
  <?php
  endforeach;
  ?>
  </div>
</main>
<?php get_footer(); ?>
