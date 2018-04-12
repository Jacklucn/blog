<?php ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>

    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

    <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <meta name="description" content="记录成长，分享生活与技术的点滴"/>

    <meta name="keywords" content="Ahonn, Ahonn's Blog, 前端，JavaScript，Vim, 编程" />

    <?= \yii\helpers\Html::csrfMetaTags() ?>

    <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico?v=2.6.0" />

    <link rel="canonical" href="http://www.ahonn.me/"/>

    <link rel="stylesheet" type="text/css" href="<?= \yii\helpers\Url::to('@web/css/style.css') ?>" />

    <title> Jacklucn </title>
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
            <a href="/." class="logo">Jacklucn</a>
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
                <section id="posts" class="posts">

                    <article class="post">
                        <header class="post-header">
                            <h1 class="post-title">
                                <a class="post-link" href="/2017/12/29/my-2017/">我的 2017</a>
                            </h1>
                            <div class="post-meta">
                                <span class="post-time">
                                    2017-12-29
                                </span>
                                <div class="post-category">
                                    <a href="/categories/thinking/">思考总结</a>
                                </div>

                                <div class="post-visits"
                                     data-url="/2017/12/29/my-2017/"
                                     data-title="我的 2017">
                                    阅读次数
                                </div>

                            </div>
                        </header>

                        <div class="post-content">
                            <p>恍恍惚惚的，又一年过去了，又到了写年终总结的时间了。</p>
                            <h2 id="学习"><a href="#学习" class="headerlink" title="学习"></a>学习</h2><p>说到学习，这一年学到最多的是开始慢慢的脱离某些学生思维。开始全面的思考问题，对做什么事情都先有一个计划，而不是一股脑的做。就像是编程，应该大部分时间用来思考，而编码实现只是最后的一步操作。</p>
                            <p>开始慢慢的接触一些能够提升效率的工具或者方法，例如年初开始学 vim，虽然说写代码的时候效率的瓶颈并不在敲代码的速度上，但是 vim 的确对编程的体验提高不少。</p>
                            <p>下半年开始学着用番茄工作法管理时间，提高注意力。目前来说效果还不错，就是有时候番茄间的休息我还是继续在干自己的时候，这一点做得不是很好。毕竟代码一写起来并不是那么好停的。</p>
                            <p>虽然今年不是太关注 commit，但是依旧还是有着蛮多的记录的。写得比较随性，但是因为太久不写自己会觉得堕落，觉得好像少了点什么，所以总体也只是比去年少了那么一点。</p>
                            <p><img src="http://ouv0frko5.bkt.clouddn.com/blog/4w7l2.jpg" alt="2017 commit"></p>
                            <div class="read-more">
                                <a href="/2017/12/29/my-2017/" class="read-more-link">阅读更多</a>
                            </div>
                        </div>
                    </article>

                </section>

                <nav class="pagination">
                    <a class="next" href="/page/2/">
                        <span class="next-text">下一页</span>
                        <i class="iconfont icon-right"></i>
                    </a>
                </nav>

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

<script type="text/javascript" src="<?= \yii\helpers\Url::to('@web/js/jquery-3.1.1.min.js')?>"></script>
<script type="text/javascript" src="<?= \yii\helpers\Url::to('@web/js/slideout.js')?>"></script>
<script type="text/javascript" src="<?= \yii\helpers\Url::to('@web/js/even.js')?>"></script>
<script type="text/javascript" src="<?= \yii\helpers\Url::to('@web/js/bootstrap.js')?>"></script>

</body>
</html>
