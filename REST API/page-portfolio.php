<?php
get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<h1>PORTFOLIO PAGE</h1>
			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				// Include the page content template.
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->

					<?php twentysixteen_post_thumbnail(); ?>

					<div class="entry-content">
						<?php
						the_content();

						?>
						<button id="portfolio-btn">Load portfolio blog posts</button>
						<div id="portfolio-inner-block"></div>
						
					</div><!-- .entry-content -->

					<?php
					edit_post_link(
						sprintf(
						/* translators: %s: Name of current post */
							__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
							get_the_title()
						),
						'<footer class="entry-footer"><span class="edit-link">',
						'</span></footer><!-- .entry-footer -->'
					);
					?>

				</article><!-- #post-## -->
				<?php
				// End of the loop.
			endwhile;
			?>

		</main><!-- .site-main -->


	</div><!-- .content-area -->


<?php get_footer(); ?>