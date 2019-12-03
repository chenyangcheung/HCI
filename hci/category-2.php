<?php get_header(); ?>
    <link href="css/team.css" type="text/css" rel="stylesheet">
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
            <div class="hci-content hci-content-basic hci-module">
                <h1 class="hci-content-title">研究领域</h1>
                <p class="hci-content-desc">人机交互技术、用户信息行为</p>
                <p class="hci-content-detail">中心主要的研究领域为人机交互，既涉及“机”的一方，即相关技术与算法研究，同时又涉及“人”的一方，即人机交互过程中的用户。中心从事的人机交互研究，旨在探寻人与机器更深层次的关系，实现人与机器自然且高效地交互，从而使机器更“懂得”且能更好地帮助用户，同时也促进用户对于机器的了解。通过研究人机交互过程中的用户信息行为，挖掘用户与机器交互时的行为规律，并从用户行为规律出发，探寻并设计能满足用户不同需求的机器或算法，促进人与机器的便捷交互。
                </p>
                <div class="hci-content-band"></div>
            </div>
            <div class="hci-content hci-teacher hci-module">
                <div class="hci-content-header">
                    <h1 class="hci-content-title">师资力量</h1>
                    <p class="hci-content-desc">技术和社科背景结合的人机交互创新研究团队</p>
                    <p class="hci-content-detail">中心师资在教育、工作和研究等经历中具有跨学科的背景，并且丰富的国外研究经历和高水平国际研究成果为中心建设提供广阔的国际视野，不同的研究方向与优势使得技术与人文因素充分结合，形成中心特色。中心以人机交互为主题，对人机关系、人机交互与协作、以用户为中心的交互技术、相关交互技术的实践应用等问题进行深入研究，实现中心的实质性融合和合作，旨在使中心成为国内图书情报领域最有影响，并具有一定国际影响的人机交互领域紧密型创新研究中心。
                    </p>
                </div>
                <div class="hci-teacher-detail">
                    <h2>师资详情</h2>
                    <ul class="hci-teacher-list">
                    <?php 
                        $count = 0;
                        query_posts("showposts=100&cat=6");
                        if ( have_posts() ) :
                            while ( have_posts() ) : the_post();
                                echo '<li class="hci-teacher-item"><img src="';
                                the_post_thumbnail_url();
                                echo '"><p class="hci-teacher-name">';
                                the_title();
                                echo "&nbsp&nbsp";
                                echo get_post_meta(get_the_ID(), 'zhuyaozhicheng', true);
                                echo '</p><p class="hci-teacher-ins">';
                                echo get_post_meta(get_the_ID(), 'jigou', true);
                                echo '</p><a class="hci-teacher-more" href="';
                                the_permalink();
                                echo '">简介</a></li>';
                                $count++;
                                if($count === 4) {
                                    echo '</ul><ul class="hci-teacher-list">';
                                    $count = 0;
                                }
                            endwhile;
                            echo '</ul>';
                        endif;

                    ?>
                </div>
                <div class="hci-content-band"></div>
            </div>
            <div class="hci-content hci-module">
                <div class="hci-content-header">
                    <h1 class="hci-content-title">在读学生<a href="/?cat=5">更多 »</a></h1>
                </div>
                <div class="hci-student-detail">
                    <ul class="hci-student-list">
                        <?php 
                            $count = 0;
                            query_posts("showposts=100&cat=5");
                            if ( have_posts() ) :
                                while ( have_posts() ) : the_post();
                                    $year = str_split(get_post_meta(get_the_ID(), 'zhuanye', true), 4);
                                    $year = $year[0];
                                    $baseyear = Date("Y");
                                    if($year>($baseyear-3)){
                                    echo '<li class="hci-student-item"><a class="hci-student-name" href="';
                                    the_permalink();
                                    echo '">';
                                    the_title();
                                    echo '</a><span class="hci-student-degree">';
                                    
                                    echo $year;
                                    echo '级';
                                    echo '&nbsp&nbsp';
                                    echo get_post_meta(get_the_ID(), 'xueli', true);
                                    echo '</span></li>';
                                }
                                endwhile;
                            endif;
                        ?>
                    </ul>
                </div>
                <div class="hci-content-band"></div>
            </div>
            <div class="hci-team hci-module">
                <h1>团队风采</h1>
                <ul class="hci-team-list">
                    <?php 
                        $count = 0;
                        query_posts("showposts=2&cat=3");
                        if ( have_posts() ) :
                            while ( have_posts() ) : the_post();
                                if($count==0) {
                                    echo '<li class="hci-team-item hci-col-1"><div class="hci-team-content"><img src="';
                                    the_post_thumbnail_url();
                                    echo '"><a class="hci-team-title">';
                                    the_title();
                                    echo '</a><p class="hci-team-detail">';
                                    echo get_the_excerpt();
                                    echo '</p></div></li>';
                                    $count++;
                                } elseif ($count == 1) {
                                    echo '<li class="hci-team-item hci-col-1"><div class="hci-team-content"><img src="';
                                    the_post_thumbnail_url();
                                    echo '"><a class="hci-team-title">';
                                    the_title();
                                    echo '</a><p class="hci-team-detail">';
                                    echo get_the_excerpt();
                                    echo '</p></div></li>';
                                }
                            endwhile;
                        endif;

                    ?>                                  
                    <?php 
                        $count = 0;
                        query_posts("showposts=6&cat=3");
                        if ( have_posts() ) :
                            while ( have_posts() ) : the_post();
                                if($count>=2) {
                                    echo '<li class="hci-team-item hci-col-1"><div class="hci-team-content"><img src="';
                                    the_post_thumbnail_url();
                                    echo '"><a class="hci-team-title">';
                                    the_title();
                                    echo '</a><p class="hci-team-detail">';
                                    echo get_the_excerpt();
                                    echo '</p></div></li>';
                                }
                                $count++;
                            endwhile;
                        endif;

                    ?>  
                </ul>
                <a href="/?cat=3" class="hci-more">点击这里查看「中心风采」的更多内容</a>
            </div>
        </section>
    </section>
    <aside class="hci-sidebar" id="hciSidebar">
        <div class="hci-sidebar-header">
            <div class="hci-sidebar-logo">HCI</div>
            <h1 class="hci-sidebar-title"><span>中心介</span>绍</h1>
            <p>武汉大学人机交互与用户行为研究中心</p>
        </div>
        <ul class="hci-sidebar-menu">
            <li class="hci-sidebar-item active">
                <i class="icon-research"></i>
                <a>研究领域</a>
            </li>
            <li class="hci-sidebar-item">
                <i class="icon-teacher"></i>
                <a>师资力量</a>
            </li>
            <li class="hci-sidebar-item">
                <i class="icon-student"></i>
                <a>中心学生</a>
            </li>
            <li class="hci-sidebar-item">
                <i class="icon-team"></i>
                <a>中心风采</a>
            </li>
        </ul>
    </aside>
<?php get_footer(); ?>
    <div class="mask"></div>
    <script src="js/lib/require.js" data-main="js/main.js">
    </script>
</body>
</html>