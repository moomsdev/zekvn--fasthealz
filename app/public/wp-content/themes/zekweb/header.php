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
	?>

	<div id="zek-web">
		<div class="line-dark"></div>
		<header id="header">
			<?php
			if (is_home() || is_front_page()) :
				echo '<h1 class="site-name" style="display: none;">' . bloginfo('title') . '</h1>';
			endif;
			?>

			<div class="header-main">
				<div class="container">
					<div class="row d-none d-md-flex">
						<div class="col-md-6 col-left">
							<div class="sublogo">
								<img src="<?php the_field('sublogo', 'option') ?>" alt="<?php bloginfo('title'); ?>" />
							</div>

							<div class="logo">
								<a href="<?= esc_url(home_url()); ?>" title="<?php bloginfo('title'); ?>">
									<img src="<?php the_field('logo', 'option') ?>" alt="<?php bloginfo('title'); ?>" />
								</a>
							</div>

							<div class="slogan">
								<?php the_field('slogan', 'option'); ?>
							</div>
						</div>

						<div class="col-md-6 col-right">
							<div class="search">
								<form role="search" method="get" autocomplete="off" class="woocommerce-product-search" action="<?php echo esc_url(home_url('/')); ?>">
									<label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset($index) ? absint($index) : 0; ?>"><?php esc_html_e('Search for:', 'woocommerce'); ?></label>
									<input type="search" id="woocommerce-product-search-field-<?php echo isset($index) ? absint($index) : 0; ?>" class="search-input" placeholder="<?php echo esc_attr__('Search products&hellip;', 'woocommerce'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
									<button type="submit" value="<?php echo esc_attr_x('Search', 'submit button', 'woocommerce'); ?>" class="search-submit"></button>
									<input type="hidden" name="post_type" value="product" />
								</form>
							</div>

							<div class="info">
								<div class="hotline">
									<i class="fa fa-phone"></i>
									<a href="tel:<?php the_field('hotline', 'option'); ?>">
										<?php the_field('hotline', 'option'); ?>
									</a>
								</div>

								<div class="page-link">
									<a class="btn btn-orange" href="<?= get_field('point_of_sale', 'option') ?>"><?= esc_html__('Điểm bán', 'zekweb') ?></a>

									<a class="btn btn-red" href="<?= get_field('checkout', 'option') ?>"><?= esc_html__('Đặt hàng', 'zekweb') ?></a>
								</div>
							</div>
						</div>
					</div>

					<div class="main-menu full-width">
						<div class="container">
							<?php
							wp_nav_menu([
								'container' => '',
								'theme_location' => 'main',
								'menu_class' => 'menu'
							]);
							?>
						</div>
					</div>
				</div>
			</div>
		</header>

		<div id="menu-mobile">
			<div class="close" id="close-menu"></div>
			<?php wp_nav_menu(array('container' => '', 'theme_location' => 'main', 'menu_class' => 'menu')); ?>
		</div>
