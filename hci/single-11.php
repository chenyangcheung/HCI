<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>研究进展——武汉大学人机交互与用户行为研究中心</title>
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
    <link href="css/progress.css" type="text/css" rel="stylesheet">
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
        <div class="hci-overlay"></div>
        <h1><span>新闻动</span>态</h1>
        <h2><span>武汉大学人机交互与用户行为研究中心</span></h2>
        <h3>Center for Studies of Human-Computer Interaction and User Behavior, Wuhan University</h3>
    </section>
    <article class="hci-article">
    <?php 
        query_posts("p=".$single_id);
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <h1 class="hci-art-title"><?php the_title(); ?></h1>
        <p class="hci-art-info">
            <span class="hci-art-time"><?php the_time('Y年m月j日'); ?></span>
            <span class="hci-art-author"><?php the_author(); ?> 供稿</span>
        </p>
        <section class="hci-art-detail">
            <p class="hci-art-abs">
                <?php echo get_post_meta(get_the_ID(), 'abstract', true); ?>
            </p>
            <div class="hci-art-text">
                <?php the_content(); ?>
            </div>
        </section>
    <?php 
        endwhile;
        endif; 
    ?>
    </article>

<?php get_footer(); ?>
    <div class="mask"></div>
    <script src="js/lib/require.js" data-main="js/header.js"></script>
</body>
</html>