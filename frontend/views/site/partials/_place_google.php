<?php
use yii\helpers\Html;

?>

    <div class="place-create">

        <h1><?= Html::encode($this->title) ?></h1>
        <?= $this->render('_searchForm', [
//            'model' => $model,
        ]) ?>

    </div>

<?

$gpJsLink= 'http://maps.googleapis.com/maps/api/js?'. http_build_query(array(
        'libraries' => 'places',
        'sensor' => 'false',
    ));
$this->registerJsFile($gpJsLink);

$options = '{"types":["establishment"],"componentRestrictions":{"country":"us"}}';
$this->registerJs("(function(){
        var input = document.getElementById('place-searchbox');
        var options = $options;        
        searchbox = new google.maps.places.Autocomplete(input, options);
        setupListeners();
})();" , \yii\web\View::POS_END );

?>