<link rel="stylesheet" href="<?= \yii\helpers\Url::to('@web/css/comment.css') ?>">
<link rel="stylesheet" href="<?= \yii\helpers\Url::to('@web/css/buttons.css') ?>">
<div class="content-wrapper">
    <div id="content" class="content">

        <article class="post">
            <header class="post-header">
                <h1 class="post-title">
                    <?= $article->title ?>
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

    <div class="comments" id="comments" style="border-top: 1px solid #e6e6e6;">
        <div class="comments">
            <div class="comment-wrap">
                <div class="comment-block">
                    <?php $form = \yii\bootstrap\ActiveForm::begin() ?>
                    <?= \yii\helpers\Html::activeHiddenInput($model,'article_id',['value' => $article->id]) ?>
                    <?= $form->field($model, 'nickname')->inline(true)->textInput(['class' => 'form-control'])->label('* Nickname') ?>
                    <?= $form->field($model, 'email')->textInput(['class' => 'form-control'])->label('* email') ?>
                    <?= $form->field($model, 'url')->textInput(['class' => 'form-control']) ?>
                    <?= $form->field($model, 'content')->textarea(['rows' => '4', 'cols' => '30'])->label('* content') ?>
                    <div class="form-group">
                        <input id="contact-submit" type="submit" value="submit"
                               class="button button-pill button-primary contact-submit">
                    </div>
                    <?php \yii\bootstrap\ActiveForm::end() ?>
                </div>
            </div>

            <?php if ($article->comments): ?>
                <?php foreach ($article->comments as $item): ?>
                    <div class="comment-wrap">
                        <div class="photo">
                            <div class="avatar"
                                 style="background-image: url(<?= 'http://www.gravatar.com/avatar/' . md5($item->email) . '?s=32' ?>)"></div>
                        </div>
                        <div class="comment-block">
                            <p class="comment-text"><?= $item->content ?></p>
                            <div class="bottom-comment">
                                <div class="comment-date"><?= date("F j, Y, g:i a", $item->created_at) ?></div>
                                <ul class="comment-actions">
                                    <li class="reply">Reply</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

    </div>

</div>

<script type="text/javascript" src="<?= \yii\helpers\Url::to('@web/js/jquery-3.1.1.min.js') ?>"></script>
<script type="application/javascript">
    /**
     * 弹出式提示框，默认1.2秒自动消失
     * @param message 提示信息
     * @param style 提示样式，有alert-success、alert-danger、alert-warning、alert-info
     * @param time 消失时间
     */
    var prompt = function (message, style, time) {
        style = (style === undefined) ? 'alert-success' : style;
        time = (time === undefined) ? 1500 : time;
        $('#alert')
            .appendTo('body')
            .addClass('alert ' + style)
            .html(message)
            .show()
            .delay(time)
            .fadeOut();
    };

    // 成功提示
    var success_prompt = function (message, time) {
        prompt(message, 'alert-success', time);
    };

    // 失败提示
    var fail_prompt = function (message, time) {
        prompt(message, 'alert-danger', time);
    };

    // 提醒
    var warning_prompt = function (message, time) {
        prompt(message, 'alert-warning', time);
    };

    // 信息提示
    var info_prompt = function (message, time) {
        prompt(message, 'alert-info', time);
    };
    $("#contact-submit").click(function () {
        if (!$("#contact-content").val()) {
            warning_prompt('Message不能为空');
            return false;
        }
        $.ajax({
            url: "<?= \yii\helpers\Url::to(['index/contact'])?>",
            type: "POST",
            dataType: "json",
            data: $('form').serialize(),
            success: function (data) {
                if (data.status) {
                    $("input.form-control").val("");
                    $("#contact-content").val("");
                    success_prompt('提交成功，我会尽快回复你。')
                } else {
                    fail_prompt('提交失败了！你还可以通过页面底部的邮箱和我取得联系。')
                }
            },
            error: function () {
                warning_prompt('不能提交空表单！')
            }
        });
        return false;
    })
</script>


