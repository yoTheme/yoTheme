<?php get_header(); ?>
<div id="wrapper" class="w">
    <div id="settings">
        <div class="setting">
            <div class="sidebar-control"><a href="javascript:;" class="b open" status="open" title="点击关闭">打开</a>侧边栏</div>
        </div>
        <a href="javascript:;" class="setting-button">个性化设置</a>
    </div>
    <?php echo slogan(); ?>
    <br class="clr" />
    <div id="container" class="w">
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
        <aside id="sidebar">
            <?php get_sidebar(); ?>
        </aside>
        <br class="clr" />
    </div>
</div>
<?php get_footer(); ?>
