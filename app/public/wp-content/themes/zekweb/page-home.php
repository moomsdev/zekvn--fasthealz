<?php
/*
 Template Name: Trang chủ
 */
?>
<?php get_header(); ?>
<main id="main">
    <?php
    // Section 1
    get_template_part('template-parts/home/section', 'feature');

    // Section 2
    echo get_template_part('template-parts/home/section', 'about');

    // Section 3
    get_template_part('template-parts/home/section', 'products');

    // Section 4
    get_template_part('template-parts/home/section', 'banner');

    // Section 5
    get_template_part('template-parts/home/section', 'testimonials');

    // Section 6
    get_template_part('template-parts/home/section', 'post_slider');

    // Section 7
    get_template_part('template-parts/home/section', 'img_slider');
    
    // Section 8
    get_template_part('template-parts/home/section', 'latest_posts');

    // Section 9
    get_template_part('template-parts/home/section', 'partners');

    // Section 10
    get_template_part('template-parts/home/section', 'video'); 
    ?>
</main>
<?php get_footer(); ?>
