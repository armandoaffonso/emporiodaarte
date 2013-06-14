

<div id="feat_area_royal">

<?php 
    $featucat = get_option('op_feat_royal_cat');
	$slides = get_option('op_feat_royal_slides');
    $my_query = new WP_Query('showposts='. $slides .'&category_name='. $featucat .'');	 
    if ($my_query->have_posts()) :
?>	
	
<div id="video-gallery" class="royalSlider videoGallery rsDefault">

<?php while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID; ?>	
<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post-thumbnails', false, '' ); $thumbnailSrc = $src[0]; ?>
	
<?php 
    $youtube = get_post_meta($post->ID, 'r_youtube', true);
    $vimeo = get_post_meta($post->ID, 'r_vimeo', true);
?>
	
    <?php $image = aq_resize( $thumbnailSrc, 721, 440, true ); ?>

	<?php if($youtube) { ?>
	<a class="rsImg" data-rsVideo="http://www.youtube.com/watch?v=<?php echo $youtube; ?>" href="<?php echo $image; ?>" >    
    <?php } ?>
	
	<?php if($vimeo) { ?>
    <a class="rsImg" data-rsVideo="https://vimeo.com/<?php echo $vimeo; ?>" href="<?php echo $image; ?>" >
    <?php } ?>
	
	<div class="rsTmb">
      <h5><?php the_title(); ?></h5>
    </div>
  </a>
  
<?php endwhile; wp_reset_query(); ?> 
<?php endif; ?>
   
</div>





</div>
