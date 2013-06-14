
<?php
/*
Template Name: Home page with Royal slider
*/
?>

<?php get_header(); ?>

<div class="clear"></div>

<?php if (get_option('op_featured_area') == 'on') { ?>
<div id="top_content_flex"> 
<div class="inner">	

<?php include (TEMPLATEPATH . "/includes/royal-slider.php"); ?>

</div>
</div>
<div class="clear"></div>

<?php } ?>

<div id="main_content"> 
<div class="inner">		
	
<div id="home_content">		
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php the_content(''); ?>

<?php endwhile; ?>
<?php endif; ?> 
</div>
	
<?php get_sidebar('right'); ?>	
	
</div>
</div>


<div class="clear"></div>
	
<?php get_footer(); ?>



	