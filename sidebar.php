    <ul>
    <?php
    if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) {
        wp_list_bookmarks('title_after=&title_before=');
        wp_list_categories('title_li=' . __('Categories', 'yotheme'));
    }
    ?>
    </ul>