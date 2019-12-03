<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>在读学生——武汉大学人机交互与用户行为研究中心</title>
    <!--[if lt IE 9]>
    <script type="text/javascript">
        document.createElement("leo");
        document.createElement("header");
        document.createElement("nav");
        document.createElement("article");
        document.createElement("aside");
        document.createElement("section");
        document.createElement("footer");
    </script>
    <![endif]-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link href="css/reset.css" type="text/css" rel="stylesheet">
    <link href="css/student.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php $single_id = get_the_ID(); ?>
    <nav class="hci-nav hasbg" id="hciNav">
        <div class="hci-nav-inner">
<?php get_headlink(); ?>
<?php get_schedule(); ?>
<?php get_searchform(); ?>
        </div>
    </nav>
    <section class="hci-nav-bg">
        <img src="img/bg1.jpg">
    </section>
    <section class="hci-body">
    <?php 
        query_posts("p=".$single_id);
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <section class="hci-main">
            <div class="hci-mem-avatar">
                <img src="<?php the_post_thumbnail_url(); ?>">
            </div>
            <h1 class="hci-mem-name"><?php the_title(); ?></h1>
            <p class="hci-mem-info"><?php echo get_post_meta(get_the_ID(), 'zhuanye', true); ?>&nbsp<?php echo get_post_meta(get_the_ID(), 'xueli', true); ?></p>
            <p class="hci-mem-email"><i class="icon-email"></i><?php echo get_post_meta(get_the_ID(), 'student_email', true); ?></p>
            <div class="hci-mem-detail">
                <?php if(get_post_meta(get_the_ID(), 'xingqu', true)) {
                    echo ' <h2>兴趣爱好</h2>
                <p>';
                    echo get_post_meta(get_the_ID(), 'xingqu', true);
                    echo '</p>';
                } ?>
                <?php if(get_post_meta(get_the_ID(), 'fangxiang', true)) {
                    echo ' <h2>研究方向</h2>
                <p>';
                    echo get_post_meta(get_the_ID(), 'fangxiang', true);
                    echo '</p>';
                } ?>

                <?php if(get_post_meta(get_the_ID(), 'yifabiaolunwen', true)) {
                    echo ' <h2>研究成果</h2>
                <ul>';
                    echo get_post_meta(get_the_ID(), 'yifabiaolunwen', true);
                    echo '</ul>';
                } ?>
                <?php if(get_post_meta(get_the_ID(), 'huojiangqingkuang', true)) {
                    echo ' <h2>获奖情况</h2>
                <ul>';
                    echo get_post_meta(get_the_ID(), 'huojiangqingkuang', true);
                    echo '</ul>';
                } ?>
                <?php if(get_post_meta(get_the_ID(), 'zhuanli', true)) {
                    echo ' <h2>专利、软件著作权</h2>
                <ul>';
                    echo get_post_meta(get_the_ID(), 'zhuanli', true);
                    echo '</ul>';
                } ?>
            </div>
        </section>
    <?php endwhile; endif; ?>
    </section>
    <aside class="hci-sidebar" id="hciSidebar">
        <div class="hci-sidebar-header">
            <div class="hci-sidebar-logo">HCI</div>
            <h1 class="hci-sidebar-title"><span>中心介</span>绍</h1>
            <p>武汉大学人机交互与用户行为研究中心</p>
        </div>
        <ul class="hci-sidebar-menu">
            <li class="hci-sidebar-item">
                <i class="icon-research"></i>
                <a href="/?cat=2">研究领域</a>
            </li>
            <li class="hci-sidebar-item">
                <i class="icon-teacher"></i>
                <a href="/?cat=2">师资力量</a>
            </li>
            <li class="hci-sidebar-item active">
                <i class="icon-student"></i>
                <a href="/?cat=2">中心学生</a>
            </li>
            <li class="hci-sidebar-item">
                <i class="icon-team"></i>
                <a href="/?cat=2">中心风采</a>
            </li>
        </ul>
    </aside>
<?php get_footer(); ?>
    <div class="mask"></div>
    <script src="js/lib/require.js" data-main="js/student.js"></script>
</body>
</html>