<?php get_header(); ?>
    <link href="css/studentlist.css" type="text/css" rel="stylesheet">
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
        <section class="hci-main">
            <h1 class="hci-title"></h1>
            <?php 
                $scope = Date("Y");
                query_posts("showposts=1000&cat=5");
                while ( have_posts() ) : the_post();
                    $year = str_split(get_post_meta(get_the_ID(), 'zhuanye', true), 4);
                    $year = $year[0];
                    if($year<$scope){
                        $scope = $year;
                    }
                endwhile;
                $nowtime = Date("Y");
             ?>
            <?php for($x=0; $x<=($nowtime-$scope); $x++){ ?>
            <?php 
                $baseyear = Date("Y")-$x;
                echo '<div class="hci-stu-area">
                <h2>';
                    echo $baseyear.'级';
                    echo '</h2><ul class="hci-stu-list">';
                query_posts("showposts=10000&cat=5");
                while ( have_posts() ) : the_post();
                $year = str_split(get_post_meta(get_the_ID(), 'zhuanye', true), 4);
                $year = $year[0];
                if($year==$baseyear) {
                    echo '<li class="hci-stu-item">
                        <img src="';
                    the_post_thumbnail_url();
                    echo '" class="hci-stu-avatar">
                        <p class="hci-stu-name">';
                    the_title();
                    echo '</p>
                        <p class="hci-stu-degree">';
                    echo get_post_meta(get_the_ID(), 'xueli', true);
                    echo '</p>
                        <a class="hci-stu-more" href="';
                    the_permalink();
                    echo '">简介</a>
                    </li>';
                }
                endwhile;
                echo '</ul>';
            ?>
            <?php } ?>
        </section>
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
    <script src="js/lib/require.js" data-main="js/studentlist.js"></script>
</body>
</html>