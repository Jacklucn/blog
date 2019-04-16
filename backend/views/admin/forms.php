<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">发布文章</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">

            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <a href="<?= \yii\helpers\Url::to(['admin/index']) ?>">首页</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit fa-fw"></i> 发布文章
                </li>
            </ol>

            <?= \common\widgets\Alert::widget() ?>
            <?php $form = \yii\bootstrap\ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
            <?php if ($article) : ?>
                <?= $form->field($model, 'title')->textInput(['class' => 'form-control', 'value' => $article['title']])->label('文章标题:') ?>
                <?= $form->field($model, 'year')->hiddenInput(['value' => date('Y', time())])->label(false) ?>
                <?= $form->field($model, 'id')->hiddenInput(['value' => $article['id']])->label(false) ?>
                <?= $form->field($model, 'summary')->textInput(['class' => 'form-control', 'value' => $article['summary']])->label('文章摘要:') ?>
                <?= $form->field($model, 'sort')->textInput(['class' => 'form-control', 'type' => 'number', 'value' => $article['sort']])->label('排序（排序规则1-99，小的在前面，不填则默认99）:') ?>
                <div class="form-group">
                    <label>请选择分类:</label><br>
                    <?php $ids = array_column($article->categoryIds, 'category_id'); ?>
                    <?php foreach ($category_list as $item) : ?>
                        <label class="checkbox-inline">
                            <?php if (in_array($item['id'], $ids)) { ?>
                                <input type="checkbox" value="<?= $item['id'] ?>"
                                       name="category_ids[]" checked="checked"><?= $item['name'] ?>
                            <?php } else { ?>
                                <input type="checkbox" value="<?= $item['id'] ?>"
                                       name="category_ids[]"><?= $item['name'] ?>
                            <?php } ?>
                        </label>
                    <?php endforeach; ?>
                </div>

                <div class="form-group">
                    <label>文章内容:</label>
                    <textarea id="editor" placeholder="Balabala" data-autosave="editor-content" class="form-control"
                              name="Article[content]"><?= $article['content'] ?></textarea>
                </div>
            <?php else: ?>
                <?= $form->field($model, 'title')->textInput(['class' => 'form-control'])->label('文章标题:') ?>
                <?= $form->field($model, 'year')->hiddenInput(['value' => date('Y', time())])->label(false) ?>
                <?= $form->field($model, 'summary')->textInput(['class' => 'form-control'])->label('文章摘要:') ?>
                <?= $form->field($model, 'id')->hiddenInput(['value' => 0])->label(false) ?>
                <?= $form->field($model, 'sort')->textInput(['class' => 'form-control', 'type' => 'number', 'value' => 99])->label('排序（排序规则1-99，小的在前面，不填则默认99）:') ?>
                <div class="form-group">
                    <label>请选择分类:</label><br>
                    <?php foreach ($category_list as $item) : ?>
                        <label class="checkbox-inline">
                            <input type="checkbox" value="<?= $item['id'] ?>" name="category_ids[]"><?= $item['name'] ?>
                        </label>
                    <?php endforeach; ?>
                </div>

                <div class="form-group">
                    <label>文章内容:</label>
                    <textarea id="editor" placeholder="Balabala" data-autosave="editor-content" class="form-control"
                              name="Article[content]"></textarea>
                </div>
            <?php endif; ?>
            <?= \yii\helpers\Html::submitInput('确认提交', ['class' => 'btn btn-primary', 'style' => ['margin-bottom' => '5%']]) ?>
            <?php \yii\bootstrap\ActiveForm::end() ?>

        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
