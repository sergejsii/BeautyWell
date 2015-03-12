<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace common\models;

use dektrium\user\Module;
use yii\base\Model;
use common\helpers\GeoHelper;

/**
 * Registration form collects user input on registration process, validates it and creates new User model.
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class RegistrationForm extends Model
{
    /**
     * @var string
     */
    public $anrede;

    /** @var string */
    public $email;

    /** @var string */
    public $username;

    /** @var string */
    public $password;

    /** @var string */
    public $passwordCompare;

    /**
     * @var string
     */
    public $firma;
    /**
     * @var string
     */
    public $adresse;

    /** @var string */
    public $strasse;

    /** @var string */
    public $ort;

    /** @var integer */
    public $plz;

    /**
     * @var string
     */
    public $tel;

    /**
     * @var string
     */
    public $fax;


    /** @var integer */
    public $land;

    /**
     * @var string
     */
    public $agb;

    /**
     * @var string
     */
    public $newsletter;


    /** @var User */
    protected $user;



    /**
     * @var int
     */
    public $lat;

    /**
     * @var int
     */
    public $lng;

    /** @var Module */
    protected $module;



    /** @inheritdoc */
    public function init()
    {
        $this->user = \Yii::createObject([
            'class'    => User::className(),
            'scenario' => 'register'
        ]);
        $this->module = \Yii::$app->getModule('user');
    }

    /** @inheritdoc */
    public function rules()
    {
        return [
            //Persönliche Angaben
            [['anrede','firma'],'required'],
            //Firmenname

            ['firma', 'filter', 'filter' => 'trim'],
            ['firma', 'required'],
            ['firma', 'unique', 'targetClass' => $this->module->modelMap['Profile'],
                'message' => \Yii::t('user', 'This companyname has already been taken')],

            // Benutzerangaben
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'match', 'pattern' => '/^[a-zA-Z]\w+$/'],
            ['username', 'required'],
//            ['username', 'unique', 'targetClass' => $this->module->modelMap['User'],
//                'message' => \Yii::t('user', 'This username has already been taken')],
            ['username', 'string', 'min' => 3, 'max' => 20],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => $this->module->modelMap['User'],
                'message' => \Yii::t('user', 'This email address has already been taken')],

            ['password', 'required', 'skipOnEmpty' => $this->module->enableGeneratingPassword],
            ['password', 'string', 'min' => 6],
            ['passwordCompare', 'string', 'min' => 6],
            ['passwordCompare', 'compare', 'compareAttribute' => 'password'],
            //Adresse
            ['strasse','required'],
            ['plz','required'],
            ['plz','integer'],
            ['ort','required'],

            ['agb','required','requiredValue' => 1,'message'=>'Sie müssen die AGB bestättigen.'],

    //            ['adresse','required'],
    //            ['adresse','addressRule'],
        ];
    }

    /** @inheritdoc */
    public function attributeLabels()
    {
        return [
            'anrede' =>\Yii::t('user', 'Anrede'),
            'firma' =>\Yii::t('user', 'Firma/ Unternehmen*'),
            'agb' =>\Yii::t('user', 'AGB'),
            'email'    => \Yii::t('user', 'Ihre E-Mail-Adresse *:'),
            'username' => \Yii::t('user', 'Username'),
            'password' => \Yii::t('user', 'Password*'),
            'strasse' => \Yii::t('user', 'Strasse'),
            'ort' => \Yii::t('user', 'Ort'),
            'plz' => \Yii::t('user', 'PLZ'),
            'tel' => \Yii::t('user', 'Telefon'),
            'fax' => \Yii::t('user', 'Fax'),
            'land' => \Yii::t('user', 'Land'),

        ];
    }

    /** @inheritdoc */
    public function formName()
    {
        return 'register-form';
    }

    /**
     * Überprüfung der Addresse
     */
    public function addressRule(){
        $geoData = GeoHelper::getGeoData($this->adresse);

        if($geoData == false){

            $this->addError('adresse',  'Bitte überprüfen Sie die eingegebene Adresse.');
        }
        else{
           $this->lat = $geoData['lat'];
            $this->lng = $geoData['lng'];
        };
    }

    /**
     * Registers a new user account.
     * @return bool
     */
    public function register()
    {
        if (!$this->validate()) {
            return false;
        }

        $this->user->setAttributes([
            'email'    => $this->email,
            'username' => $this->username,
            'password' => $this->password,
//
        ]);
        $this->user->anrede = $this->anrede;
        $this->user->firma = $this->firma;
        $this->user->tel = $this->tel;
        $this->user->fax = $this->fax;
//        $this->user->lat = $this->lat;
//        $this->user->lng = $this->lng;
        $this->user->strasse = $this->strasse;
        $this->user->ort = $this->ort;
        $this->user->plz = $this->plz;
        $this->user->land = $this->land;

        return $this->user->register();
    }

    /**
     * get gender options
     */
    public function getGenderOptions(){
        return [
          'herr' => 'Herr',
          'frau' => 'Frau'
        ];
    }
}