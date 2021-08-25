<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package frondendie
 */
if (is_front_page()) {
	get_template_part( 'template-parts/content', 'home' );
} elseif(is_page(11)) {
	get_template_part( 'template-parts/content', 'fond' );
} elseif(is_page(13)) {
	get_template_part( 'template-parts/content', 'doc' );
} elseif(is_page(15)) {
	get_template_part( 'template-parts/content', 'contacts' );

} else {
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->

		<?php frondendie_post_thumbnail(); ?>

		<div class="entry-content">
			<?php
			the_content();

			// wp_link_pages(
			// 	array(
			// 		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'frondendie' ),
			// 		'after'  => '</div>',
			// 	)
			// );
			?>
		</div><!-- .entry-content -->

	</article><!-- #post-<?php the_ID(); ?> -->

	<?php
}
?>
