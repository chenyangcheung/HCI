<?php get_header(); ?>
    <link href="css/research.css" type="text/css" rel="stylesheet">
</head>
<body>
    <nav class="hci-nav hasbg" id="hciNav">
        <div class="hci-nav-inner">
<?php get_headlink(); ?>
<?php get_schedule(); ?>
<?php get_searchform(); ?>
        </div>
    </nav>
    <header class="hci-nav-bg">
        <div class="hci-overlay"></div>
        <h1><span>研究进</span>展</h1>
        <h2><span>武汉大学人机交互与用户行为研究中心</span></h2>
        <h3>Center for Studies of Human-Computer Interaction and User Behavior, Wuhan University</h3>
    </header>
    <section class="hci-research-body">
        <ul class="hci-res-list">
            <?php 
                while ( have_posts() ) : the_post();
                    $post_expert = get_the_excerpt();
                    $post_thumb = get_the_post_thumbnail_url();
            ?>
                <li class="hci-res-item">
                    <a href="<?php the_permalink(); ?>">
                    <div class="hci-res-img">
                        <img src="<?php 
                            if(!$post_thumb) {
                                echo 'img/pro1.jpg';
                            } else {
                                the_post_thumbnail_url();
                            } ?>" class="hci-res-img">
                    </div>
                    <div class="hci-res-content">
                        <div class="hci-res-header">
                            <span class="hci-res-date"><?php the_time('Y年m月j日'); ?></span>
                            <span class="hci-res-author">供稿：<?php the_author(); ?></span>
                        </div>
                        <h3 class="hci-res-title"><?php the_title(); ?></h3>
                        <div class="hci-res-abs">
                            <?php 

                                if(!$post_expert) {
                                    echo '在这里输入摘要，字数在100到140之间。在这里输入摘要，字数在100到140之间。在这里输入摘要，字数在100到140之间。在这里输入摘要，字数在100到140之间。在这里输入摘要，字数在100到140之间。在这里输入摘要，字数在100到140之间。在这里输入摘要，字数在100到140之间。';
                                } else {
                                    the_excerpt();
                                } 
                            ?>
                        </div>
                    </div>
                    </a>
                </li>
            <?php
                endwhile;
            ?>
        </ul>
        <nav class="hci-pagination">
            <ul class="hci-pagination-list" id="hciPagination">
                <?php par_pagenavi(2); ?>

            </ul>
        </nav>

<?php get_footer(); ?>
    </section>
    <div class="mask"></div>
    <script src="js/lib/require.js" data-main="js/research.js"></script>
</body>
</html>