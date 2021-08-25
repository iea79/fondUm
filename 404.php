<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package frondendie
 */

get_header();
?>

	<main id="primary" class="site-main">

		<div class="container_center">

			<section class="error-404 not-found">

				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Ошибка 404! <br>Такой страницы не существует.', 'frondendie' ); ?></h1>
				</header><!-- .page-header -->

			</section><!-- .error-404 -->

		</div>

	</main><!-- #main -->

<?php
get_footer();
