<?php

use yii\helpers\Html;
use yii\helpers\BaseHtml;
use yii\widgets\ActiveForm;
use frontend\assets\MapAsset;


MapAsset::register($this);

/* @var $this yii\web\View */
/* @var $model frontend\models\Place */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-md-6">

    <div class="placegoogle-form">
        <p>Type in a place or business known to Google Places:</p>

        <?php $form = ActiveForm::begin(); ?>
        <input name="searchbox" type="text" size="30" maxlength="255" >

        <?php ActiveForm::end(); ?>

    </div>
</div> <!-- end col1 -->
<div class="col-md-6">
    <div id="map-canvas">
        <article></article>
    </div>
</div> <!-- end col2 -->