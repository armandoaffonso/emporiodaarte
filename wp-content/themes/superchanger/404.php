<?php
/*
Template Name: Error 404
*/
?>

<?php get_header(); ?>

<div id="main_content"> 
<div class="inner">		
	
<div id="content">
<div id="content_bread_panel">	
<?php if (function_exists('wp_breadcrumbs')) wp_breadcrumbs(); ?>
<?php get_search_form(); ?>
</div>
<div class="clear"></div>

<div class="error404_content">

<h1 class="error404"><?php echo get_option('op_page_not_found'); ?></h1>

<h1><?php echo get_option('op_try_searching'); ?></h1>
<?php get_search_form(); ?>

<h1><?php echo get_option('op_look_archives'); ?></h1>

 <br />
 
    <div id="archive">
	
	<div id="archive_left_col">
	
	<div class="archive_title"><h3><?php echo get_option('op_30_recent_posts'); ?></h3><span></span></div> 
    <ul><?php $archive_query = new WP_Query('showposts=30');  
            while ($archive_query->have_posts()) : $archive_query->the_post(); ?>  
                <li>  
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>  
                </li>  
            <?php endwhile; ?>  
    </ul>
	

	<div class="archive_title_bot"><h3><?php echo get_option('op_categories_sitemap'); ?></h3><span></span></div> 
    <ul><?php wp_list_categories('title_li=&sort_column=name&optioncount=1&hierarchical=0&feed=RSS'); ?></ul>  
    
	</div>
	
	<div id="archive_right_col">
	
	<div class="archive_title"><h3><?php echo get_option('op_pages_sitemap'); ?></h3><span></span></div> 
    <ul><?php wp_list_pages("title_li=" ); ?></ul> 
  
	<div class="archive_title_bot"><h3><?php echo get_option('op_archives_sitemap'); ?></h3><span></span></div> 
    <ul>  
        <?php wp_get_archives('type=monthly&show_post_count=true'); ?>  
    </ul> 
	
    </div>
	
    </div>
	
	<div class="clear"></div>

</div>		 
</div>

<?php get_sidebar('right'); ?>

</div>
</div>

<div class="clear"></div>
	
<?php get_footer(); ?>

