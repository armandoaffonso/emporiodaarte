

<div id="sidebar-top">

<?php if (get_option('op_search_widget') == 'on') { ?>
<div class="right-widget">
<div class="right-heading"><h3><?php echo get_option('op_search_panel'); ?></h3><span></span></div>

<?php get_search_form(); ?>

<form id="dropdown_cats" action="<?php echo home_url() ?>/" method="get">
<?php $select_category = get_option('op_select_category'); ?>
<?php wp_dropdown_categories('show_option_none='. $select_category.''); ?>

<script type="text/javascript"><!--
    var dropdown = document.getElementById("cat");
    function onCatChange() {
		if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
			location.href = "<?php echo get_option('home');
?>/?cat="+dropdown.options[dropdown.selectedIndex].value;
		}
    }
    dropdown.onchange = onCatChange;
--></script>
</li>
</form>


<select id="dropdown_tags" name="tag-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
	<option value="#"><?php echo get_option('op_select_tags'); ?></option>
	<?php dropdown_tag_cloud('number=0&order=asc'); ?>
</select>

<div class="clear"></div>
</div>
<?php } ?>
	
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('top-sidebar') ) : ?>
<?php endif; ?> 	
	
</div>
