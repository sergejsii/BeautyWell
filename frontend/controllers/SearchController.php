<?php

namespace frontend\controllers;

use common\models\UserAddress;
use yii\data\ActiveDataProvider;
use common\models\Category;

class SearchController extends \yii\web\Controller
{
    public function actionIndex($q)
    {
        $categories = Category::find()->asArray()->all();
        $dataProvider = new ActiveDataProvider([
            'query' => UserAddress::find()->where(['like', 'ort', trim(preg_replace(["/deutschland/i", '/,/i'], ['', ''], $q))]),
            'pagination' => [
                'pageSize' => 4
            ]]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'categories' => $categories
        ]);

    }
}