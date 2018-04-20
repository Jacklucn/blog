<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">分类列表</h1>
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
                    <i class="fa fa-table"></i> 分类列表
                </li>
            </ol>
            <form role="form" action="<?= \yii\helpers\Url::to(['admin/category']) ?>" method="post">
                <div class="form-group input-group">
                    <input name="_csrf-frontend" type="hidden" id="_csrf-frontend"
                           value="<?= Yii::$app->request->csrfToken ?>">
                    <input type="text" class="form-control" name="Category[name]" placeholder="请输入标签名字">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit" id="add-category">添加分类</button>
                    </span>
                </div>
            </form>
            <?= \common\widgets\Alert::widget() ?>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>name</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($list as $item): ?>
                        <tr>
                            <td><?= $item['id'] ?></td>
                            <td><?= $item['name'] ?></td>
                            <td><?= date("Y-m-d H:i:s", $item['created_at']) ?></td>
                            <td><?= date("Y-m-d H:i:s", $item['updated_at']) ?></td>
                            <td>
                                <a class="btn btn-default" onClick="delcfm('deleteTag?id={$list.id}')">
                                    删除
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="pagination">
                    <?= \yii\widgets\LinkPager::widget([

                        'pagination' => $pages,
                        'firstPageLabel' => '首页',
                        'lastPageLabel' => '尾页',
                        'hideOnSinglePage' => false,
                    ]); ?>
                </div>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->