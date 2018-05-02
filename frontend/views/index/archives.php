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

        </section>
        <nav class="pagination">
        </nav>
    </div>
</div>

