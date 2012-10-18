<?php
//via wange.im
$themename = "yoTheme";
$shortname = "yotheme";
$options = array (
    array("name" => "Slogan","id" => $shortname."_slogan","type" => "textarea","msg" => "Slogan&&&作者&&&链接，多条slogan使用||隔开"),
	array("name" => "关键词","id" => $shortname."_kw","type" => "text","msg" => "填写您的站点关键词，SEO必备"),
	array("name" => "站点描述","id" => $shortname."_ds","type" => "text","msg" => "填写您的站点描述")
);
function yotheme_add_admin() {
    global $themename, $shortname, $options;
    if ( $_GET['page'] == basename(__FILE__) ) {
        if ( 'save' == $_REQUEST['action'] ) {
            foreach ($options as $value) {
            update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
            foreach ($options as $value) {
            if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
            header("Location: themes.php?page=control.php&saved=true");
            die;
        } else if( 'reset' == $_REQUEST['action'] ) {
            foreach ($options as $value) {
                delete_option( $value['id'] );
                update_option( $value['id'], '' );
            }
            header("Location: themes.php?page=control.php&reset=true");
            die;
        }
    }
    add_theme_page(__('Options', 'yotheme'), __('Options', 'yotheme'), 'edit_themes', basename(__FILE__), 'yotheme_admin');
}
function yotheme_admin() {
    global $themename, $shortname, $options;
    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.__("Settings saved.", "yotheme").'</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.__("Already reset to default.", "yotheme").'</strong></p></div>';
?>
    <style type="text/css">
    th{text-align:left; font-size:12px;}
	form {padding:0; margin:0;}
	.submit {margin:0; padding:5px 0;}
    </style>
    <div class="wrap">
        <h2><?php _e('Options', 'yotheme'); ?></h2>
        <form method="post">
            <div class="submit" style="padding:0;">
                <input style="font-size:12px !important;" name="save" type="submit" value="<?php _e('Save options', 'yotheme'); ?>" />   
                <input type="hidden" name="action" value="save" />
            </div>
			<hr />
            <table class="optiontable" >
                <?php foreach ($options as $value) { ?>
                        <tr align="left">
                            <th scope="row"><?php echo $value['name']; ?>:</th>
                            <td>
                                <textarea name="<?php echo $value['id']; ?>" cols="50" rows="5" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>"><?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } ?></textarea> <?php echo $value['msg']; ?>
                            </td>
                        </tr>
                    <?php } ?>
            </table>
            <hr />
            <div class="submit">
                <input style="font-size:12px !important;" name="save" type="submit" value="<?php _e('Save options', 'yotheme'); ?>" />   
                <input type="hidden" name="action" value="save" />
            </div>
        </form>
        <form method="post" class="defaultbutton">
            <div class="submit">
                <input style="font-size:12px !important;" name="reset" type="submit" value="<?php _e('Load default', 'yotheme'); ?>" />
                <input type="hidden" name="action" value="reset" />
            </div>
        </form>
    </div>
    <?php
}
add_action('admin_menu', 'yotheme_add_admin');
?>