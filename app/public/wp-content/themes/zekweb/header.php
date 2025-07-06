<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="UTF-8">
	<title><?php wp_title('|', true, 'right'); ?></title>
	<?php wp_head(); ?>
	<?php if (get_option('origin-favicon')) { ?>
		<link rel="shortcut icon" href="<?php echo get_option('origin-favicon'); ?>" type="image/x-icon">
	<?php } ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/select2.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet"> -->
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/swiper-bundle.min.css">
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/swiper-bundle.min.js"></script>

	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/jquery.fancybox.css" />
	<script src="<?php bloginfo('template_url'); ?>/js/jquery.fancybox.min.js"></script>

	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/dist/style.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css?v=<?php echo time(); ?>">
	<?php
	$value = get_field('code_header', 'option');
	echo $value
	?>
</head>

<body <?php body_class(); ?>>
	<?php
	$value = get_field('code_body', 'option');
	echo $value;
	
	$sublogo = get_field('sublogo', 'option');
  $banner = get_field('banner_home', 'option');
	?>

	<div id="zek-web">
		<div class="line-dark"></div>
		<header id="header">
			<?php
			if (is_home() || is_front_page()) {
				echo '<h1 class="site-name" style="display: none;">' . get_bloginfo('name') . '</h1>';
			}
			?>

			<div class="header-main">
				<div class="container">
					<div class="row pt-4 pb-4">
						<div class="col-lg-6 col-left d-flex align-items-center">
							<div id="touch-menu" class="touch-menu d-block d-lg-none">
							</div>
							<?php if($sublogo){ ?>
							<div class="sublogo d-none d-md-block">
								<img src="<?php echo $sublogo; ?>" alt="<?php bloginfo('title'); ?>" />
							</div>
							<?php } ?>

							<div class="logo">
								<a href="<?= esc_url(home_url()); ?>" title="<?php bloginfo('title'); ?>">
									<img src="<?php the_field('logo', 'option') ?>" alt="<?php bloginfo('title'); ?>" />
								</a>
							</div>

							<div class="slogan d-none d-lg-block">
								<?php the_field('slogan', 'option'); ?>
							</div>
						</div>

						<div class="col-md-6 col-right d-none d-lg-flex">
							<div class="search">
								<form role="search" method="get" autocomplete="off" class="woocommerce-product-search" action="<?php echo esc_url(home_url('/')); ?>">
									<label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset($index) ? absint($index) : 0; ?>"><?php esc_html_e('Search for:', 'woocommerce'); ?></label>
									<input type="search" id="woocommerce-product-search-field-<?php echo isset($index) ? absint($index) : 0; ?>" class="search-input" placeholder="<?php echo esc_attr__('Nhập tìm kiếm&hellip;', 'woocommerce'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
									<button type="submit" value="<?php echo esc_attr_x('Search', 'submit button', 'woocommerce'); ?>" class="search-submit">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
                  </button>
									<input type="hidden" name="post_type" value="product" />
								</form>
							</div>

							<div class="info">
								<?php
								$contact = get_field('contact', 'option');
								$hotline = $contact['hotline'];
								?>
								<?php if($hotline) : ?>	
									<div class="hotline">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M280 0C408.1 0 512 103.9 512 232c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-101.6-82.4-184-184-184c-13.3 0-24-10.7-24-24s10.7-24 24-24zm8 192a32 32 0 1 1 0 64 32 32 0 1 1 0-64zm-32-72c0-13.3 10.7-24 24-24c75.1 0 136 60.9 136 136c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-48.6-39.4-88-88-88c-13.3 0-24-10.7-24-24zM117.5 1.4c19.4-5.3 39.7 4.6 47.4 23.2l40 96c6.8 16.3 2.1 35.2-11.6 46.3L144 207.3c33.3 70.4 90.3 127.4 160.7 160.7L345 318.7c11.2-13.7 30-18.4 46.3-11.6l96 40c18.6 7.7 28.5 28 23.2 47.4l-24 88C481.8 499.9 466 512 448 512C200.6 512 0 311.4 0 64C0 46 12.1 30.2 29.5 25.4l88-24z"/></svg>
										<a href="tel:<?php echo str_replace(['.', ',', ' '], '', $hotline); ?>">
											<?php echo 'Hotline ' . $hotline; ?>
										</a>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>

					<div class="main-menu full-width d-none d-lg-block">
						<div class="container">
							<?php
							wp_nav_menu(['container' => '', 'theme_location' => 'main', 'menu_class' => 'menu']);
							?>
						</div>
					</div>
				</div>
			</div>
			<?php
			if (is_home() || is_front_page()) :
				if (!empty($banner) && is_array($banner)) :
			?>
				<section class="section-banner">
          <div class="swiper swiper-banner-home">
            <div class="swiper-wrapper">
              <?php
              $i = 0;
              foreach ($banner as $image):
              ?>
                <div class="swiper-slide">
                  <figure>
                    <img src="<?= $image['image'] ?>" alt="banner-<?= $i ?>">
                  </figure>
                </div>
              <?php 
                $i++;
              endforeach;
              ?>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </section>
			<?php 
				endif;
			endif; 
			?>
		</header>

		<div id="menu-mobile">
			<div class="close" id="close-menu"></div>
			<?php wp_nav_menu(array('container' => '', 'theme_location' => 'main', 'menu_class' => 'menu')); ?>
		</div>
