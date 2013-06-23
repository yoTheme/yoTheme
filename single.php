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
        <div class="article-meta">
            <div class="article-meta-author">
                <?php echo get_avatar($authordata->ID,'40');?>
                <a href="<?php echo $authordata->user_url; ?>" title="<?php echo $authordata->display_name;?>"><?php echo $authordata->display_name;?></a>
            </div>
            <div class="article-meta-info">发表于：<?php the_time('Y-m-d'); ?><br />分类：<?php the_category(', '); ?><br />标签：<?php the_tags(', '); ?><br />浏览：<?php setPostViews(get_the_ID()); ?><?php echo getPostViews(get_the_ID()); ?></div>
            <div class="article-meta-share">
                <!-- Baidu Button BEGIN -->
                <div id="bdshare" class="bdshare_b" style="line-height: 12px;"><img src="http://bdimg.share.baidu.com/static/images/type-button-3.jpg" /></div>
                <script type="text/javascript" id="bdshare_js" data="type=button&amp;mini=1&amp;uid=578942" ></script>
                <script type="text/javascript" id="bdshell_js"></script>
                <script type="text/javascript">
                    document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
                </script>
                <!-- Baidu Button END -->
            </div>
        </div>
        <aside id="sidebar" class="post-sidebar">
            <?php get_sidebar(); ?>
        </aside>
    </div>
    <?php endwhile; ?>
    <?php else : ?>
    <div class="err404">
        <h3>哈哈，这儿啥也木有，回<a href="<?php echo home_url(); ?>" title="返回首页">首页</a>看看吧。</h3>
        <p>404</p>
    </div>
    <?php endif; ?>
</div>
<?php get_footer(); ?>