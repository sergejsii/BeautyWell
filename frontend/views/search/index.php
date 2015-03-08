<?php
use yii\widgets\ListView;
/* @var $this yii\web\View */
?>
 <div class="row">
        <div class="col col-sm-2">
            Filter
        </div>
        <div class="col col-sm-10">
            <?php
            echo ListView::widget([
                'dataProvider' =>$dataProvider,
                'itemView' => '_partials/_search_list',
                'itemOptions'=>['class'=>'search_item']
            ]);
            ?>
        </div>
 </div>