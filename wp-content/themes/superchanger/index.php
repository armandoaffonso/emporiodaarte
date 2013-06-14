

<?php get_header(); ?>

<div class="clear"></div>

<div id="main_content"> 
<div class="inner">		


<?php
$cat_id = get_query_var('cat');
$cat_data = get_option("category_$cat_id");
?>	

<div id="index_content">		
<div id="content">	

<div id="content_bread_panel">	
<?php if (function_exists('wp_breadcrumbs')) wp_breadcrumbs(); ?>
<?php get_search_form(); ?>
</div>

<div class="clear"></div>

   <?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
     
	<div class="post<?php if (isset($cat_data['extra3'])){ echo $cat_data['extra3'];} ?>">
	
	<?php 
        $rating_text = get_post_meta($post->ID, 'r_rating_text', true);
        if($rating_text) { ?>
		<div class="post_rating">
	    <span><?php echo get_option('op_rating_tirle'); ?></span>
		<?php echo $rating_text; ?>
		</div>
	<?php } ?>
	
	<?php if(has_post_thumbnail()) { ?>
	<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post-thumbnails', false, '' ); $thumbnailSrc = $src[0]; ?>	
	
	<div class="post_thumbnail">
        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
		
		<?php if($cat_data['extra3'] == ''){ ?>
		<?php $image = aq_resize( $thumbnailSrc, 290, 240, true ); ?>
        <img src="<?php echo $image ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
	    <?php } ?>
		
		<?php if($cat_data['extra3'] == '_one_column_simple'){ ?>
		<?php $image = aq_resize( $thumbnailSrc, 290, 190, true ); ?>
        <img src="<?php echo $image ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
		<?php } ?>
		
		<?php if($cat_data['extra3'] == '_two_column_simple'){ ?>
		<?php $image = aq_resize( $thumbnailSrc, 290, 200, true ); ?>
        <img src="<?php echo $image ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
	    <?php } ?>
		
	   </a>
	</div>
	
    <div class="post_format_box">
		
		<?php $format = get_post_format(); if ( false === $format ) { ?>
		<a href="<?php the_permalink() ?>" class="post_format" title="<?php echo get_option('op_read_post'); ?> <?php the_title(); ?>"></a>
        <?php } ?>
		
		<?php if(has_post_format('image')) { ?>
		<a href="<?php the_permalink() ?>" class="image_format" title="<?php echo get_option('op_view_image_post'); ?> <?php the_title(); ?>"></a>
		<?php } ?>
		
		<?php if(has_post_format('video')) { ?>
		
		<?php $lightbox_video_post = get_post_meta($post->ID, 'r_lightbox_video_post', true); 
	    if($lightbox_video_post !== '') { ?>

		<?php 
        $youtube = get_post_meta($post->ID, 'r_youtube', true);
        $vimeo = get_post_meta($post->ID, 'r_vimeo', true);
        ?>

		<?php if($youtube) { ?>
		    <a href="http://www.youtube.com/watch?v=<?php echo $youtube; ?>" class="video_format" title="<?php echo get_option('op_view_video_post'); ?> <?php the_title(); ?>" rel="prettyPhoto"></a>
		<?php } ?>
		
        <?php if($vimeo) { ?>
		    <a href="http://vimeo.com/<?php echo $vimeo; ?>" class="video_format" title="<?php echo get_option('op_view_video_post'); ?> <?php the_title(); ?>" rel="prettyPhoto"></a>
		<?php } ?>

		<?php } else { ?>	
		<a href="<?php the_permalink() ?>" class="video_format" title="<?php echo get_option('op_view_video_post'); ?> <?php the_title(); ?>"></a>
		<?php } ?>
		
		<?php } ?>
		
		<?php if(has_post_format('audio')) { ?>
		<a href="<?php the_permalink() ?>" class="audio_format" title="<?php echo get_option('op_view_audio_post'); ?> <?php the_title(); ?>"></a>
		<?php } ?>
		
		<?php if(has_post_format('chat')) { ?>
		<a href="<?php the_permalink() ?>" class="game_format" title="<?php echo get_option('op_view_game_post'); ?> <?php the_title(); ?>"></a>
		<?php } ?>
		
	</div>
	
    <?php } else { } ?>

	<?php if (get_option('op_blog_meta_line') == 'on') { ?>	
	<div class="post_meta_line">
		<?php the_time('j F, Y'); ?>
	</div> 
	<?php } ?>
	
	<h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" ><?php the_title(); ?></a></h1>
    
	<?php if($cat_data['extra3'] == '_one_column_simple'){ ?>
		<?php the_excerpt(); ?>
	<?php } ?>
	</div>
			
		<?php endwhile; ?>
		<?php else : ?>
		
		<div class="post_nr">
        <h2><?php echo get_option('op_nothing_found'); ?></h2>
        <div class="single-entry">
		<?php echo get_option('op_nothing_found_text'); ?>
        <br/>
		<?php get_search_form(); ?>
        </div>
        <div class="clear"></div>
        </div>

	    <?php endif; ?>	 
		 <div class="clear"></div>
		 
        <?php if(function_exists('wp_pagenavi')) { ?>
		<div class="postnav"> 
		<?php wp_pagenavi(); ?>
        </div>
		
        <?php } else { ?>
        <?php custom_pagination(); ?>
        <?php } ?>
 
	<div class="clear"></div>


</div>
</div>
	
<?php get_sidebar('right'); ?>	
	
</div>
</div>


<div class="clear"></div>
	
<?php get_footer(); ?>

	
	