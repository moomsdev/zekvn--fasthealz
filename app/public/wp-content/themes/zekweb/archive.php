<?php get_header(); $a=get_query_var('cat' );?>
<?php $term = get_queried_object(); ?>
<main id="main">
    <?php get_template_part('breadcrums'); ?>
    <div class="page-body">
        <div class="container">
            <?php
            if($term->parent == 0):
                get_template_part('template-parts/post/category', 'parent');    
            elseif($term->parent != 0):
                get_template_part('template-parts/post/category', 'children');
            else:
                get_template_part('template-parts/post/category');
            endif;
            ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>