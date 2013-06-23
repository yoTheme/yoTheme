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
        <?php if ( have_posts() ) : ?>
        <section id="page">
            <?php while ( have_posts() ) : the_post(); ?>
            <article class="alist">
                <div class="alist-time">
                    <span class="alist-year"><?php the_time('Y'); ?></span>
                    <span class="alist-date"><?php the_time('m'); ?>.<?php the_time('d'); ?></span>
                </div>
                <div class="alist-container">
                    <h2 class="alist-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                    <div class="alist-meta"><?php the_author(); ?> / <?php the_category(', '); ?> / <?php 
                    if (!comments_open()) {
                        echo "评论已关闭";
                    } else {
                        comments_popup_link('发表评论','1 条评论','% 条评论');
                    }
                    ?></div>
                    <div class="alist-content"><?php the_content('阅读全文'); ?></div>
                </div>
            </article>
            <?php endwhile; ?>
        </section>
        <?php else : ?>
        啥也没找到
        <?php endif; ?>
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>