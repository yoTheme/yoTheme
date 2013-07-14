<?php
  /**
  *@desc A single blog post See page.php is for a page layout.
  */

  get_header();
?>
<div id="wrapper" class="w">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div id="settings">
        <div class="setting">
            <div class="sidebar-control"><a href="javascript:;" class="b open" status="open" title="点击关闭">打开</a>侧边栏</div>
        </div>
        <a href="javascript:;" class="setting-button">个性化设置</a>
    </div>
    <h2 class="page-title"><?php the_title(); ?></h2>
    <br class="clr" />
    <div id="container" class="w">
        <div id="post">
            <div class="post-content">
                <?php the_content(); ?>
            </div>
            <div class="post-pagenavi">
                <span><?php next_post_link('%link &nbsp;下一篇 »'); ?></span>
                <?php previous_post_link('« 上一篇&nbsp; %link'); ?>
            </div>
            <div class="post-comments"><?php comments_template(); ?></div>
        </div>
        <aside id="sidebar">
            <?php get_sidebar(); ?>
        </aside>
    </div>
    <?php endwhile; ?>
    <?php else : ?>
        <div id="containter" class="w"><section id="page">
            <article class="alist">
                <div class="alist-time">
                    <span class="alist-year">就是</span>
                    <span class="alist-date">404</span>
                </div>
                <div class="alist-container">
                    <div class="alist-content">
                        <h3>哈哈，这儿啥也木有，回<a href="<?php echo home_url(); ?>" title="返回首页">首页</a>看看吧。</h3>
                    </div>
                </div>
            </article>
        </section></div>
    <?php endif; ?>
</div>
<?php get_footer(); ?>
