<?php 
$contact = get_field('contact', 'option');
$company = $contact['company'];
$address = $contact['address'];
$hotline = $contact['hotline'];
$socials = get_field('socials', 'option');
$zalo = $socials['zalo'];
$facebook = $socials['facebook'];
$youtube = $socials['youtube'];
$tiktok = $socials['tiktok'];

$shopOnline = get_field('shop_online', 'option');
$tiktokShop = $shopOnline['tiktok'];
$shopeeShop = $shopOnline['shopee'];

?>
            <?php 
                get_template_part('template-parts/form-product');
            ?>
            <footer id="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-12 mb-5 logo-footer">
                            <figure class="media">
                                <img src="<?= get_field('footer_logo', 'option') ?>" alt="footer logo">
                            </figure>
                        </div>
                        
                        <div class="col-12 col-lg-4">
                            <h3 class="title-footer">
                                <?php echo $company ?>
                            </h3>

                            <p class="address-footer">
                                <?php echo $address ?>
                            </p>

                            <h3 class="title-footer mt-5">Liên kết với chúng tôi</h3>
                            <ul class="socials-footer">
                                <li>
                                    <a href="https://zalo.me/<?php echo $zalo ?>" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 48 48">
<path fill="#2962ff" d="M15,36V6.827l-1.211-0.811C8.64,8.083,5,13.112,5,19v10c0,7.732,6.268,14,14,14h10	c4.722,0,8.883-2.348,11.417-5.931V36H15z"></path><path fill="#eee" d="M29,5H19c-1.845,0-3.601,0.366-5.214,1.014C10.453,9.25,8,14.528,8,19	c0,6.771,0.936,10.735,3.712,14.607c0.216,0.301,0.357,0.653,0.376,1.022c0.043,0.835-0.129,2.365-1.634,3.742	c-0.162,0.148-0.059,0.419,0.16,0.428c0.942,0.041,2.843-0.014,4.797-0.877c0.557-0.246,1.191-0.203,1.729,0.083	C20.453,39.764,24.333,40,28,40c4.676,0,9.339-1.04,12.417-2.916C42.038,34.799,43,32.014,43,29V19C43,11.268,36.732,5,29,5z"></path><path fill="#2962ff" d="M36.75,27C34.683,27,33,25.317,33,23.25s1.683-3.75,3.75-3.75s3.75,1.683,3.75,3.75	S38.817,27,36.75,27z M36.75,21c-1.24,0-2.25,1.01-2.25,2.25s1.01,2.25,2.25,2.25S39,24.49,39,23.25S37.99,21,36.75,21z"></path><path fill="#2962ff" d="M31.5,27h-1c-0.276,0-0.5-0.224-0.5-0.5V18h1.5V27z"></path><path fill="#2962ff" d="M27,19.75v0.519c-0.629-0.476-1.403-0.769-2.25-0.769c-2.067,0-3.75,1.683-3.75,3.75	S22.683,27,24.75,27c0.847,0,1.621-0.293,2.25-0.769V26.5c0,0.276,0.224,0.5,0.5,0.5h1v-7.25H27z M24.75,25.5	c-1.24,0-2.25-1.01-2.25-2.25S23.51,21,24.75,21S27,22.01,27,23.25S25.99,25.5,24.75,25.5z"></path><path fill="#2962ff" d="M21.25,18h-8v1.5h5.321L13,26h0.026c-0.163,0.211-0.276,0.463-0.276,0.75V27h7.5	c0.276,0,0.5-0.224,0.5-0.5v-1h-5.321L21,19h-0.026c0.163-0.211,0.276-0.463,0.276-0.75V18z"></path>
</svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $facebook ?>" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 48 48">
<path fill="#3F51B5" d="M42,37c0,2.762-2.238,5-5,5H11c-2.761,0-5-2.238-5-5V11c0-2.762,2.239-5,5-5h26c2.762,0,5,2.238,5,5V37z"></path><path fill="#FFF" d="M34.368,25H31v13h-5V25h-3v-4h3v-2.41c0.002-3.508,1.459-5.59,5.592-5.59H35v4h-2.287C31.104,17,31,17.6,31,18.723V21h4L34.368,25z"></path>
</svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $youtube ?>" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 48 48">
<path fill="#FF3D00" d="M43.2,33.9c-0.4,2.1-2.1,3.7-4.2,4c-3.3,0.5-8.8,1.1-15,1.1c-6.1,0-11.6-0.6-15-1.1c-2.1-0.3-3.8-1.9-4.2-4C4.4,31.6,4,28.2,4,24c0-4.2,0.4-7.6,0.8-9.9c0.4-2.1,2.1-3.7,4.2-4C12.3,9.6,17.8,9,24,9c6.2,0,11.6,0.6,15,1.1c2.1,0.3,3.8,1.9,4.2,4c0.4,2.3,0.9,5.7,0.9,9.9C44,28.2,43.6,31.6,43.2,33.9z"></path><path fill="#FFF" d="M20 31L20 17 32 24z"></path>
</svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $tiktok ?>" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 50 50">
    <path d="M41,4H9C6.243,4,4,6.243,4,9v32c0,2.757,2.243,5,5,5h32c2.757,0,5-2.243,5-5V9C46,6.243,43.757,4,41,4z M37.006,22.323 c-0.227,0.021-0.457,0.035-0.69,0.035c-2.623,0-4.928-1.349-6.269-3.388c0,5.349,0,11.435,0,11.537c0,4.709-3.818,8.527-8.527,8.527 s-8.527-3.818-8.527-8.527s3.818-8.527,8.527-8.527c0.178,0,0.352,0.016,0.527,0.027v4.202c-0.175-0.021-0.347-0.053-0.527-0.053 c-2.404,0-4.352,1.948-4.352,4.352s1.948,4.352,4.352,4.352s4.527-1.894,4.527-4.298c0-0.095,0.042-19.594,0.042-19.594h4.016 c0.378,3.591,3.277,6.425,6.901,6.685V22.323z"></path>
</svg>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-12 col-lg-4">
                            <h3 class="title-footer mt-5 mt-lg-0">
                                Quy chế hoạt động
                            </h3>

                            <nav class="footer-menu">
                                <?php wp_nav_menu(array('container' => '', 'theme_location' => 'footer', 'menu_class' => 'menu')); ?>
                            </nav>
                        </div>

                        <div class="col-12 col-lg-4">
                            <h3 class="title-footer mt-5 mt-lg-0">
                                Mua hàng tại
                            </h3>

                            <ul class="shop-footer">
                                <li>
                                    <figure>
                                        <img src="<?php bloginfo('template_url'); ?>/images/shopee.png" alt="shopee">
                                    </figure>
                                    <a href="<?= $shopeeShop ?>" target="_blank">
                                        <?= $shopeeShop ?>
                                    </a>
                                </li>
                                <li>
                                    <figure>
                                        <img src="<?php bloginfo('template_url'); ?>/images/tiktok.png" alt="tiktok">
                                    </figure>
                                    <a href="<?= $tiktokShop ?>" target="_blank">
                                        <?= $tiktokShop ?>
                                    </a>
                                </li>

                                <li>
                                    <figure>
                                        <img src="<?php bloginfo('template_url'); ?>/images/facebook.png" alt="shop footer">
                                    </figure>
                                    <a href="<?= $facebook ?>" target="_blank">
                                        <?= $facebook ?>
                                    </a>
                                </li>
                            </ul>

                            <div class="note mt-5">
                                <figure>
                                    <img src="<?php bloginfo('template_url'); ?>/images/novo-farm.png" alt="note footer">
                                </figure>

                                <p>
                                Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

            <div class="supports">
                <div class="item">
                    <a href="tel:<?php the_field('hotline', 'option'); ?>"
                        class="hotline" title="Gọi ngay">
                        <img src="<?php bloginfo('template_url'); ?>/images/support-hotline.png"
                            alt="icon">
                    </a>
                </div>
                <div class="item">
                    <a href="http://zalo.me/<?php the_field('zalo', 'option') ?>"
                        target="_blank" class="zalo" title="Chat Zalo">
                        <img src="<?php bloginfo('template_url'); ?>/images/support-zalo.png"
                            alt="icon">
                    </a>
                </div>
                <div class="item">
                    <a href="https://m.me/<?php the_field(' ', 'option') ?>"
                        target="_blank" class="messenger" title="Chat Facebook">
                        <img decoding="async"
                            src="<?php bloginfo('template_url'); ?>/images/support-messenger.png"
                            alt="icon">
                    </a>
                </div>
            </div>

            <div class="backtop">
                <a href="#top" id="back-top" title="Back To Top">
                    <img src="<?php bloginfo('template_url'); ?>/images/backtop.png"
                        alt="icon">
                </a>
            </div>

            <script type="text/javascript"
                src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
            <script type="text/javascript"
                src="<?php bloginfo('template_url'); ?>/js/select2.min.js"></script>
            <script type="text/javascript"
                src="<?php bloginfo('template_url'); ?>/js/custom.js?v=<?php echo time(); ?>"></script>

            <?php 
            $value = get_field('code_footer', 'option');
            echo $value;
            ?>
            <?php wp_footer(); ?>
        </div>
    </body>
</html>