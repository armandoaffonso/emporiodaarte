
<div class="shortcode_posts_box">
		<?php while ( have_posts() ) : $wp_query->the_post(); ?>
		<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post-thumbnails', false, '' ); $thumbnailSrc = $src[0]; ?>	
		<div class="post_mini_one_column">
        
		<?php 
            $rating_text = get_post_meta($post->ID, 'r_rating_text', true);
            if($rating_text) { ?>
		    <div class="post_rating" style="background-color: #<?php echo $color ?>;">
			<span><?php echo get_option('op_rating_tirle'); ?></span>
		    <?php echo $rating_text; ?>
		    </div>
		<?php } ?>
		
		<?php if(has_post_thumbnail()) { ?>
		
        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
		<?php $image = aq_resize( $thumbnailSrc, 180, 120, true ); ?>
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
   
        <?php } else { } ?>
   
		<h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" ><?php the_title(); ?></a></h1>
	  
	    <div class="post_three_column_date" style="<?php if($loopMeta == 0){ echo "display:none"; }?>">
		    <span class="post_time"><img src="<?php echo get_template_directory_uri(); ?>/images/post_time.png" /><?php the_time('j F, Y'); ?></span> 
		    <span class="post_comments"><img src="<?php echo get_template_directory_uri(); ?>/images/post_comm.png" /><?php comments_popup_link('0', '1', '%'); ?></span> 
		</div>  
	  
	    <div style="<?php if($loopExcerpt == 0){ echo "display:none"; }?>">
		<?php the_excerpt(); ?>
		</div>

       </div>
		<?php endwhile; ?>
</div>
<div class="clear"></div>
