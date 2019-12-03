<?php get_header(); ?>
    <link href="css/activity.css" type="text/css" rel="stylesheet">
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
        <img src="img/bg1.jpg">
    </section>
    <section class="hci-body">
        <div class="hci-main">
            <ul class="hci-waterfall" id="hciWaterfall">
            <?php
                query_posts("cat=3");
                while ( have_posts() ) : the_post();
                echo ' <li class="hci-team-item">
                    <div class="hci-team-content">
                        <img src="';
                the_post_thumbnail_url();
                echo '" class="hci-team-headimg">
                        <a href="#" class="hci-team-title">';
                the_title();
                echo '</a>
                        <p class="hci-team-detail">';
                echo get_the_excerpt();
                echo '</p>
                    </div>
                </li>';
                endwhile;
            ?>
            </ul>
        </div>
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
            <li class="hci-sidebar-item">
                <i class="icon-student"></i>
                <a href="/?cat=2">中心学生</a>
            </li>
            <li class="hci-sidebar-item active">
                <i class="icon-team"></i>
                <a href="/?cat=2">中心风采</a>
            </li>
        </ul>
    </aside>
<?php get_footer(); ?>
    <div class="mask"></div>
    <div class="hci-preview" id="hciPreviewWrapper">
        <img src="" id="hciPreview">
        <a class="close">&times;</a>
    </div>
    <script src="js/lib/require.js" data-main="js/activity.js"></script>
</body>
</html>