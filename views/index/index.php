<?php
$this->title = 'Jacklucn';
?>

<style type="text/css">

    body {
        background-color: #e6e6e6;
        font-family: "Open Sans", Helvetica, Arial, sans-serif;
    }

    .body {
        background-color: #ffffff;
        margin-top: 2.5%;
        margin-bottom: 3%;
        box-shadow: 5px 5px 5px 5px #888888;
        padding: 1% 1.5%;
    }

    .post-preview > a:hover, .post-preview > a:focus {
        text-decoration: none;
        text-decoration-line: none;
        text-decoration-style: initial;
        text-decoration-color: initial;
        color: #0085A1;
    }

    .post-preview > hr {
        border-top: 1px solid black;
        border-bottom: 1px solid black;
    }

    .post-preview > a {
        color: #333333;
    }

    .footer-hr {
        border-top: 1px solid white;
    }

</style>
<div class="site-index">

    <div class="container">

        <div class="row content">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2" style="background-color: white">

                <div class="post-preview">
                    <a href="#">
                        <h2 class="post-title">
                            title
                        </h2>
                        <h3 class="post-subtitle">
                            summary
                        </h3>
                    </a>
                    <div class="row">
                        <div class="col-xs-8 col-md-8">
                            <a href="javascript:;" class="thumbnail">
                                <img
                                    src="https://makluz.com/wp-content/uploads/2017/01/10809953_532930616842189_278370512_n1485042504.jpg"
                                    alt="...">
                            </a>
                        </div>
                    </div>
                    <p class="post-meta">Posted by <a href="#">Jacklucn</a>
                        on created_at|date="Y-m-d",###
                    </p>
                </div>
                <hr>
                <!--post end-->

                <div class="post-preview">
                    <a href="#">
                        <h2 class="post-title">
                            title
                        </h2>
                        <h3 class="post-subtitle">
                            summary
                        </h3>
                    </a>
                    <div class="row">
                        <div class="col-xs-8 col-md-8">
                            <a href="javascript:;" class="thumbnail">
                                <img
                                    src="https://makluz.com/wp-content/uploads/2017/01/10809953_532930616842189_278370512_n1485042504.jpg"
                                    alt="...">
                            </a>
                        </div>
                    </div>
                    <p class="post-meta">Posted by <a href="#">Jacklucn</a>
                        on created_at|date="Y-m-d",###
                    </p>
                </div>
                <hr>
                <!--post end-->

                <div class="post-preview">
                    <a href="#">
                        <h2 class="post-title">
                            title
                        </h2>
                        <h3 class="post-subtitle">
                            summary
                        </h3>
                    </a>
                    <div class="row">
                        <div class="col-xs-8 col-md-8">
                            <a href="javascript:;" class="thumbnail">
                                <img
                                    src="https://makluz.com/wp-content/uploads/2017/01/10809953_532930616842189_278370512_n1485042504.jpg"
                                    alt="...">
                            </a>
                        </div>
                    </div>
                    <p class="post-meta">Posted by <a href="#">Jacklucn</a>
                        on created_at|date="Y-m-d",###
                    </p>
                </div>
                <hr>
                <!--post end-->

                <div class="post-preview">
                    <a href="#">
                        <h2 class="post-title">
                            title
                        </h2>
                        <h3 class="post-subtitle">
                            summary
                        </h3>
                    </a>
                    <div class="row">
                        <div class="col-xs-8 col-md-8">
                            <a href="javascript:;" class="thumbnail">
                                <img
                                    src="https://makluz.com/wp-content/uploads/2017/01/10809953_532930616842189_278370512_n1485042504.jpg"
                                    alt="...">
                            </a>
                        </div>
                    </div>
                    <p class="post-meta">Posted by <a href="#">Jacklucn</a>
                        on created_at|date="Y-m-d",###
                    </p>
                </div>
                <hr>
                <!--post end-->

                <div class="post-preview">
                    <a href="#">
                        <h2 class="post-title">
                            title
                        </h2>
                        <h3 class="post-subtitle">
                            summary
                        </h3>
                    </a>
                    <div class="row">
                        <div class="col-xs-8 col-md-8">
                            <a href="javascript:;" class="thumbnail">
                                <img
                                    src="https://makluz.com/wp-content/uploads/2017/01/10809953_532930616842189_278370512_n1485042504.jpg"
                                    alt="...">
                            </a>
                        </div>
                    </div>
                    <p class="post-meta">Posted by <a href="#">Jacklucn</a>
                        on created_at|date="Y-m-d",###
                    </p>
                </div>
                <hr>
                <!--post end-->

                <?php
                echo \yii\widgets\LinkPager::widget([
                    'pagination' => $pagination
                ])
                ?>

            </div>
        </div>
        <!--content end-->

    </div>
    <!--container end-->

    <hr class="footer-hr">

</div>