<?php
/**
 * Template Name: Only Left Sidebar
 * Description: A Page Template to display full width page contents.
 *
 * @package  WellThemes
 * @file     page-full.php
 * @author   Well Themes Team
 * @link 	 http://wellthemes.com
 */
?>
<?php get_header(); ?>
<div id="right-content">
<section id="primary">
	<div id="content" role="main">
	<?php if (have_posts()) : ?>
		<?php while ( have_posts() ) : the_post(); ?>				
			<?php get_template_part( 'content', 'page' ); ?>
		<?php endwhile; // end of the loop. ?>
	<?php endif ?>	

	</div><!-- /content -->
</section><!-- /primary -->
<?php get_sidebar('left'); ?>
</div>
<?php get_footer(); ?>