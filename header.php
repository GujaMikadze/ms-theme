<?php

// =====================================================================================
// HEADER.PHP
// -------------------------------------------------------------------------------------
// Plantilla base para el <head> y apertura del <body> (<header>)
// =====================================================================================



?>

<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<meta charset="<?php bloginfo('charset'); ?>" />
<?php // icons & favicons (for more: https://favicon.io/) 
?>
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/_/img/icons/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/_/img/icons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/_/img/icons/favicon-16x16.png">
<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/_/img/icons/site.webmanifest">
<meta name="theme-color" content="#FF049B" />
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

<?php wp_head(); ?>

<!-- GTM -->
<?php /* Si es necesario incluir variables, hay que definir el dataLayer antes. ?>
		<script>
			var dataLayer = [];
		</script>
		<?php */ ?>
<?php /* En caso de necesitarlo la primera parte del script se incluye aquí. Lo proporciona el cliente o Data. ?>
		<!-- Google Tag Manager -->
		<!-- End Google Tag Manager -->
		<?php */ ?>

</head>

<body <?php body_class(); ?>>

	<?php /* Segunda parte del script ?>
		<!-- Google Tag Manager (noscript) -->
		<!-- End Google Tag Manager (noscript) -->
		<?php */ ?>

	<!-- Header -->
	<header role="banner">
		<!-- Desktop navigation -->
		<div>
			<div class="header-top bg-light p-2 mb-2 d-none d-lg-block">
				<div class="container">
					<!-- Menu Secondary -->
					<nav class="nav" role="navigation">
						<?php wp_nav_menu(array('theme_location' => 'menu-secondary')); ?>
					</nav>
					<!-- Fin del Menu Secondary -->
				</div>
			</div>
			<div class="header-mid mb-2">
				<div class="container">
					<div class="d-flex justify-content-between align-items-center">
						<a href="<?php echo esc_url(home_url('/')); ?>">
							<img src="<?php echo get_template_directory_uri() ?>/_/img/sweeft-ms-logo.webp" class="header-mid__logo" alt="Logo">
						</a>
						<div class="header-mid__hamburger d-block d-lg-none">
							<a class="hamburger-open" href="#offcanvasRight" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
								<img src="<?php echo get_template_directory_uri(); ?>/_/img/list.svg" alt="Hamburger icon" />
							</a>
							<a class="hamburger-open d-none" href="#offcanvasRight" data-bs-dismiss="offcanvas">
								<img src="<?php echo get_template_directory_uri(); ?>/_/img/close.svg" alt="Hamburger icon" />
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="header-bot bg-primary mb-5">
				<div class="container">
					<!-- Menu Secondary -->
					<div class="d-flex justify-content-lg-between justify-content-end">
						<nav class="nav d-none d-lg-block" role="navigation">
							<?php wp_nav_menu(array('theme_location' => 'main')); ?>
						</nav>
						<a class="search-icon" id="myBtn">
							<span class="d-inline d-lg-none text-white mx-3">
								Search Your Favourite Course
							</span>
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff" class="bi bi-search" viewBox="0 0 16 16">
								<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
							</svg>
						</a>
					</div>
					<!-- Fin del Menu Secondary -->
				</div>
			</div>
		</div>

		<!-- End Desktop navigation -->

		<!-- Offcanvas -->
		<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
			<div class="offcanvas-header">
				<h5 id="offcanvasRightLabel">SweeftAcademy</h5>
				<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			</div>
			<div class="offcanvas-body">
				<nav class="nav" role="navigation">
					<?php wp_nav_menu(array('theme_location' => 'main')); ?>
				</nav>
			</div>
		</div>

		<!-- End Offcanvas -->

		<!-- Search Modal -->
		<div id="myModal" class="search-modal modal justify-content-center align-items-center fade-in">
			<span class="close">
				<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
					<path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z" />
					<path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z" />
				</svg>
			</span>

			<!-- Modal content -->
			<div class="modal-content">
				<form role="search" method="get" autocomplete="off" class="form-inline" action="/">
					<input class="form-control mr-sm-2 input_search" name="s" type="search" placeholder="Search" aria-label="Search" id="searchInput">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">
						<div class="modal-content__icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff" class="bi bi-search" viewBox="0 0 16 16">
								<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
							</svg>
						</div>
					</button>
				</form>
				<div class="spinner-border search-spiner text-red" role="status" id="loading">
					<span class="sr-only"></span>
				</div>
				<div class="search_result" id="datafetch">
				</div>
			</div>

		</div>

	</header>
	<!-- Fin del Header -->