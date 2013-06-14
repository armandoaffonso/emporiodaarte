<?php if ( is_category() ) { ?>
<div class="inner">	
<div id="sub_menu_box">

    <?php
    if (is_category()) {
    $this_category = get_category($cat);
    }

    if($this_category->category_parent)
    $this_category = wp_list_categories('orderby=id&show_count=0&title_li=&child_of='.$this_category->category_parent."&echo=0"); else
    $this_category = wp_list_categories('orderby=id&depth=1&show_count=0&title_li=&child_of='.$this_category->cat_ID."&echo=0");
    if ($this_category) { ?> 
    <ul>
    <?php echo $this_category; ?>
    </ul>
    <?php } ?>

</div>
</div>
<?php } ?>


<?php if ( is_single() ) { ?>
<div class="inner">	
<div id="sub_menu_box">

<?php
$category = get_the_category();
$cat_term_id = $category[0]->term_id;
$cat_category_parent = $category[0]->category_parent;
$listcat = wp_list_categories('echo=0&child_of='.$cat_category_parent.'&title_li=');
$listcat = str_replace("cat-item-".$cat_term_id, "cat-item-".$cat_term_id." current-cat", $listcat);

if ( in_category( $cat_term_id ) || post_is_in_descendant_category( $cat_term_id )) {
echo $listcat;
}
?>
</div>
</div>
<?php } ?>
