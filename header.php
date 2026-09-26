<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<header id="masthead" class="site-header">
			<div class="header-grid">
				<div id="logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="/wp-content/uploads/2026/09/capital360_logo.svg" alt="Capital 360 Logo" />
					</a>
				</div>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				<div id="call-us">
					<a href="tel:717-442-0979"><i class="fa-solid fa-phone"></i> Call Us</a>
				</div>
				<button id="mobile-nav-toggle" class="mobile-nav-toggle" aria-controls="mobile-nav" aria-expanded="false" aria-label="Open menu">
					<i class="fa-solid fa-bars"></i>
				</button>
			</div>
		</header><!-- #masthead -->

		<div id="mobile-nav-overlay" class="mobile-nav-overlay"></div>
		<div id="mobile-nav" class="mobile-nav" aria-hidden="true">
			<button id="mobile-nav-close" class="mobile-nav-close" aria-label="Close menu">
				<i class="fa-solid fa-xmark"></i>
			</button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container_id'   => 'mobile-primary-menu',
					'menu_class'     => 'mobile-menu',
				)
			);
			?>
			<div class="mobile-nav-call">
				<a href="tel:717-442-0979"><i class="fa-solid fa-phone"></i> Call Us</a>
			</div>
		</div>

		<script>
		( function () {
			var toggle  = document.getElementById( 'mobile-nav-toggle' );
			var closeBtn = document.getElementById( 'mobile-nav-close' );
			var overlay = document.getElementById( 'mobile-nav-overlay' );
			var panel   = document.getElementById( 'mobile-nav' );

			function openNav() {
				panel.classList.add( 'is-open' );
				overlay.classList.add( 'is-open' );
				document.body.classList.add( 'mobile-nav-open' );
				toggle.setAttribute( 'aria-expanded', 'true' );
				panel.setAttribute( 'aria-hidden', 'false' );
			}

			function closeNav() {
				panel.classList.remove( 'is-open' );
				overlay.classList.remove( 'is-open' );
				document.body.classList.remove( 'mobile-nav-open' );
				toggle.setAttribute( 'aria-expanded', 'false' );
				panel.setAttribute( 'aria-hidden', 'true' );
			}

			toggle.addEventListener( 'click', openNav );
			closeBtn.addEventListener( 'click', closeNav );
			overlay.addEventListener( 'click', closeNav );
			document.addEventListener( 'keydown', function ( e ) {
				if ( 'Escape' === e.key ) {
					closeNav();
				}
			} );
		} )();
		</script>
		<div id="colorband">
			<div></div>
			<div></div>
			<div></div>
		</div>


