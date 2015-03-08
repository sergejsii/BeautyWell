<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_address".
 *
 * @property integer $user_id
 * @property string $strasse
 * @property string $ort
 * @property integer $plz
 * @property string $land
 * @property string $lat
 * @property string $lng
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property User $user
 */
class UserAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['strasse', 'ort', 'plz', 'lat', 'lng', 'created_at', 'updated_at'], 'required'],
            [['plz', 'created_at', 'updated_at'], 'integer'],
            [['strasse', 'ort', 'land', 'lat', 'lng'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'strasse' => 'Strasse',
            'ort' => 'Ort',
            'plz' => 'Plz',
            'land' => 'Land',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
