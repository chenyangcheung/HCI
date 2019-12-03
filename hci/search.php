<?php get_header(); ?>
    <link href="css/search.css" type="text/css" rel="stylesheet">
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
    <section class="hci-search">
        <h1 class="hci-search-count">当前共搜索出<span><?php
            global $wp_query;
            echo $wp_query->found_posts;
        ?></span>条结果</h1>
        <ul class="hci-search-result">
        <?php 
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    echo '<li class="hci-search-item">
                <img src="';
                echo get_the_post_thumbnail_url();
                echo '?>">
                <div class="hci-search-content">
                    <div class="hci-search-header">
                        <span class="hci-search-time">';
                    the_time('Y年m月j日');
                    echo '</span>
                        <span class="hci-search-author">供稿:&nbsp';
                    the_author();
                    echo '</span></div><a href="';
                    the_permalink();
                    echo '" class="hci-search-title">';
                    the_title();
                    echo '</a>
                    <div class="hci-search-abs">';
                    echo get_the_excerpt();
                    $post_id = get_the_ID(); 
                    $cat_id=get_post($post_id)->post_category;
                    echo '</div>
                    <div class="hci-search-type">
                        类别:
                        <a href="';
                    echo get_category_link( $cat_id[0] );
                    echo '">';
                    echo get_cat_name( $cat_id[0] );
                    echo '</a>
                    </div>
                </div>
            </li>';
                endwhile;
            endif;

         ?>
        </ul>
        <nav class="hci-pagination">
            <ul class="hci-pagination-list" id="hciPagination">
                <?php par_pagenavi(2); ?>
            </ul>
        </nav>
    </section>
<?php get_footer(); ?>
    <div class="mask"></div>
    <script src="js/lib/require.js" data-main="js/search.js"></script>
</body>
</html>