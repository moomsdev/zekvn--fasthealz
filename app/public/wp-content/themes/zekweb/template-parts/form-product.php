<?php
/* Template Name: Mua Hàng Nhanh */
get_header();
?>
<section class="quickbuy full-width">
    <div class="container">
        <h3 class="quickbuy-title">Fasthealz có mặt các Bệnh viện, Phòng khám, Nhà thuốc trên toàn quốc</h3>
        <div class="quickbuy-content">
            <div class="row">
                <div class="col-12 col-lg-6 mb-5 mb-lg-0">
                    <div class="header-quickbuy">
                        <div class="d-flex align-items-center position-relative inner-header flex-wrap flex-lg-nowrap">
                            <span>Đặt mua chính hãng</span>
                            <img class="logo-fasthealz" src="<?php echo get_template_directory_uri(); ?>/images/logo-fasthealz.png" alt="Fasthealz">
                        </div>
                        <img class="sale-quickbuy" src="<?php echo get_template_directory_uri(); ?>/images/sale.png" alt="sale">
                    </div>
                    <div class="form-contact-quickbuy">
                        <?php echo do_shortcode('[contact-form-7 id="09961a7" title="Đặt hàng nhanh"]'); ?>
                    </div>
                </div>
                
                <div class="col-12 col-lg-6">
                    <div class="products-img">
                        <img src="<?php echo get_field('img_quickbuy', 'option') ?>" alt="quickbuy">
                        <?php
                        $contact = get_field('contact', 'option');
                        $hotline = $contact['hotline'];
                        ?>
                        <a href="tel:<?php echo str_replace(['.', ',', ' '], '', $hotline); ?>" class="btn-quickbuy">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/hotline.png" alt="hotline">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
