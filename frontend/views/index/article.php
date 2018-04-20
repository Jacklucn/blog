<div class="content-wrapper">
    <div id="content" class="content">

        <article class="post">
            <header class="post-header">
                <h1 class="post-title">
                    <?=$article->title?>
                </h1>

                <div class="post-meta">
        <span class="post-time">
          2017-08-31
        </span>
                    <div class="post-category">
                        <a href="/categories/tool/">
                            <?php foreach ($article->category as $category): ?>
                                <?= $category->category_name->name . ' ' ?>
                            <?php endforeach; ?>
                        </a>
                    </div>

                    <div class="post-visits">
                        阅读次数 <?= $article->read_count ?>
                    </div>

                </div>
            </header>

            <div class="post-content">

                <p style="text-align: center"><img src="<?= $article['cover_image'] ?>" alt="Code Geass"></p>

                <?= $article['content'] ?>

                <!--            <div class="post-copyright">-->
                <!--                <p class="copyright-item">-->
                <!--                    <span>原文作者: </span>-->
                <!--                    <a href="http://www.ahonn.me">Ahonn</a>-->
                <!--                </p>-->
                <!--                <p class="copyright-item">-->
                <!--                    <span>原文链接: </span>-->
                <!--                    <a href="http://www.ahonn.me/2017/08/31/starting-from-scratch-mac/">http://www.ahonn.me/2017/08/31/starting-from-scratch-mac/</a>-->
                <!--                </p>-->
                <!--                <p class="copyright-item">-->
                <!--                    <span>许可协议: </span>-->
                <!---->
                <!--                    <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/" target="_blank">知识共享署名-非商业性使用-->
                <!--                        4.0 国际许可协议</a>-->
                <!--                </p>-->
                <!--            </div>-->

                <footer class="post-footer">

                    <!--                <div class="post-tags">-->
                    <!---->
                    <!--                    <a href="/tags/MacOS/">MacOS</a>-->
                    <!---->
                    <!--                    <a href="/tags/Chrome/">Chrome</a>-->
                    <!---->
                    <!--                </div>-->

                    <nav class="post-nav">
                        <?php if ($prev_article): ?>
                            <a class="prev"
                               href="<?= \yii\helpers\Url::toRoute(['index/article', 'id' => $prev_article['id']]) ?>">
                                <i class="iconfont icon-left"></i>
                                <span class="prev-text nav-default"><?= $prev_article['title'] ?></span>
                                <span class="prev-text nav-mobile">上一篇</span>
                            </a>
                        <?php endif; ?>
                        <a class="next"
                           href="<?= \yii\helpers\Url::toRoute(['index/article', 'id' => $next_article['id']]) ?>">
                            <span class="next-text nav-default"><?= $next_article['title'] ?></span>
                            <span class="prev-text nav-mobile">下一篇</span>
                            <i class="iconfont icon-right"></i>
                        </a>
                    </nav>
                </footer>
        </article>
    </div>

    <div class="comments" id="comments">

        <!--        <div id="disqus_thread">-->
        <!--            <noscript>-->
        <!--                Please enable JavaScript to view the-->
        <!--                <a href="//disqus.com/?ref_noscript">comments powered by Disqus.</a>-->
        <!--            </noscript>-->
        <!--        </div>-->

    </div>

</div>

