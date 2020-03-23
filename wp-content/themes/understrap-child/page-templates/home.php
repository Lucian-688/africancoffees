<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<div class="wrapper" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
			<!-- Do the left sidebar check and opens the primary div -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">
              <!-- Introduce Bootstrap 4 Card Deck -->
              <div class="container">
              <div class="row">
                <div class="card-deck">

                 <div class="containerindex.php">
                     <div class="row justify-content-around">
                         <div class="col-12">
                                <?php if ( have_posts() ) : ?>
                                    <div class="row">

                                    <?php /* Start the Loop */ ?>

                                    <?php while ( have_posts() ) : the_post(); ?>
                                        <div class="col-md-4 p-0 col-12 pb-md-3 m-0">
                                            <?php
                                            /*
                                             * Include the Post-Format-specific template for the content.
                                             * If you want to override this in a child theme, then include a file
                                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                             */
                                            get_template_part( 'loop-templates/content', get_post_format() );
                                            ?>

                                         </div><!-- end of col -->

                                    <?php endwhile; ?>
                                     </div>	<!-- end of row -->
                                     </div> <!-- end of container -->
                                <?php else : ?>

                                    <?php get_template_part( 'loop-templates/content', 'none' ); ?>

                                <?php endif; ?>
                         </div>
                     </div>
                  </div>
              </div> <!-- End of container -->

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>



	</div><!-- #content -->

</div><!-- #index-wrapper -->


</div>

</div><!-- .row -->
<?php get_footer();
