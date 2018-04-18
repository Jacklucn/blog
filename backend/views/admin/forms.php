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
            <?php $form = \yii\bootstrap\ActiveForm::begin() ?>
            <?= $form->field($model, 'title')->textInput(['class' => 'form-control'])->label('文章标题:') ?>
            <?= $form->field($model, 'summary')->textInput(['class' => 'form-control'])->label('文章摘要:') ?>
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

            <div class="form-group">
                <label>请选择封面图:</label>
                <input type="file" name="cover_image">
            </div>

            <button type="submit" class="btn btn-primary">确认提交</button>
            <?php \yii\bootstrap\ActiveForm::end() ?>

        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
