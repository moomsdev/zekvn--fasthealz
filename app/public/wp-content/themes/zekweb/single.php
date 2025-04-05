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
                <div class="col-12">
                    <?php echo do_shortcode('[toc]'); ?>
                </div>
                <div class="col-12 col-lg-8">
                    <?php the_content(); ?>
                </div>
                <div class="col-12 col-lg-4 d-none d-lg-block">
                    <?php get_template_part('template-parts/sidebar'); ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>