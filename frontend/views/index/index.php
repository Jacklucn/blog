<div class="content-wrapper">
    <div id="content" class="content">
        <section id="posts" class="posts">
            <?php foreach ($list as $article): ?>
                <article class="post">
                    <header class="post-header">
                        <h1 class="post-title">
                            <a class="post-link"
                               href="<?= \yii\helpers\Url::toRoute(['index/article', 'id' => $article->id]) ?>"><?= $article->title ?></a>
                        </h1>
                        <div class="post-meta">
                                <span class="post-time">
                                    <?= date('Y-m-d H:i:s', $article->created_at) ?>
                                </span>
                            <div class="post-category">
                                <a href="#">
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
                        <?= $article->summary ?>
                        <?php if ($article->cover_image): ?>
                            <p style="text-align: center"><img src="<?= $article->cover_image ?>"></p>
                        <?php endif; ?>
                        <div class="read-more">
                            <a href="<?= \yii\helpers\Url::toRoute(['index/article', 'id' => $article->id]) ?>" class="read-more-link">阅读更多</a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </section>

        <nav class="pagination">
            <?php if ($pages->page > 0): ?>
                <a class="prev" href="<?= \yii\helpers\Url::toRoute(['index/index', 'page' => $pages->page]) ?>">
                    <i class="iconfont icon-left"></i>
                    <span class="prev-text">上一页</span>
                </a>
            <?php endif; ?>
            <a class="next" href="<?= \yii\helpers\Url::toRoute(['index/index', 'page' => $pages->page + 2]) ?>">
                <span class="next-text">下一页</span>
                <i class="iconfont icon-right"></i>
            </a>
        </nav>

    </div>

</div>
