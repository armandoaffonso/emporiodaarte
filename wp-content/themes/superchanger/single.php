
<?php get_header(); ?>

<div class="clear"></div>

<div id="main_content"> 
<div class="inner">	

<div id="content">	

<div id="content_bread_panel">	
<?php if (function_exists('wp_breadcrumbs')) wp_breadcrumbs(); ?>
<?php get_search_form(); ?>
</div>
<div class="clear"></div>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
    <div class="single_post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php 
        $rating_text = get_post_meta($post->ID, 'r_rating_text', true);
        if($rating_text) { ?>
		<div class="post_rating">
	    <span><?php echo get_option('op_rating_tirle'); ?></span>
		<?php echo $rating_text; ?>
		</div>
	<?php } ?>
	
    <div class="single_title">	  
	   <h1><?php the_title(); ?></h1> 
    </div>
	
	<div class="clear"></div>
	
	<?php if (get_option('op_single_meta_line') == 'on') { ?>	
	<div class="post_meta_line">
		<span class="post_time"><img src="<?php echo get_template_directory_uri(); ?>/images/post_time.png" /><?php the_time('j F, Y'); ?></span> 
		<span class="post_comments"><img src="<?php echo get_template_directory_uri(); ?>/images/post_comm.png" /><?php comments_popup_link('0', '1', '%'); ?></span> 
	</div> 
	<?php } ?>
	
    <div class="clear"></div>
	
    <?php if (get_option('op_single_thumbnail') == 'on') { ?>
	
	   <?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post-thumbnails', false, '' ); $thumbnailSrc = $src[0]; ?>	

	   <?php if(has_post_thumbnail()) { ?>

	    <?php $post_thumbnail = get_post_meta($post->ID, "r_post_thumbnail", $single = true);
	    if($post_thumbnail !== '') { ?>
	 
	    <div class="single_thumbnail" style="display: none;">
	 
	    <?php } else { ?>
		
	    <div class="single_thumbnail">
		
	    <?php } ?>
	
        <?php $image = aq_resize( $thumbnailSrc, 300, 200, true ); ?>
        <img src="<?php echo $image ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>

	    </div>
	   
	   <?php } ?>	
	   
	   <?php } else { } ?>
   
    <?php $post_video = get_post_meta($post->ID, "r_post_video", $single = true);
	   if($post_video !== '') { ?>
	 
	<div class="video-wrapper">
	<div class="video-container">
	
	<?php 
        $youtube = get_post_meta($post->ID, 'r_youtube', true);
        $vimeo = get_post_meta($post->ID, 'r_vimeo', true);
    ?>

		<?php if($youtube) { ?>
		    <object><embed wmode="transparent"  src="http://www.youtube.com/v/<?php echo $youtube; ?>?version=3" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true"></embed></object>
		<?php } ?>
		
        <?php if($vimeo) { ?>
		    <iframe src="http://player.vimeo.com/video/<?php echo $vimeo; ?>?title=0&byline=0&portrait=0" frameborder="0"></iframe>
		<?php } ?>

	</div>
    </div> 	
	<div class="clear"></div>

	<?php } else { } ?>
	
    <div class="single_text">
	    <?php the_content(''); ?>
    </div>
	
	<div class="clear"></div>
	
	<?php if (get_option('op_tags') == 'on') {?>
	    <p class="tags"> <?php the_tags('', ' ', '<br />'); ?> </p>
	    <?php } ?>
	
	<div class="clear"></div>

    <?php if (get_option('op_similar') == 'on') { ?>
	<div id="similar-post"> 

	    <?php
        $tags = wp_get_post_tags($post->ID);
        if ($tags) {
        $tag_ids = array();
        foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;

        $args=array(
        'tag__in' => $tag_ids,
        'post__not_in' => array($post->ID),
        'showposts'=>6,
        'caller_get_posts'=>1
        );
        $my_query = new wp_query($args);
        if( $my_query->have_posts() ) {
        echo '<div class="sim_post_header"><h3> '. $op_more_news .' </h3></div><ul>';
        while ($my_query->have_posts()) {
        $my_query->the_post();
        ?>
		
		<li class="similar_posts">
		
		    <?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post-thumbnails', false, '' ); $thumbnailSrc = $src[0]; ?>	 
            <?php if(has_post_thumbnail()) { ?>	
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" >
            <?php $image = aq_resize( $thumbnailSrc, 186, 180, true ); ?>
        <img src="<?php echo $image ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
            </a>
            <?php } else { } ?>	
		
			<h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" ><?php the_title(); ?> &raquo;</a></h1>
           
	   </li>
		
        <?php } echo '</ul>'; } } ?>
        <?php wp_reset_query();?>
		
		
    </div>	 
	<?php } ?>	 
	
	<div class="clear"></div>

	<?php posts_nav_link(' &#183; ', 'previous page', 'next page'); ?>
	
	<?php if (get_option('op_single_comments') == 'on') comments_template('', true); ?>
	
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
	
	<?php endif; ?>	 

</div>


</div>
	
<?php get_sidebar('right'); ?>	
	
</div>
</div>


<div class="clear"></div>
	
<?php get_footer(); ?>

	
	