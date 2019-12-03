<?php get_header(); ?>
    <link href="css/index.css" type="text/css" rel="stylesheet">
</head>
<body>
    <nav class="hci-nav" id="hciNav">
        <div class="hci-nav-inner">
            <?php get_headlink(); ?>
            <?php get_schedule(); ?>
            <?php get_searchform(); ?>
        </div>
    </nav>

    <!--新闻板块开始-->
    <section class="hci-news">
        <div class="hci-news-jumbotron">
            <?php 
                query_posts("showposts=1&cat=12");
                    if ( have_posts() ) :
                        while ( have_posts() ) : the_post();
                            echo '<a class="hci-news-jumbotron-inner" href="';
                            echo get_the_permalink();;
                            echo '" style="background-image: url(\'';
                            echo get_the_post_thumbnail_url();
                            echo '\')"></a>
            <div class="hci-news-jumbotron-title pop">';
                            echo get_the_title();
                            echo '</div>';
                        endwhile;
                    endif;                
            ?>
            <a title="查看更多" class="hci-news-more" href="/?cat=11"></a>
        </div>
        <div class="hci-news-aside">
            <ul class="hci-news-list">

            <?php 
                query_posts("showposts=3&cat=12");
                    if ( have_posts() ) :
                        while ( have_posts() ) : the_post();
                            echo '<li class="hci-news-item active">
                    <div class="hci-news-item-inner">
                        <div class="hci-news-img-wrapper">
                            <img src="';
                            echo get_the_post_thumbnail_url();
                            echo '" class="hci-news-img">
                        </div>
                        <div class="hci-news-detail">
                            <a class="hci-news-title" href="';
                            echo get_the_permalink();
                            echo '">';
                            echo get_the_title();
                            echo '</a><p>';
                            echo get_the_excerpt();
                            echo '</p>
                        </div>
                    </div>
                </li>';
                        endwhile;
                    endif;                
            ?>
            </ul>
        </div>
    </section>
    <!--新闻板块结束-->

    <section class="hci-project">
        <h1 class="hci-title">研究进展</h1>
        <ul class="hci-pro-list">
            <?php 
                query_posts("showposts=3&cat=9");
                    if ( have_posts() ) :
                        while ( have_posts() ) : the_post();
                            echo '<li class="hci-pro-item"><a href="';
                            the_permalink();
                            echo '" class="hci-card"><div class="hci-pro-pic"><img src="';
                            the_post_thumbnail_url();
                            echo '"></div><div class="hci-pro-content"><h2 class="hci-pro-name">';
                            the_title();
                            echo '</h2><p class="hci-pro-intro">';
                            echo get_the_excerpt();
                            echo '</p></div></a></li>';
                        endwhile;
                    endif;                
            ?>
        </ul>
    </section>
    <a href="/?cat=9" class="hci-more">点击这里查看「研究进展」的更多内容</a>

    <section class="hci-basemap">
        <div class="hci-basemap-mask"></div>
        <div class="hci-basemap-content">
            <h1>武汉大学人机交互与用户行为研究中心</h1>
            <h2>Center for Studies of Human-Computer Interaction and User Behavior, Wuhan University</h2>
        </div>
    </section>
    <section class="hci-member">
        <h1 class="hci-title">师资力量</h1>
        <ul class="hci-member-list">
        <?php
            query_posts("showposts=8&cat=6");
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        echo '<li class="hci-member-item"><a href="';
                        the_permalink();
                        echo '" class="hci-card"><img src="';
                        the_post_thumbnail_url();
                        echo '"><h2 class="hci-member-name">';
                        the_title();
                        echo "&nbsp&nbsp";
                        echo get_post_meta(get_the_ID(), 'zhuyaozhicheng', true);
                        echo '</h2><p class="hci-member-ins">';
                        echo get_post_meta(get_the_ID(), 'jigou', true);
                        echo '</p></a></li>';
                    endwhile;
                endif;
        ?>
        </ul>
    </section>

<?php get_footer(); ?>
    <section class="mask"></section>
    <script src="js/lib/require.js" data-main="js/index.js"></script>
</body>
</html>