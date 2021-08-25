<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package frondendie
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header id="masthead" class="header">
	<div class="header-content">


		<div class="header-logo">
			<?php
			the_custom_logo();
			?>
		</div><!-- .site-branding -->

	<div class="header-menu">

		<nav id="site-navigation" class="nav">
			<?php
			wp_nav_menu(
				array(
					'menu'            => 'menu-1',
					'container'       => '',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</div>

	</div>
	<div class="header-mobile">

	  <div class="mobile-top">
		  <div class="logo_center">
			  <?php
 			 the_custom_logo();
 			 ?>
		  </div>
		  <img class="menu-mob" src="<?php echo wp_get_attachment_url(SCF::get_option_meta('site-settings', 'menu_img' )) ?>" alt=""/>
	  </div>
	  <div class="mobile-content">
		<div class="mobile-menu">
		  <div class="mobile-menu__top">
			  <img class="close-img" src="<?php echo wp_get_attachment_url(SCF::get_option_meta('site-settings', 'close_img' )) ?>" alt=""/>

				  <?php
				  the_custom_logo();
				  ?>

		  </div>
		  <nav class="nav">

			<?php
			wp_nav_menu( [
				'menu'            => 'menu-1',
				'container'       => '',
				'menu_class'      => 'navbar-mobile',
				] );

			?>

		  </nav>
		  <div class="mobile-question">
			<div class="question-title__mobile">Мы ответим на интересующие вас вопросы. Свяжитесь с нами</div>
			<div class="question-button__box-mob">
			  <div class="button-item-mob">
				  <a href="tel: <?php echo SCF::get_option_meta('site-settings', 'call_button') ?>" class="btn orange-button call-button mob-orange">
					  <?php echo SCF::get_option_meta('site-settings', 'call_button') ?>
				  </a>
			  </div>
			  <div class="button-item-mob">
				  <a href="mailto: <?php echo SCF::get_option_meta('site-settings', 'message_button') ?>" class="btn orange-button message-button mob-orange">
					  <?php echo SCF::get_option_meta('site-settings', 'message_button') ?>
				  </a>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>

</header><!-- #masthead -->
