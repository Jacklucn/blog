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

            <form role="form" action="{:U('Index/addMaster')}" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label>文章标题:</label>
                    <input class="form-control" name="master_name" placeholder="">
                </div>

                <div class="form-group">
                    <label>文章摘要:</label>
                    <input class="form-control" name="first_pinyin" placeholder="">
                </div>

                <div class="form-group">
                    <label>排序:</label>
                    <input class="form-control" name="sort" placeholder="排序规则1-99 小的在前面（不填则默认99）" type="number"
                           value="99" onfocus="if(value == 99){value = ''}"
                           onblur="if(value < 1 || value > 99){value = 99}">
                </div>

                <div class="form-group">
                    <label>请选择分类:</label><br>
                    <foreach name="tag_lists" item="list">
                        <label class="checkbox-inline">
                            <input type="checkbox" value="{$list.id}" name="tag_id[]">{$list.tag_name}
                        </label>
                    </foreach>
                </div>

                <div class="form-group">
                    <label>文章内容:</label>
                    <textarea id="editor" placeholder="Balabala" data-autosave="editor-content"
                              class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label>请选择封面图:</label>
                    <input type="file" name="cover_image">
                </div>

                <button type="submit" class="btn btn-primary">确认提交</button>

            </form>

        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
