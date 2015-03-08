<?php

namespace common\models;

use Yii;
use dektrium\user\models\Profile as BaseProfile;

/**
 * This is the model class for table "profile".
 *
 * @property integer $user_id
 * @property string $name
 * @property string $public_email
 * @property string $gravatar_email
 * @property string $gravatar_id
 * @property string $location
 * @property string $website
 * @property string $bio
 * @property string $anrede
 * @property string $firma
 *
 * @property User $user
 */
class Profile extends BaseProfile
{

}
