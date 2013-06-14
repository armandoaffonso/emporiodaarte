<?php

define( 'BASE_URL', get_template_directory_uri() . '/' );

require_once(TEMPLATEPATH . '/options/options_theme.php'); 
require_once(TEMPLATEPATH . '/options/functions.php'); 	 
require_once(TEMPLATEPATH . '/includes/meta-box-single.php');
require_once(TEMPLATEPATH . '/options/seo.php'); 	
require_once(TEMPLATEPATH . '/includes/shortcodes.php');
require_once(TEMPLATEPATH . '/includes/tinymce/tinymce.php');
require_once(TEMPLATEPATH . '/includes/breadcrumbs.php');
require_once(TEMPLATEPATH . '/includes/contact_form.php');
require_once(TEMPLATEPATH . '/includes/aq_resizer.php');



/* ---------------Theme styles-------------- */


function register_styles(){ 

if( !is_admin() ) {
wp_register_style( 'my-style', BASE_URL . 'style.css', null, false );
wp_register_style( 'prettyPhoto', BASE_URL . 'css/prettyPhoto.css', null, false );
wp_register_style( 'shortcodes', BASE_URL . 'css/shortcodes.css', null, false );
wp_register_style( 'tipTip', BASE_URL . 'css/tipTip.css', null, false );
wp_register_style( 'carousel', BASE_URL . 'css/carousel.css', null, false );
wp_register_style( 'galleria', BASE_URL . 'css/galleria.classic.css', null, false );
wp_register_style( 'iview', BASE_URL . 'css/iview.css', null, false );
wp_register_style( 'responsive', BASE_URL . 'css/responsive.css', null, false );
wp_register_style( 'royalslider', BASE_URL . 'css/royalslider.css', null, false );
}

}
add_action('init', 'register_styles');


function enqueue_styles() {

if( !is_admin() ) {
wp_enqueue_style('my-style');
wp_enqueue_style('prettyPhoto');
wp_enqueue_style('shortcodes');
wp_enqueue_style('tipTip');
wp_enqueue_style('carousel');
wp_enqueue_style('galleria');
wp_enqueue_style('iview');
wp_enqueue_style('royalslider');
wp_enqueue_style('responsive');
}

}
add_action('wp_print_styles', 'enqueue_styles');




/* ---------------Theme scripts-------------- */


function theme_scripts(){ 

if( !is_admin() ) {
wp_enqueue_script('jquery');
wp_enqueue_script('browser_selector', BASE_URL . 'js/css_browser_selector.js');
wp_enqueue_script('easing', BASE_URL . 'js/jquery.easing.1.3.js');
wp_enqueue_script('pikachoose', BASE_URL . '/js/jquery.pikachoose.js');
wp_enqueue_script('royal', BASE_URL . '/js/royalslider.min.js');
wp_enqueue_script('flexslider', BASE_URL . 'js/jquery.flexslider-min.js');
wp_enqueue_script('cycle', BASE_URL . 'js/cycle.js');
wp_enqueue_script('easypaginate', BASE_URL . 'js/easypaginate.min.js');
wp_enqueue_script('color', BASE_URL . 'js/jquery.color.js');
wp_enqueue_script('form', BASE_URL . 'js/jquery.form.js');
wp_enqueue_script('tools', BASE_URL . 'js/jquery.tools.min.js');
wp_enqueue_script('prettyPhoto', BASE_URL . 'js/jquery.prettyPhoto.js');
wp_enqueue_script('hoverIntent', BASE_URL . 'js/jquery.hoverIntent.minified.js');
wp_enqueue_script('tipTip', BASE_URL . 'js/jquery.tipTip.js');
wp_enqueue_script('content_carousel', BASE_URL . 'js/jquery.content_carousel.js');
wp_enqueue_script('jcarousel', BASE_URL . 'js/jquery.jcarousel.js');
wp_enqueue_script('galleria', BASE_URL . 'js/galleria-1.2.8.js');
wp_enqueue_script('galleria_classic', BASE_URL . 'js/galleria.classic.js');
wp_enqueue_script('mediaqueries', BASE_URL . 'js/css3-mediaqueries.js');
wp_enqueue_script('modernizr', BASE_URL . 'js/modernizr.js');
wp_enqueue_script('ddsmoothmenu', BASE_URL . 'js/ddsmoothmenu.js');
wp_enqueue_script('iview', BASE_URL . 'js/iview.pack.js');
wp_enqueue_script('raphael', BASE_URL . 'js/raphael-min.js');
wp_enqueue_script('custom', BASE_URL . 'js/custom.js');
}

}
add_action('wp_enqueue_scripts', 'theme_scripts');

if ( is_singular() ) wp_enqueue_script( 'comment-reply' );	


 register_sidebar(array('name'=>'Top sidebar',
        'id' => 'top-sidebar',
		'description'   => 'Top sidebar is displayed only if turned off the Subscribe widget',
        'before_widget' => '<div class="right-widget">',
        'after_widget' => '</div>',
        'before_title' => '<div class="right-heading"><h3>',
        'after_title' => '</h3><span></span></div><div class="clear"></div>',
    ));	

register_sidebar(array('name'=>'Right sidebar',
        'id' => 'sidebar',
        'before_widget' => '<div class="right-widget">',
        'after_widget' => '</div>',
        'before_title' => '<div class="right-heading"><h3>',
        'after_title' => '</h3><span></span></div><div class="clear"></div>',
    ));	
		
register_sidebar(array('name'=>'Footer sidebar',
        'id' => 'footer-sidebar',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<div class="footer-heading"><h3>',
        'after_title' => '</h3><span></span></div><div class="clear"></div>',
    ));		
	
add_filter( 'show_admin_bar', '__return_false' );
add_filter('widget_text', 'shortcode_unautop');
add_filter('widget_text', 'do_shortcode');
remove_action( 'wp_head', 'wp_generator' );	
add_theme_support( 'automatic-feed-links' );
	
$args = array(
	'default-color' => 'eee'
);
add_theme_support( 'custom-background', $args );	
	
function read_more_funtion($post) {
if ( is_page() ) {
 } else {
  return ;
}}
add_filter('excerpt_more', 'read_more_funtion');	
	
function custom_wp_trim_excerpt($text) {
$raw_excerpt = $text;
if ( '' == $text ) {

    $text = get_the_content('');

    $text = strip_shortcodes( $text );
 
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
 
    $allowed_tags = '<p>,<a>,<em>,<strong>'; 
    $text = strip_tags($text, $allowed_tags);

     $excerpt_word_count = 23; 

    $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count); 
 
    $excerpt_end = 'Read more'; 
    $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end);
 
    $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
    if ( count($words) > $excerpt_length ) {
        array_pop($words);
        $text = implode(' ', $words);
        $text = $text . $excerpt_more;
    } else {
        $text = implode(' ', $words);
    }
}
return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'custom_wp_trim_excerpt');


add_theme_support(
	'post-formats', array(	
		'image',
		'video',
		'audio',
		'chat'
	)
);

function rename_post_formats($translation, $text, $context, $domain) {
    $names = array(
        'Chat'  => 'Game',
    );
    if ($context == 'Post format') {
        $translation = str_replace(array_keys($names), array_values($names), $text);
    }
    return $translation;
}
add_filter('gettext_with_context', 'rename_post_formats', 10, 4);



if (function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails');
}


if ( function_exists( 'wp_nav_menu' ) ){
	if (function_exists('add_theme_support')) {
		add_theme_support('nav-menus');
		add_action( 'init', 'register_my_menus' );
		function register_my_menus() {
			register_nav_menus(
				array(
					'main-menu' => __( 'Main menu' ),
					'secondary-menu' => __( 'Secondary menu' ),
					'footer-menu' => __( 'Footer menu' )
				));
}}}

function primarymenu(){ ?>

<div id="mainMenu" class="ddsmoothmenu">
<ul>
<?php wp_list_pages('title_li='); ?>
</ul>
</div>

<?php }	

function secondarymenu(){ ?>

<div id="secondaryMenu">
<ul>
<?php wp_list_categories('hide_empty=1&exclude=1&title_li='); ?>
</ul>
</div>

<?php }	

function footermenu(){ ?>

<div id="footerMenu">
<ul>
<?php wp_list_categories('hide_empty=1&exclude=1&title_li='); ?>
</ul>
</div>

<?php }	


function pd_title($amount,$echo=true) {
	$pd = get_the_title(); 
	if ( strlen($pd) <= $amount ) $echo_out = ' &raquo;'; else $echo_out = ' &raquo;';
	$pd = mb_substr( $pd, 0, $amount, 'UTF-8' );
	if ($echo) {
		echo $pd;
		echo $echo_out;
	}
	else { return ($pdtitle . $echo_out); }
}

function custom_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}



add_action('template_redirect', 'register_a_user');
function register_a_user(){

  if(isset($_GET['do']) && $_GET['do'] == 'register'):
    $errors = array();
    if(empty($_POST['user']) || empty($_POST['email'])) $errors[] = 'Please enter a user name and e-mail.';

    $user_login = esc_attr($_POST['user']);
    $user_email = esc_attr($_POST['email']);

    $sanitized_user_login = sanitize_user($user_login);
    $user_email = apply_filters('user_registration_email', $user_email);

    if(!is_email($user_email)) $errors[] = 'Invalid e-mail.';
    elseif(email_exists($user_email)) $errors[] = 'This email is already registered.';

    if(empty($sanitized_user_login) || !validate_username($user_login)) $errors[] = 'Invalid user name.';
    elseif(username_exists($sanitized_user_login)) $errors[] = 'User name already exists.';

    if(empty($errors)):
      $user_pass = wp_generate_password();
      $user_id = wp_create_user($sanitized_user_login, $user_pass, $user_email);

      if(!$user_id):
        $errors[] = 'Registration failed';
      else:
        update_user_option($user_id, 'default_password_nag', true, true);
        wp_new_user_notification($user_id, $user_pass);
      endif;
    endif;

    if(!empty($errors)) define('REGISTRATION_ERROR', serialize($errors));
    else define('REGISTERED_A_USER', $user_email);
  endif;
}


function get_category_id($cat_name){
	$term = get_term_by('slug', $cat_name, 'category');
	return $term->term_id;
}


function pa_category_top_parent_id ($catid) {
 while ($catid) {
  $cat = get_category($catid);
  $catid = $cat->category_parent;
  $catParent = $cat->cat_ID;
 }
return $catParent;
}


function get_cat_slug($cat_id) {
	$cat_id = (int) $cat_id;
	$category = &get_category($cat_id);
	return $category->slug;
}


function category_id_class($classes) {
	global $post;
	foreach((get_the_category($post->ID)) as $category)
		$classes[] = $category->category_nicename;
	return $classes;
}
add_filter('post_class', 'category_id_class');
add_filter('body_class', 'category_id_class');



function dropdown_tag_cloud( $args = '' ) {
	$defaults = array(
		'smallest' => 8, 'largest' => 22, 'unit' => 'pt', 'number' => 45,
		'format' => 'flat', 'orderby' => 'name', 'order' => 'ASC',
		'exclude' => '', 'include' => ''
	);
	$args = wp_parse_args( $args, $defaults );

	$tags = get_tags( array_merge($args, array('orderby' => 'count', 'order' => 'DESC')) ); // Always query top tags

	if ( empty($tags) )
		return;

	$return = dropdown_generate_tag_cloud( $tags, $args ); // Here's where those top tags get sorted according to $args
	if ( is_wp_error( $return ) )
		return false;
	else
		echo apply_filters( 'dropdown_tag_cloud', $return, $args );
}

function dropdown_generate_tag_cloud( $tags, $args = '' ) {
	global $wp_rewrite;
	$defaults = array(
		'smallest' => 8, 'largest' => 22, 'unit' => 'pt', 'number' => 45,
		'format' => 'flat', 'orderby' => 'name', 'order' => 'ASC'
	);
	$args = wp_parse_args( $args, $defaults );
	extract($args);

	if ( !$tags )
		return;
	$counts = $tag_links = array();
	foreach ( (array) $tags as $tag ) {
		$counts[$tag->name] = $tag->count;
		$tag_links[$tag->name] = get_tag_link( $tag->term_id );
		if ( is_wp_error( $tag_links[$tag->name] ) )
			return $tag_links[$tag->name];
		$tag_ids[$tag->name] = $tag->term_id;
	}

	$min_count = min($counts);
	$spread = max($counts) - $min_count;
	if ( $spread <= 0 )
		$spread = 1;
	$font_spread = $largest - $smallest;
	if ( $font_spread <= 0 )
		$font_spread = 1;
	$font_step = $font_spread / $spread;

	// SQL cannot save you; this is a second (potentially different) sort on a subset of data.
	if ( 'name' == $orderby )
		uksort($counts, 'strnatcasecmp');
	else
		asort($counts);

	if ( 'DESC' == $order )
		$counts = array_reverse( $counts, true );

	$a = array();

	$rel = ( is_object($wp_rewrite) && $wp_rewrite->using_permalinks() ) ? ' rel="tag"' : '';

	foreach ( $counts as $tag => $count ) {
		$tag_id = $tag_ids[$tag];
		$tag_link = clean_url($tag_links[$tag]);
		$tag = str_replace(' ', '&nbsp;', wp_specialchars( $tag ));
		$a[] = "\t<option value='$tag_link'>$tag ($count)</option>";
	}

	switch ( $format ) :
	case 'array' :
		$return =& $a;
		break;
	case 'list' :
		$return = "<ul class='wp-tag-cloud'>\n\t<li>";
		$return .= join("</li>\n\t<li>", $a);
		$return .= "</li>\n</ul>\n";
		break;
	default :
		$return = join("\n", $a);
		break;
	endswitch;

	return apply_filters( 'dropdown_generate_tag_cloud', $return, $tags, $args );
}


class AutoComplete {

    static $action = 'my_autocomplete';//Name of the action - should be unique to your plugin.

    static function load() {
        add_action( 'init', array( __CLASS__, 'init'));
    }

    static function init() {
        //Register style - you can create your own jQuery UI theme and store it in the plug-in folder
        wp_register_style('my-jquery-ui','http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css');    
        add_action( 'get_search_form', array( __CLASS__, 'get_search_form' ) );
        add_action( 'wp_print_footer_scripts', array( __CLASS__, 'print_footer_scripts' ), 11 );
        add_action( 'wp_ajax_'.self::$action, array( __CLASS__, 'autocomplete_suggestions' ) );
        add_action( 'wp_ajax_nopriv_'.self::$action, array( __CLASS__, 'autocomplete_suggestions' ) );
    }

    static function get_search_form( $form ) {
        wp_enqueue_script( 'jquery-ui-autocomplete' );
        wp_enqueue_style('my-jquery-ui');
        return $form;
    }

    static function print_footer_scripts() {
        ?>
    <script type="text/javascript">
    jQuery(document).ready(function ($){
        var ajaxurl = '<?php echo admin_url( 'admin-ajax.php' ); ?>';
        var ajaxaction = '<?php echo self::$action ?>';
        $("#secondary #searchform #s").autocomplete({
            delay: 0,
            minLength: 0,
            source: function(req, response){  
                $.getJSON(ajaxurl+'?callback=?&action='+ajaxaction, req, response);  
            },
            select: function(event, ui) {
                window.location.href=ui.item.link;
            },
        });
    });
    </script><?php
    }

    static function autocomplete_suggestions() {
        $posts = get_posts( array(
            's' => trim( esc_attr( strip_tags( $_REQUEST['term'] ) ) ),
        ) );
        $suggestions=array();

        global $post;
        foreach ($posts as $post): 
                    setup_postdata($post);
            $suggestion = array();
            $suggestion['label'] = esc_html($post->post_title);
            $suggestion['link'] = get_permalink();

            $suggestions[]= $suggestion;
        endforeach;

        $response = $_GET["callback"] . "(" . json_encode($suggestions) . ")";  
        echo $response;  
        exit;
    }
}
AutoComplete::load();


function SearchFilter($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}
add_filter('pre_get_posts','SearchFilter');


function show_post($path) {
  $post = get_page_by_path($path);
  $content = apply_filters('the_content', $post->post_content);
  echo $content;
}

if ( ! isset( $content_width ) ) $content_width = 900;



add_action ( 'edit_category_form_fields', 'extra_category_fields');
function extra_category_fields( $tag ) {  
    $t_id = $tag->term_id;
    $cat_meta = get_option( "category_$t_id");
?>

<tr class="form-field">
<th scope="row" valign="top"><label for="extra1"><?php _e('Category color code'); ?></label></th>
<td>
<input type="text" name="Cat_meta[extra1]" id="Cat_meta[extra1]" size="25" style="width:60%;" value="<?php echo $cat_meta['extra1'] ? $cat_meta['extra1'] : ''; ?>"><br />
            <span class="description"><?php _e('Enter a color code for menu (ex: ffcc00) Only for Top menu! not for sub-categories!'); ?></span>
        </td>
</tr>

<tr class="form-field">
<th scope="row" valign="top"><label for="extra2"><?php _e('Featured carousel title'); ?></label></th>
<td>
<input type="text" name="Cat_meta[extra2]" id="Cat_meta[extra2]" size="25" style="width:60%;" value="<?php echo $cat_meta['extra2'] ? $cat_meta['extra2'] : ''; ?>"><br />
            <span class="description"><?php _e('Write title for this category for Featured carousel (Not for Home page!) Only for Top category! not for sub-categories!'); ?></span>
        </td>
</tr>

<tr class="form-field">
<th scope="row" valign="top"><label for="extra2"><?php _e('Index page post layout'); ?></label></th>
<td>
<select name="Cat_meta[extra3]" id="Cat_meta[extra3]" style="width:30%;" value="<?php echo $cat_meta['extra3'] ? $cat_meta['extra3'] : ''; ?>">
	<option value="">Chose layout:</option>
	<option value="">Two column (default)</option>
	<option value="_one_column_simple">One column simple</option>
	<option value="_two_column_simple">Two column simple</option>
</select>
    <span class="description"><?php _e('Select layout for index posts (category, archives, tag, search etc. pages)'); ?></span>
</td>
</tr>

<?php
}

// save extra category extra fields hook
add_action ( 'edited_category', 'save_extra_category_fileds');
   // save extra category extra fields callback function
function save_extra_category_fileds( $term_id ) {
    if ( isset( $_POST['Cat_meta'] ) ) {
        $t_id = $term_id;
        $cat_meta = get_option( "category_$t_id");
        $cat_keys = array_keys($_POST['Cat_meta']);
            foreach ($cat_keys as $key){
            if (isset($_POST['Cat_meta'][$key])){
                $cat_meta[$key] = $_POST['Cat_meta'][$key];
            }
        }
        //save the option array
        update_option( "category_$t_id", $cat_meta );
    }
}

include(TEMPLATEPATH . '/includes/widgets/banners.php');
include(TEMPLATEPATH . '/includes/widgets/recent_posts.php');
include(TEMPLATEPATH . '/includes/widgets/recent_category_posts.php');
include(TEMPLATEPATH . '/includes/widgets/recent_category_posts_second.php');
include(TEMPLATEPATH . '/includes/widgets/popular_posts.php');
include(TEMPLATEPATH . '/includes/widgets/contact.php');
include(TEMPLATEPATH . '/includes/widgets/flickr.php');
include(TEMPLATEPATH . '/includes/widgets/twitter.php');
include(TEMPLATEPATH . '/includes/widgets/video.php');
include(TEMPLATEPATH . '/includes/widgets/featured_slider.php');
?>
