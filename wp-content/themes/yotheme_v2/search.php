<?php get_header(); ?>
<div id="wrapper" class="w">
    <div id="settings">
        <div class="setting">
            <div class="sidebar-control"><a href="javascript:;" class="b open" status="open" title="点击关闭">打开</a>侧边栏</div>
        </div>
        <a href="javascript:;" class="setting-button">个性化设置</a>
    </div>
    <h2 class="page-title"><?php printf('搜索 %s'), '' . get_search_query() . '' ); ?></h2>
    <br class="clr" />
    <div id="container" class="w">
        <section id="page">
            <?php get_template_part( 'loop', 'search' ); ?>
        </section>
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>