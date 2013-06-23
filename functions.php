<?php
/*
* yoTheme, a html5 wordpress theme.
*
* @licence Apache License
* @author Ethan - http://youed.me - i@youed.me
* 
* Project URL http://code.google.com/p/yotheme/
*/

/* Regist WP menu */
register_nav_menu( 'nav-menu', 'Menu');

/* Disable admin bar */
show_admin_bar(false);

/* Include control.php */
require_once(TEMPLATEPATH . '/control.php');

/**
* register_sidebar()
*
*@desc Registers the markup to display in and around a widget
*/
if ( function_exists('register_sidebar') )
{
  register_sidebar(array(
    'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h3><span class="side-span-open">&gt;</span>',
    'after_title' => '</h3>',
  ));
}
/* Language support */
function theme_init(){
	load_theme_textdomain('yotheme', get_template_directory() . '/languages');
}
add_action ('init', 'theme_init');

/* Pagenavi */
function par_pagenavi($range = 9){
	global $paged, $wp_query;
	if ( !$max_page ) {$max_page = $wp_query->max_num_pages;}
	if($max_page > 1){if(!$paged){$paged = 1;}
	if($paged != 1){echo "<a href='" . get_pagenum_link(1) . "' class='extend' title='".'第一页'."'>".'«'."</a>";}
	previous_posts_link('‹');
    if($max_page > $range){
		if($paged < $range){for($i = 1; $i <= ($range + 1); $i++){echo "<a href='" . get_pagenum_link($i) ."'";
		if($i==$paged)echo " class='current'";echo ">$i</a>";}}
    elseif($paged >= ($max_page - ceil(($range/2)))){
		for($i = $max_page - $range; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
		if($i==$paged)echo " class='current'";echo ">$i</a>";}}
	elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
		for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){echo "<a href='" . get_pagenum_link($i) ."'";if($i==$paged) echo "";echo ">$i</a>";}}}
    else{for($i = 1; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
    if($i==$paged)echo " class='current'";echo ">$i</a>";}}
	next_posts_link('›');
    if($paged != $max_page){echo "<a href='" . get_pagenum_link($max_page) . "' class='extend' title='".'最后一页'."'>".'»'."</a>";}}
}

/* Setting and slogan */
function slogan() {
	if (get_option('yotheme_slogan')) {
	$arr = split("\|\|", get_option('yotheme_slogan'));
	shuffle($arr);
	list($slogan_t,$slogan_a,$slogan_l) = split("&&&",$arr[0]);
?>
    <div id="slogan">
        <span class="quote-left">"</span>
        <span class="slogan"><a href="<?php echo $slogan_l; ?>" target="_blank"><?php echo $slogan_t; ?></a></span>
        <span class="quote-right">"</span>
        <span class="slogan-from"> ---- <?php echo $slogan_a; ?></span>
    </div>
<?php
	}
}

/* ShortUrl */
function myUrl($atts, $content = null) {

extract(shortcode_atts(array(

"href" => 'http://'

), $atts));

return '<a target="_blank" href="'.$href.'" rel="nofollow">'.$content.'</a>';

}

add_shortcode("url", "myUrl");

/* post views */
function getPostViews($postID){   
$count_key = 'post_views_count';   
$count = get_post_meta($postID, $count_key, true);   
if($count==''){   
delete_post_meta($postID, $count_key);   
add_post_meta($postID, $count_key, '0');   
return "0 次";   
}   
return $count.' 次';   
}   
function setPostViews($postID) {   
$count_key = 'post_views_count';   
$count = get_post_meta($postID, $count_key, true);   
if($count==''){   
$count = 0;   
delete_post_meta($postID, $count_key);   
add_post_meta($postID, $count_key, '0');   
}else{   
$count++;   
update_post_meta($postID, $count_key, $count);   
}   
} 
?>