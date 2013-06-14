
<div id="home_carousel">
<div class="inner">

<div class="jcarousel_container">

<div class="jcarousel_container_title">
<h1>
<?php 
if ( is_page_template('home.php') || is_page_template('home_royal.php') ) {
   echo get_option('op_breaking_news');
} else { 
   if (isset($cat_data['extra2'])){
   echo $cat_data['extra2'];  
   }
}
?>
</h1><span></span>
</div>

<ul class="jcarousel-skin-tango">
<?php 
    if ( is_page_template('home.php') || is_page_template('home_royal.php') ) { 
    $featucat = get_option('op_feat_carousel_cat');
    } if ( is_category() ) { 
    $featucat = get_cat_slug($cat_style); 
    } if ( is_single() ) { 
    $featucat = get_cat_slug($cat_style_single); 
    }
	
	$slides = get_option('op_feat_carousel_posts');
    $my_query = new WP_Query('showposts='. $slides .'&category_name='. $featucat .'&orderby=rand');	 
    if ($my_query->have_posts()) :
?>	
		
<?php while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID; ?>	
<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post-thumbnails', false, '' ); $thumbnailSrc = $src[0]; ?>
			
		<li>
		<div class="carousel_post">

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
		
        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
		<?php $image = aq_resize( $thumbnailSrc, 217, 190, true ); ?>
        <img src="<?php echo $image ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
		</a>
		
		<div class="post_format_box" style="background-color: #<?php echo $color ?>;">
		
		<?php $format = get_post_format(); if ( false === $format ) { ?>
		<a href="<?php the_permalink() ?>" class="post_format" title="<?php echo get_option('op_read_post'); ?> <?php the_title(); ?>"></a>
        <?php } ?>
		
		<?php if(has_post_format('image')) { ?>
		<a href="<?php the_permalink() ?>" class="image_format" title="<?php echo get_option('op_view_image_post'); ?> <?php the_title(); ?>"></a>
		<?php } ?>
		
		<?php if(has_post_format('video')) { ?>

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

		<?php } ?>
		
		<?php if(has_post_format('audio')) { ?>
		<a href="<?php the_permalink() ?>" class="audio_format" title="<?php echo get_option('op_view_audio_post'); ?> <?php the_title(); ?>"></a>
		<?php } ?>
		
		<?php if(has_post_format('chat')) { ?>
		<a href="<?php the_permalink() ?>" class="game_format" title="<?php echo get_option('op_view_game_post'); ?> <?php the_title(); ?>"></a>
		<?php } ?>
		
        </div>
		
        <?php } else {} ?>
		
		
		<h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" ><?php pd_title(29); ?></a></h1>

		</div>
	    </li>
	   
	<?php endwhile; wp_reset_query(); ?> 
    <?php endif; ?>   
	
</ul>
</div>

</div>
</div>
