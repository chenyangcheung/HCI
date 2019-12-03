<?php get_header(); ?>
   <link href="css/teacher.css" type="text/css" rel="stylesheet">
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
    <?php query_posts("p=".$single_id);
    if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <section class="hci-body">
        <section class="hci-main hci-content">
            <div class="hci-mem-avatar">
                <img src="<?php the_post_thumbnail_url(); ?>">
            </div>
            <h1 class="hci-mem-name"><?php the_title(); ?></h1>
            <p class="hci-mem-info"><?php echo get_post_meta(get_the_ID(), 'zc', true); ?></p>
            <p class="hci-mem-email"><i class="icon-email"></i><?php echo get_post_meta(get_the_ID(), 'teacher_email', true); ?></p>
            <div class="hci-mem-intro">
                <?php echo get_post_meta(get_the_ID(), 'intro', true); ?>
            </div>
        </section>
        <?php if(get_post_meta(get_the_ID(), 'shjz', true)){ ?>
        <section class="hci-content hci-module">
            <h2 class="hci-cont-title">社会兼职</h2>
            <p><?php echo get_post_meta(get_the_ID(), 'shjz', true); ?></p>
        </section>
        <?php } ?>
        <?php if(get_post_meta(get_the_ID(), 'yjly', true)){ ?>
        <section class="hci-content hci-module">
            <h2 class="hci-cont-title">研究领域</h2>
            <p><?php echo get_post_meta(get_the_ID(), 'yjly', true); ?></p>
        </section>
        <?php }?>
        <?php if(get_post_meta(get_the_ID(), 'kskc', true)){ ?>
        <section class="hci-content hci-module">
            <h2 class="hci-cont-title">开设课程</h2>
            <p><?php echo get_post_meta(get_the_ID(), 'kskc', true); ?></p>
        </section>
        <?php }?>
        <?php if(get_post_meta(get_the_ID(), 'yjcgzz', true)){ ?>
        <section class="hci-content hci-module">
            <h2 class="hci-cont-title">研究成果：专著、专利</h2>
            <p><?php echo get_post_meta(get_the_ID(), 'yjcgzz', true); ?></p>
        </section>
        <?php }?>
        <?php if(get_post_meta(get_the_ID(), 'yjcgqk', true)){ ?>
        <section class="hci-content hci-module">
            <h2 class="hci-cont-title">研究成果：期刊论文</h2>
            <p><?php echo get_post_meta(get_the_ID(), 'yjcgqk', true); ?></p>
        </section>
        <?php }?>
        <?php if(get_post_meta(get_the_ID(), 'yjcgzy', true)){ ?>
        <section class="hci-content hci-module">
            <h2 class="hci-cont-title">研究成果：重要会议论文</h2>
            <p><?php echo get_post_meta(get_the_ID(), 'yjcgzy', true); ?></p>
        </section>
        <?php }?>
        <?php if(get_post_meta(get_the_ID(), 'kyxm', true)){ ?>
        <section class="hci-content hci-module">
            <h2 class="hci-cont-title">主要科研项目</h2>
            <p><?php echo get_post_meta(get_the_ID(), 'kyxm', true); ?></p>
        </section>
        <?php }?>
    </section>
<?php endwhile;endif; ?>
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
            <li class="hci-sidebar-item active">
                <i class="icon-teacher"></i>
                <a href="/?cat=2">师资力量</a>
            </li>
            <li class="hci-sidebar-item">
                <i class="icon-student"></i>
                <a href="/?cat=2">中心学生</a>
            </li>
            <li class="hci-sidebar-item">
                <i class="icon-team"></i>
                <a href="/?cat=2">中心风采</a>
            </li>
        </ul>
    </aside>
    <aside class="hci-sidebar hci-sidebar-nav" id="hciSidebarNav">
        <h1>快速跳转</h1>
        <h2>当前页面中</h2>
        <ul class="hci-sidebar-nav-list">

        </ul>
    </aside>
<?php get_footer(); ?>
    <div class="mask"></div>
    <script src="js/lib/require.js" data-main="js/teacher.js"></script>
</body>
</html>