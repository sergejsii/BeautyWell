<?php
namespace common\models;

use Yii;
use yii\base\Model;
use dektrium\user\models\LoginForm as BaseLoginForm;
/**
 * Login form
 */
class LoginForm extends BaseLoginForm
{
    /** @inheritdoc
     * Anpassung, so dass das Einloggen nur mithilfe der Email-Addresse gehen wird.
     */

    public function beforeValidate()
    {
        if (\yii\base\Model::beforeValidate()) {
            $this->user = $this->finder->findUserByUsername($this->login);
            return true;
        } else {
            return false;
        }
    }
}
