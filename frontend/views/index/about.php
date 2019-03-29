<link rel="stylesheet" href="<?= \yii\helpers\Url::to('@web/css/comment.css') ?>">
<link rel="stylesheet" href="<?= \yii\helpers\Url::to('@web/css/buttons.css') ?>">
<div class="content-wrapper">
    <div id="content" class="content">

        <article class="post">
            <div class="post-content">
                <h1 id="关于我"><a href="#关于我" class="headerlink" title="关于我"></a>ABOUT ME</h1>
                <p>游戏玩家 自行车运动爱好者 </p>
                <p>后端开发</p>
                <!--                <p>PHP、JavaScript、Ruby on Rails、MySQL、Redis、memcached、Nginx、Apache、 macOS、Ubuntu</p>-->
                <p>你可以通过下面的表单和我取得联系</p>
                <h1 id="关于我"><a href="#关于我" class="headerlink" title="关于我"></a>ABOUT BLOG</h1>
                <p>Yii2框架 </p>
                <p>源代码在这里 <a href="https://github.com/Jacklucn/blog" target="_blank" rel="noopener">@jacklucn/blog</a>
                </p>
                <p>页面是在这里抠的 <a href="http://www.ahonn.me/" target="_blank" rel="noopener">@ahonn</a></p>
                <h2 id="其他地方"><a href="#其他地方" class="headerlink" title="其他地方"></a>FIND ME IN OTHER PLACES</h2>
                <ul>
                    <li>Github: <a href="https://github.com/jacklucn" target="_blank" rel="noopener">@jacklucn</a></li>
                </ul>

            </div>
        </article>
    </div>

    <div class="comments" id="comments" style="border-top: 1px solid #e6e6e6;padding-top: 30px">
        <div style="margin-bottom: 2%">
            <span>Your email address will not be published. Required fields are marked *</span>
        </div>
        <div id="alert" class="alert"></div>
        <div class="comment-wrap">
            <div class="comment-block">
                <?php $form = \yii\bootstrap\ActiveForm::begin([
                    'action' => \yii\helpers\Url::to(['index/contact']),
                    'enableAjaxValidation' => true,
                    'validationUrl' => \yii\helpers\Url::to(['index/contact-validate'])
                ]) ?>
                <?= $form->field($model, 'nickname')->inline(true)->textInput(['class' => 'form-control'])->label('Nickname *') ?>
                <?= $form->field($model, 'email')->textInput(['class' => 'form-control'])->label('Email *') ?>
                <?= $form->field($model, 'url')->textInput(['class' => 'form-control']) ?>
                <?= $form->field($model, 'content')->textarea(['rows' => '4', 'cols' => '30'])->label('Message *') ?>
                <div class="form-group">
                    <input id="contact-submit" type="submit" value="contact"
                           class="button button-pill button-primary contact-submit">
                </div>
                <?php \yii\bootstrap\ActiveForm::end() ?>
            </div>
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
        if(!$("#contact-content").val()){
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


