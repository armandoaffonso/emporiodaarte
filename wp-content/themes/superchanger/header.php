<?php
global $options;
foreach ($options as $value) {
	if ( !isset( $value['id'] ) )
		continue;
	if (get_option( $value['id'] ) === FALSE) {
		$$value['id'] = $value['std'];
	} else {
		$$value['id'] = get_option( $value['id'] );
}}?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
<title><?php custom_titles(); ?></title>
<?php custom_description(); ?>
<?php custom_keywords(); ?>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link href="http://fonts.googleapis.com/css?family=Cuprum" rel="stylesheet" type="text/css" media="all"/>
<link href="http://fonts.googleapis.com/css?family=<?php echo $op_header_font ?>" rel="stylesheet" type="text/css" media="all"/>
<link href="http://fonts.googleapis.com/css?family=<?php echo $op_text_font ?>" rel="stylesheet" type="text/css" media="all"/>
<?php include (TEMPLATEPATH . "/includes/category_styles.php"); ?>

<!--[if lte IE 7]>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie7style.css" media="all" />
<![endif]-->
 <!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie8style.css" media="all" />
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
<![endif]-->
 <!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie9style.css" media="all" />
<![endif]-->

<?php wp_head(); ?>
</head>

<script type="text/javascript">

(function($){ 
$(window).load(function(){ 

$("#contact input[type='submit'], #sidebar-right #submittedWidget, .filter a, .pagination a, #submit, .comment-reply-link, #submittedContact").hover(function() {
   $(this).animate({ backgroundColor: "#<?php echo get_option('op_hover_effect') ?>" }, 200);
},function() {
   $(this).animate({ backgroundColor: "#fff" }, 200);
});

Galleria.loadTheme('<?php echo get_template_directory_uri() ?>/js/galleria.classic.js');
Galleria.run('#galleria');

})
})(jQuery);
</script>

<?php $class='';
if ( is_single() || is_category() ) { 
    $category = get_the_category();
    $parent = $category[0]->category_parent;
    $class = get_cat_name($parent); 
}?>

<body <?php body_class($class); ?>>

<div id="all_content">

<?php if (get_option('op_fixed') == 'on') { ?>
<div id="all_content_fixed">
<?php } ?>

<div id="menu_box_top">
<div class="inner">	
<?php if ( function_exists( 'wp_nav_menu' ) ){
        wp_nav_menu( array('theme_location' => 'secondary-menu', 'container_id' => 'secondaryMenu', 'fallback_cb'=>'secondarymenu' )); 
        } else { secondarymenu();
	} ?>
	
	
<?php if (get_option('op_regform') == 'on') include (TEMPLATEPATH . "/includes/reg_form.php"); ?>	
</div>	
</div>

<div class="clear"></div>	
	
<div id="header">

<div class="inner">	
	<div id="title_box">
	<?php if (get_option('op_logo_on') == 'on') { ?>
	
	    <a href="<?php echo home_url() ?>">
		    <?php $logo = (get_option('op_logo') <> '') ? get_option('op_logo') : get_template_directory_uri() . '/images/logo.png'; ?>
		    <img src="<?php echo $logo; ?>" alt="Logo" id="logo"/>
	    </a>
	  
	 <?php } else { ?>
	 
		<a class="site_title" href="<?php echo home_url() ?>/" title="<?php bloginfo('name'); ?>" rel="Home"><h1><?php bloginfo('name'); ?></h1></a>
		
	<?php } ?>	
    </div>

    <?php if (get_option('op_banner_header') == 'on') { ?>
	
	    
	    <?php if (get_option('op_banner_rotator') == 'on') { 
		if (get_option('op_banner_size') == '468x60px') { 
		include (TEMPLATEPATH . "/includes/banner_rotator.php"); 
		} else { 
		include (TEMPLATEPATH . "/includes/banner_rotator_728.php"); 
		}
		
		} else { ?>	
		
		<?php if (get_option('op_banner_size') == '468x60px') { ?>
		<div id="banner-header">
		<?php } else { ?>
		<div id="banner_header_728">
		<?php } ?>	
		
		<?php $header_banner = get_option("op_banner_header_code"); ?>
		<?php echo stripslashes($header_banner); ?>
		</div>
		
		<?php } ?>	
		
	<?php } ?>	
<div class="clear"></div>	
</div>	
</div>

<div class="clear"></div>

<div id="menu_box">
 <?php if ( function_exists( 'wp_nav_menu' ) ){
		wp_nav_menu( array( 'theme_location' => 'main-menu', 'container_id' => 'mainMenu', 'container_class' => 'ddsmoothmenu', 'fallback_cb'=>'primarymenu') );
		} else { primarymenu();
} ?>
</div>

<?php include (TEMPLATEPATH . "/includes/sub_menu.php"); ?>

<div class="clear"></div>


<?php 
if ( is_page_template('home.php') || is_page_template('home_royal.php')) {
if (get_option('op_feat_carousel') == 'on') include (TEMPLATEPATH . "/includes/feat_carousel.php"); 
} 

if ( is_single()) {
if (get_option('op_feat_carousel_single') == 'on') include (TEMPLATEPATH . "/includes/feat_carousel.php"); 
} 

if (is_category()) {  
if (get_option('op_feat_carousel_pages') == 'on') include (TEMPLATEPATH . "/includes/feat_carousel.php"); 
}
?>


