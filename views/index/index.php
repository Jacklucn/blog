<?php
$this->title = 'Jacklucn';
?>

<div class="row" style="width: 100%;height: 800px;background-color: #e5e5e5">
    <div class="col-lg-1" style="height: 800px"></div>
    <div class="col-lg-10" style="background-color: #272727;height: 800px"></div>
    <div class="col-lg-1" style="height: 800px"></div>
</div>

<?php
echo \yii\widgets\LinkPager::widget([
    'pagination' => $pagination
])
?>

