<div class="content-wrapper">
    <div id="content" class="content">

        <section id="archive" class="archive">

            <div class="archive-title">
                <span class="archive-post-counter">
                    目前共计 56 篇日志
                </span>
            </div>

            <?php foreach ($years as $item): ?>
                <div class="collection-title">
                    <h2 class="archive-year"><?= $item->year ?></h2>
                </div>
                <?php
                $model = new \common\models\Article();
                $list = $model::find()
                    ->select('id,title,created_at')
                    ->where(['status' => 1, 'year' => $item->year])
                    ->orderBy(['created_at' => SORT_DESC])
                    ->all();
                ?>
                <?php foreach ($list as $item):?>
                    <div class="archive-post">
                    <span class="archive-post-time">
                        <?=date('m-d',$item->created_at)?>
                    </span>
                        <span class="archive-post-title">
                        <a href="<?= \yii\helpers\Url::toRoute(['index/article', 'id' => $item->id]) ?>" class="archive-post-link">
                            <?=$item->title?>
                        </a>
                    </span>
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>

            <!--            <div class="collection-title">-->
            <!--                <h2 class="archive-year">2016</h2>-->
            <!--            </div>-->
            <!---->
            <!--            <div class="archive-post">-->
            <!--                <span class="archive-post-time">-->
            <!--                    12-15-->
            <!--                </span>-->
            <!--                <span class="archive-post-title">-->
            <!--                    <a href="/2016/12/15/create-a-hexo-theme-from-scratch/" class="archive-post-link">-->
            <!--                        从零开始制作 Hexo 主题-->
            <!--                    </a>-->
            <!--                </span>-->
            <!--            </div>-->
            <!---->
            <!--            <div class="collection-title">-->
            <!--                <h2 class="archive-year">2015</h2>-->
            <!--            </div>-->
            <!---->
            <!---->
            <!--            <div class="archive-post">-->
            <!--                <span class="archive-post-time">-->
            <!--                    12-31-->
            <!--                </span>-->
            <!--                <span class="archive-post-title">-->
            <!--                    <a href="/2015/12/31/2015-summary/" class="archive-post-link">-->
            <!--                        2015 总结-->
            <!--                    </a>-->
            <!--                </span>-->
            <!--            </div>-->
            <!---->
            <!--            <div class="archive-post">-->
            <!--                <span class="archive-post-time">-->
            <!--                    12-21-->
            <!--                </span>-->
            <!--                <span class="archive-post-title">-->
            <!--                    <a href="/2015/12/21/how-can-i-prevent-sql-injection-in-php/" class="archive-post-link">-->
            <!--                        在 PHP 中如何预防 SQL 注入-->
            <!--                    </a>-->
            <!--                </span>-->
            <!--            </div>-->

        </section>
        <nav class="pagination">
        </nav>
    </div>
</div>

