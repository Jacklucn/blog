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

            <?php $form = \yii\widgets\ActiveForm::begin([
                'options' => [
                    'class' => 'form-horizontal',
                ],
                'fieldConfig' => [
//            'template' => "<div class='row'><div class='col-lg-1 text-right text-fixed'>{label}</div><div class='col-lg-9'>{input}</div><div class='col-lg-2 errors'>{error}</div></div>",
                ]
            ]); ?>

            <?= $form->field($model, 'image_id')->hiddenInput()->label(false); ?>

            <?= $form->field($upload, 'imageFile')->widget(\kartik\file\FileInput::class, [
                'options' => [
                    'accept' => 'images/*',
                    'module' => 'Goods',
                    'multipe' => false,
                ],
                'pluginOptions' => [
                    // 异步上传的接口地址设置
                    'uploadUrl' => \yii\helpers\Url::to(['upload']),
                    'uploadAsync' => true,
                    // 异步上传需要携带的其他参数，比如商品id等,可选
                    'uploadExtraData' => [
                        'model' => 'goods'
                    ],
                    // 需要预览的文件格式
                    'previewFileType' => 'image',
                    // 预览的文件
                    'initialPreview' => $p1 ?: '',
                    // 需要展示的图片设置，比如图片的宽度等
                    'initialPreviewConfig' => $p2 ?: '',
                    // 是否展示预览图
                    'initialPreviewAsData' => true,
                    // 最少上传的文件个数限制
                    'minFileCount' => 1,
                    // 最多上传的文件个数限制,需要配置`'multipe'=>true`才生效
                    'maxFileCount' => 10,
                    // 是否显示移除按钮，指input上面的移除按钮，非具体图片上的移除按钮
                    'showRemove' => false,
                    // 是否显示上传按钮，指input上面的上传按钮，非具体图片上的上传按钮
                    'showUpload' => true,
                    //是否显示[选择]按钮,指input上面的[选择]按钮,非具体图片上的上传按钮
                    'showBrowse' => true,
                    // 展示图片区域是否可点击选择多文件
                    'browseOnZoneClick' => true,
                    // 如果要设置具体图片上的移除、上传和展示按钮，需要设置该选项
                    'fileActionSettings' => [
                        // 设置具体图片的查看属性为false,默认为true
                        'showZoom' => true,
                        // 设置具体图片的上传属性为true,默认为true
                        'showUpload' => true,
                        // 设置具体图片的移除属性为true,默认为true
                        'showRemove' => true,
                    ],
                ],
                //网上很多地方都没详细说明回调触发事件，其实fileupload为上传成功后触发的，三个参数，主要是第二个，有formData，jqXHR以及response参数，上传成功后返回的ajax数据可以在response获取
                'pluginEvents' => [
                    'fileuploaded' => "function (object,data){ 
				$('.field-goods-name').show().find('input').val(data.response.imageId);
			}",
                    //错误的冗余机制
                    'error' => "function (){
				alert('图片上传失败');
			}"
                ]
            ]); ?>


            <div class="form-group">
                <?= \yii\helpers\Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php \yii\widgets\ActiveForm::end(); ?>

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
