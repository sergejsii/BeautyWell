<?php
/**
 * Created by PhpStorm.
 * User: atkaz
 * Date: 10.03.2015
 * Time: 14:05
 */

namespace frontend\controllers;
use yii\base\Controller;
use mdm\admin\components\AccessControl;

class FrontendController extends Controller {

    public function behaviors()
    {
        return [];
//        return [
//            'access' => [
//                'class' => AccessControl::className()
//            ],
//        ];
    }
}