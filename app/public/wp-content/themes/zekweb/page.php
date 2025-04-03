<?php get_header(); ?>
<?php while (have_posts()) : the_post();setPostViews($post->ID); ?>
<main id="main">
    <?php get_template_part('breadcrums'); ?>
    <div class="page-body">
        <div class="container">
            <h1 class="page-title orange-color"><?php the_title();?></h1>
            <?php if (has_post_thumbnail()) : ?>
            <div class="banner full-width mt-4 mb-4">
                <figure>
                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>">
                </figure>
            </div>
            <?php endif; ?>
            <div class="page-content">
                <div class="content-post clearfix">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php endwhile; ?>
<?php get_footer(); ?>