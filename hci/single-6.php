<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>研究成果—科研项目</title>
    <script type="text/javascript">
        document.createElement("leo");
        document.createElement("header");
        document.createElement("article");
        document.createElement("aside");
        document.createElement("section");
        document.createElement("footer");
    </script>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link href="css/reset.css" type="text/css" rel="stylesheet">
    <link href="css/item.css" type="text/css" rel="stylesheet">
</head>
<body>
    <nav class="hci-nav hasbg" id="hciNav">
        <div class="hci-nav-inner">
<?php get_headlink(); ?>
<?php get_schedule(); ?>
<?php get_searchform(); ?>
        </div>
    </nav>
    <section class="hci-nav-bg">
        <img src="img/basemap.jpg">
    </section>
    <section class="hci-body">
        <section class="hci-main">
            <div class="hci-content hci-module">
                <?php
                if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <h1 class="hci-content-title"><?php the_title(); ?></h1>
                <p class="hci-content-desc"><?php echo get_post_meta(get_the_ID(), 'intro', true); ?></p>
                <ul class="hci-content-list">
                    <?php the_content(); ?>
                </ul>  
                <nav class="hci-pagination">
                    <ul class="hci-pagination-list" id="hciPagination">
<?php      
    custom_wp_link_pages('before=&after=&next_or_number=next&previouspagelink=上一页&nextpagelink='); //第一个函数显示“上一页”      
    custom_wp_link_pages('before=&after='); //第二个显示数字页码      
    custom_wp_link_pages('before=&after=&next_or_number=next&previouspagelink=&nextpagelink=下一页'); //第三个显示“下一页”      
?>  
                    </ul>
                </nav>
                <div class="hci-content-band"></div>
            </div>
        </section>
    </section>
    <aside class="hci-sidebar" id="hciSidebar">
        <div class="hci-sidebar-header">
            <div class="hci-sidebar-logo">HCI</div>
            <h1 class="hci-sidebar-title"><span>研究成</span>果</h1>
            <p>武汉大学人机交互与用户行为研究中心</p>
        </div>
        <ul class="hci-sidebar-menu">
            <li class="hci-sidebar-item <?php if(get_the_ID()==5) echo 'active' ?>">
                <i class="icon-project"></i>
                <a href="/?cat=8">科研项目</a>
            </li>
            <li class="hci-sidebar-item <?php if(get_the_ID()==11) echo 'active' ?>">
                <i class="icon-publication"></i>
                <a href="/?cat=8">出版专著</a>
            </li>
            <li class="hci-sidebar-item <?php if(get_the_ID()==14) echo 'active' ?>">
                <i class="icon-system"></i>
                <a href="/?cat=8">开发系统</a>
            </li>
            <li class="hci-sidebar-item <?php if(get_the_ID()==16) echo 'active' ?>">
                <i class="icon-paper"></i>
                <a href="/?cat=8">期刊论文</a>
            </li>
            <li class="hci-sidebar-item <?php if(get_the_ID()==18) echo 'active' ?>">
                <i class="icon-meeting"></i>
                <a href="/?cat=8">会议论文</a>
            </li>
            <li class="hci-sidebar-item <?php if(get_the_ID()==20) echo 'active' ?>">
                <i class="icon-praise"></i>
                <a href="/?cat=8">获得奖项</a>
            </li>
        </ul>
    </aside>

                <?php 
                    endwhile;
                    endif; 
                ?>      
    <?php get_footer(); ?>
    <div class="mask"></div>
    <script src="js/lib/require.js" data-main="js/item.js"></script>
</body>
</html>