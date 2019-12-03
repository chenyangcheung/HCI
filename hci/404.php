<?php get_header(); ?>
    <link href="css/404.css" type="text/css" rel="stylesheet">
</head>
<body>
    <nav class="hci-nav hasbg" id="hciNav">
        <div class="hci-nav-inner">
            <div class="hci-nav-logo">
                <a href="<?php echo home_url();?>"><img src="img/HCI%20Logo.png"></a>
            </div>
            <ul class="hci-nav-list">
                <li class="hci-nav-item">
                    <a href="/?cat=2">中心介绍</a>
                </li>
                <li class="hci-nav-item">
                    <a href="/?cat=3">研究成果</a>
                </li>
                <li class="hci-nav-item">
                    <a href="/?cat=4">研究进展</a>
                </li>
                <li class="hci-nav-item">
                    <a href="/?cat=5">学术活动</a>
                </li>
            </ul>
<?php get_schedule(); ?>
            <div class="hci-nav-search" id="hciSearch">
                <form>
                    <input type="text" name="query" placeholder="请输入搜索内容">
                    <button type="button" title="搜索" id="hciSearchBtn"><i class="icon-search"></i></button>
                </form>
            </div>
        </div>
    </nav>
    <section class="hci-nav-bg">
        <img src="img/bg2.jpg">
        <h1>404</h1>
    </section>
    <section class="hci-content">
        <div class="hci-content-inner">
            <div class="hci-content-main">
                <h1>找不到该页面</h1>
                <a href="<?php echo home_url();?>">返回首页</a>
            </div>
        </div>
<?php get_footer(); ?>
    </section>
    <div class="mask"></div>
    <script src="js/lib/require.js" data-main="js/header.js"></script>
</body>
</html>