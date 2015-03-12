<?php
/**
 * Created by PhpStorm.
 * User: atkaz
 * Date: 10.03.2015
 * Time: 14:03
 */

namespace frontend\controllers;

use common\models\Profile;

class ProfileController extends \yii\web\Controller {


    public function actionIndex($q)
    {
        $user = Profile::find()->where(['firma'=>$q])->one();
        return $this->render('index',[
        'model'=>$user
            ]);

    }

}