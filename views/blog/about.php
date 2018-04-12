<?php ?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>

    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

    <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <meta name="theme-color" content="#f8f5ec" />
    <meta name="msapplication-navbutton-color" content="#f8f5ec">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f8f5ec">

    <meta name="description" content="关于我"/>
    <meta name="keywords" content="Ahonn, Ahonn's Blog, 前端，JavaScript，Vim, 编程" />
<!--    <meta name="baidu-site-verification" content="0a275bcf7d954b807e1db498d8e5b192" />-->
<!--    <meta name="google-site-verification" content="j5dWC85DkoAfUR50W00ewfii3X9ouH55HnyBP6oZxGE" />-->

    <link rel="alternate" href="/atom.xml" title="Ahonn">
    <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico?v=2.6.0" />
    <link rel="canonical" href="http://www.ahonn.me/about/"/>

    <link rel="stylesheet" type="text/css" href="<?= \yii\helpers\Url::to('@web/css/style.css') ?>" />

    <title> 关于我 - Ahonn </title>
</head>

<body>
<div id="mobile-navbar" class="mobile-navbar">
    <div class="mobile-header-logo">
        <a href="<?= \yii\helpers\Url::to(['blog/index']) ?>" class="logo">Jacklucn</a>
    </div>
    <div class="mobile-navbar-icon">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>

<nav id="mobile-menu" class="mobile-menu slideout-menu">
    <ul class="mobile-menu-list">

        <a href="<?= \yii\helpers\Url::to(['blog/index']) ?>">
            <li class="mobile-menu-item">
                首页
            </li>
        </a>

        <a href="<?= \yii\helpers\Url::to(['blog/archives']) ?>">
            <li class="mobile-menu-item">
                归档
            </li>
        </a>

        <a href="<?= \yii\helpers\Url::to(['blog/about']) ?>">
            <li class="mobile-menu-item">
                关于
            </li>
        </a>
    </ul>
</nav>

<div class="container" id="mobile-panel">
    <header id="header" class="header"><div class="logo-wrapper">
            <a href="<?= \yii\helpers\Url::to(['blog/index']) ?>" class="logo">Jacklucn</a>
        </div>

        <nav class="site-navbar">

            <ul id="menu" class="menu">

                <li class="menu-item">
                    <a class="menu-item-link" href="<?= \yii\helpers\Url::to(['blog/index']) ?>">
                        首页
                    </a>
                </li>

                <li class="menu-item">
                    <a class="menu-item-link" href="<?= \yii\helpers\Url::to(['blog/archives']) ?>">
                        归档
                    </a>
                </li>

                <li class="menu-item">
                    <a class="menu-item-link" href="<?= \yii\helpers\Url::to(['blog/about']) ?>">
                        关于
                    </a>
                </li>

            </ul>

        </nav>

    </header>

    <main id="main" class="main">
        <div class="content-wrapper">
            <div id="content" class="content">

                <article class="post">
                    <div class="post-content">
                        <h1 id="关于我"><a href="#关于我" class="headerlink" title="关于我"></a>关于我</h1><p>某不知名三本大四汪，软件工程专业</p>
                        <p>前端开发者，编辑器用 Vim</p>
                        <p>喜欢看书，听音乐，看美剧 and 追日漫</p>
                        <p>不折腾会死星人，看到什么好玩的东西都会想折腾折腾</p>
                        <h2 id="其他地方"><a href="#其他地方" class="headerlink" title="其他地方"></a>其他地方</h2><ul>
                            <li>Github: <a href="https://github.com/ahonn" target="_blank" rel="noopener">@ahonn</a></li>
                            <li>知乎: <a href="https://www.zhihu.com/people/ahonn" target="_blank" rel="noopener">@Ahonn</a></li>
                        </ul>

                    </div>
                </article>

            </div>

            <div class="comments" id="comments">

                <div id="disqus_thread">
                    <noscript>
                        Please enable JavaScript to view the
                        <a href="//disqus.com/?ref_noscript">comments powered by Disqus.</a>
                    </noscript>
                </div>

            </div>


        </div>
    </main>

    <footer id="footer" class="footer">
        <div class="social-links">
            <a href="mailto:jacklu.net@gmail.com" class="iconfont icon-email" title="email"></a>
            <a href="https://github.com/jacklucn" class="iconfont icon-github" title="github"></a>
            <a href="https://www.zhihu.com/people/jacklucn/activities" class="iconfont icon-zhihu" title="zhihu"></a>
        </div>
        <div class="copyright">
            <div class="container">
                <p class="pull-left">&copy; Jacklucn <?= date('Y') ?></p>
            </div>
        </div>
    </footer>

    <div class="back-to-top" id="back-to-top">
        <i class="iconfont icon-up"></i>
    </div>
</div>

<script type="text/javascript">
    var disqus_config = function () {
        this.page.url = 'http://www.ahonn.me/about/index.html';
        this.page.identifier = 'about/index.html';
        this.page.title = '关于我';
    };
    (function() {
        var d = document, s = d.createElement('script');

        s.src = '//ahonn.disqus.com/embed.js';

        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>

<script type="text/javascript" src="<?= \yii\helpers\Url::to('@web/js/jquery-3.1.1.min.js')?>"></script>
<script type="text/javascript" src="<?= \yii\helpers\Url::to('@web/js/slideout.js')?>"></script>
<script type="text/javascript" src="<?= \yii\helpers\Url::to('@web/js/even.js')?>"></script>
<script type="text/javascript" src="<?= \yii\helpers\Url::to('@web/js/bootstrap.js')?>"></script>

</body>
</html>

