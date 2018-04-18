<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">文章列表</h1>
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
                    <i class="fa fa-table"></i> 文章列表
                </li>
            </ol>
            <?= \common\widgets\Alert::widget() ?>
            <form role="form" action="#">
                <div class="form-group input-group">
                    <input type="text" class="form-control" name="key_word" placeholder="关键字">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
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
                        <th>title</th>
                        <th>cover_image</th>
                        <th>category</th>
                        <th>read_count</th>
                        <th>sort</th>
                        <th>status</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($list as $item): ?>
                        <tr>
                            <td><?= $item['id'] ?></td>
                            <td><?= $item['title'] ?></td>
                            <td><?= $item['cover_image'] ?></td>
                            <td>
                                <?php foreach ($item->category as $category): ?>
                                    <?= $category->category_name->name . ' ' ?>
                                <?php endforeach; ?>
                            </td>
                            <td><?= $item['read_count'] ?></td>
                            <td><?= $item['sort'] ?></td>
                            <td><?= $item['status'] ?></td>
                            <td><?= $item['created_at'] ?></td>
                            <td><?= $item['updated_at'] ?></td>
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

