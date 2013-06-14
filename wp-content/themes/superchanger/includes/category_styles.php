<style type="text/css">

<?php if ( is_category() ) { ?>
<?php
$cat_id = get_query_var('cat');
$cat_style = pa_category_top_parent_id ($cat_id);
$cat_data = get_option("category_$cat_style");
if (isset($cat_data['extra1'])){}
?>

.<?php echo get_cat_slug($cat_style); ?> #menu_box, .category-<?php echo get_cat_slug($cat_style); ?> #menu_box{
border-color: #<?php echo $cat_data['extra1']; ?>!important;
} 

.<?php echo get_cat_slug($cat_style); ?> #mainMenu ul li.current-category-parent > a,
.<?php echo get_cat_slug($cat_style); ?> #mainMenu ul li.current-post-ancestor > a,
.<?php echo get_cat_slug($cat_style); ?> #mainMenu ul li.current-menu-item > a,
.category-<?php echo get_cat_slug($cat_style); ?> #mainMenu ul li.current-category-parent > a,
.category-<?php echo get_cat_slug($cat_style); ?> #mainMenu ul li.current-post-ancestor > a,
.category-<?php echo get_cat_slug($cat_style); ?> #mainMenu ul li.current-menu-item > a {
background: #<?php echo $cat_data['extra1']; ?>!important;
}

.<?php echo get_cat_slug($cat_style); ?> #sub_menu_box .current-cat a,
.category-<?php echo get_cat_slug($cat_style); ?> #sub_menu_box .current-cat a{
color: #<?php echo $cat_data['extra1']; ?>!important;
}



.<?php echo get_cat_slug($cat_style); ?> .jcarousel_container_title,
.category-<?php echo get_cat_slug($cat_style); ?> .jcarousel_container_title{
background-color: #<?php echo $cat_data['extra1']; ?>!important;
}

.<?php echo get_cat_slug($cat_style); ?> .jcarousel_container_title h1,
.category-<?php echo get_cat_slug($cat_style); ?> .jcarousel_container_title h1{
background-color: #<?php echo $cat_data['extra1']; ?>!important;
}

.<?php echo get_cat_slug($cat_style); ?> .jcarousel-skin-tango .carousel_post h1 a,
.category-<?php echo get_cat_slug($cat_style); ?> .jcarousel-skin-tango .carousel_post h1 a{
background-color: #<?php echo $cat_data['extra1']; ?>!important;
}

.<?php echo get_cat_slug($cat_style); ?> #home_carousel .carousel_post .post_format_box,
.category-<?php echo get_cat_slug($cat_style); ?> #home_carousel .carousel_post .post_format_box{
background-color: #<?php echo $cat_data['extra1']; ?>!important;
}

.<?php echo get_cat_slug($cat_style); ?> #home_carousel .carousel_post .post_rating,
.category-<?php echo get_cat_slug($cat_style); ?> #home_carousel .carousel_post .post_rating{
background-color: #<?php echo $cat_data['extra1']; ?>!important;
}

.<?php echo get_cat_slug($cat_style); ?> #searchsubmit,
.category-<?php echo get_cat_slug($cat_style); ?> #searchsubmit{
background-color: #<?php echo $cat_data['extra1']; ?>!important;
}

.<?php echo get_cat_slug($cat_style); ?> .post h1,
.category-<?php echo get_cat_slug($cat_style); ?> .post h1{
background-color: #<?php echo $cat_data['extra1']; ?>!important;
}

.<?php echo get_cat_slug($cat_style); ?> .post .post_format_box,
.category-<?php echo get_cat_slug($cat_style); ?> .post .post_format_box,
.<?php echo get_cat_slug($cat_style); ?> .post_two_column_simple .post_format_box,
.category-<?php echo get_cat_slug($cat_style); ?> .post_two_column_simple .post_format_box,
.<?php echo get_cat_slug($cat_style); ?> .post_one_column_simple .post_format_box,
.category-<?php echo get_cat_slug($cat_style); ?> .post_one_column_simple .post_format_box{
background-color: #<?php echo $cat_data['extra1']; ?>!important;
}

.<?php echo get_cat_slug($cat_style); ?> .post .post_rating,
.category-<?php echo get_cat_slug($cat_style); ?> .post .post_rating{
background-color: #<?php echo $cat_data['extra1']; ?>!important;
}

<?php } ?>

<?php if ( is_single() ) { ?>

<?php 
$topcat = get_the_category();
$topcat_single = $topcat[0]->category_parent;
$cat_style_single = pa_category_top_parent_id ($topcat_single);
$cat_data = get_option("category_$cat_style_single");
if (isset($cat_data['extra1'])){}
?>

.<?php echo get_cat_slug($cat_style_single); ?> #menu_box {
border-color: #<?php echo $cat_data['extra1']; ?>!important;
} 

.<?php echo get_cat_slug($cat_style_single); ?> #mainMenu ul li.current-category-parent > a,
.<?php echo get_cat_slug($cat_style_single); ?> #mainMenu ul li.current-post-ancestor > a,
.<?php echo get_cat_slug($cat_style_single); ?> #mainMenu ul li.current-menu-item > a{
background: #<?php echo $cat_data['extra1']; ?>!important;
}

.<?php echo get_cat_slug($cat_style_single); ?> #sub_menu_box .current-cat a{
color: #<?php echo $cat_data['extra1']; ?>!important;
}


.<?php echo get_cat_slug($cat_style_single); ?> .jcarousel_container_title{
background-color: #<?php echo $cat_data['extra1']; ?>!important;
}

.<?php echo get_cat_slug($cat_style_single); ?> .jcarousel_container_title h1{
background-color: #<?php echo $cat_data['extra1']; ?>!important;
}

.<?php echo get_cat_slug($cat_style_single); ?> .jcarousel-skin-tango .carousel_post h1 a{
background-color: #<?php echo $cat_data['extra1']; ?>!important;
}

.<?php echo get_cat_slug($cat_style_single); ?> #home_carousel .carousel_post .post_format_box {
background-color: #<?php echo $cat_data['extra1']; ?>!important;
}

.<?php echo get_cat_slug($cat_style_single); ?> #home_carousel .carousel_post .post_rating {
background-color: #<?php echo $cat_data['extra1']; ?>!important;
}

.<?php echo get_cat_slug($cat_style_single); ?> #searchsubmit{
background-color: #<?php echo $cat_data['extra1']; ?>!important;
}

.<?php echo get_cat_slug($cat_style_single); ?> .single_post .post_rating{
background-color: #<?php echo $cat_data['extra1']; ?>!important;
}

.<?php echo get_cat_slug($cat_style_single); ?> #similar-post h3{
border-bottom-color: #<?php echo $cat_data['extra1']; ?>!important;
}

.<?php echo get_cat_slug($cat_style_single); ?> #similar-post .similar_posts h1{
background-color: #<?php echo $cat_data['extra1']; ?>!important;
}

<?php } ?>
</style>