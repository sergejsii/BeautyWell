<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>

<div class="row">
    <div class="col-sm-3">
        <?= Html::img('http://placehold.it/200x210')?>
    </div>
    <div class="col-sm-6">
        <h3><?= $model->user->username?></h3>
        <div class="icons">
            <i class="fa fa-user">Frau Marin </i>

        </div>
        <span class="beschreibung">
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
            diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
            At vero eos et accusam et justo duo dolores et ea
        </span>
    </div>
</div>

