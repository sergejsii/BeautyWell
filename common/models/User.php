<?php

namespace common\models;

use Yii;
use common\models\UserAddress;
use dektrium\user\models\Profile;
use dektrium\user\models\User as BaseUser;
/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password_hash
 * @property string $auth_key
 * @property integer $confirmed_at
 * @property string $unconfirmed_email
 * @property integer $blocked_at
 * @property string $registration_ip
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $flags
 *
 * @property Article[] $articles
 * @property Profile $profile
 * @property SocialAccount[] $socialAccounts
 * @property Token[] $tokens
 * @property UserAddress $userAddress
 */
class User extends BaseUser
{
    /**
     * @var string
     */
    public $anrede;

    /**
     * @var string
     */
    public $firma;

    /**
     * @var string
     */
    public $strasse;

    /**
     * @var string
     */
    public $ort;

    /**
     * @var integer
     */
    public $plz;

    /**
     * @var integer
     */
    public $lat;

    /**
     * @var integer
     */
    public $lng;

    /**
     * @var string
     */
    public $land;

     /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocialAccounts()
    {
        return $this->hasMany(SocialAccount::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTokens()
    {
        return $this->hasMany(Token::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserAddress()
    {
        return $this->hasOne(UserAddress::className(), ['user_id' => 'id']);
    }

    /** @inheritdoc */
    public function afterSave($insert, $changedAttributes)
    {
        if ($insert) {
            $profile = \Yii::createObject([
                'class'          => Profile::className(),
                'user_id'        => $this->id,
                'anrede' => $this->anrede,
                'firma' => $this->firma,
                'gravatar_email' => $this->email,
            ]);
            $profile->save(false);

            $user_address = \Yii::createObject([
                'class'          => UserAddress::className(),
                'user_id'        => $this->id,
                'strasse'        => $this->strasse,
                'ort' => $this->ort,
                'plz' => $this->plz,
                'land' => $this->land,
//                'lng' => $this->lng,
//                'lat' => $this->lat,
            ]);
            $user_address->save(false);
        }
       //BaseUser::parent->afterSave($insert, $changedAttributes);

        //parent::afterSave($insert, $changedAttributes). '-level 3';;
    }
}
