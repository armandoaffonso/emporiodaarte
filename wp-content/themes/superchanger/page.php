

<?php get_header(); ?>

<div id="main_content"> 
<div class="inner">	
	
<div id="content">	

<div id="content_bread_panel">	
<?php if (function_exists('wp_breadcrumbs')) wp_breadcrumbs(); ?>
<?php get_search_form(); ?>
</div>
<div class="clear"></div>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
    <div class="single_post">
    <div class="single_title">	  
	   <h1><?php the_title(); ?></h1><span></span>	  
    </div>
	 
	<div class="clear"></div>
	
	<?php if (get_option('op_single_meta_line') == 'on') { ?>	
	<div class="post_meta_line">
		<span class="post_time"><img src="<?php echo get_template_directory_uri(); ?>/images/post_time.png" /><?php the_time('j F, Y'); ?></span> 
		<span class="post_comments"><img src="<?php echo get_template_directory_uri(); ?>/images/post_comm.png" /><?php comments_popup_link('0', '1', '%'); ?></span> 
	</div> 
	<?php } ?>
	
	<div class="clear"></div>
	 
    <?php if (get_option('op_single_page_thumbnail') == 'on') { ?>
	   <?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post-thumbnails', false, '' ); $thumbnailSrc = $src[0]; ?>	

	   <?php if(has_post_thumbnail()) { ?>
	   
        <div class="single_thumbnail">
	  
        <?php $image = aq_resize( $thumbnailSrc, 300, 180, true ); ?>
        <img src="<?php echo $image ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>

	    </div>
	   
	   <?php } else { } ?>
	<?php } ?>	
	
    <div class="single_text">
	    <?php the_content(''); ?>
    </div>
<?php wp_link_pages(); ?>
    <div class="clear"></div>

	<?php if (get_option('op_single_page_comments') == 'on') comments_template('', true); ?>

	<?php endwhile; ?>
	<?php else : ?>
		
	<div class="post_nr" >
        <h2>Nothing Found!</h2>
        <div class="single-entry">
        Sorry, but nothing matched your search criteria. Please try again with some different keywords.
        <br/>
		<?php get_search_form(); ?>
        </div>
        <div class="clear"></div>
    </div>

</div>
	
	<?php endif; ?>
 	 
</div>


</div>
	
<?php get_sidebar('right'); ?>	
	
</div>


<div class="clear"></div>
	
<?php get_footer(); ?>
	