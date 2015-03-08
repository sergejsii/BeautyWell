<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use PetraBarus\Yii2\GooglePlacesAutoComplete\GooglePlacesAutoComplete;

/**
 * @var yii\web\View $this
 * @var dektrium\user\models\User $user
 * @var dektrium\user\Module $module
 */
$this->title = Yii::t('user', 'Sign up');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">REGISTRIEREN</h3>
        </div>
    <?php $form = ActiveForm::begin([
        'id' => 'registration-form',
        'enableAjaxValidation' => true,
        'enableClientValidation' => false,
        'options' => ['class' => 'comment-form']
    ]); ?>
    <div class="col col-md-8">
        <p>
            Melden Sie sich hier an, wenn Sie ein Veranstalter von Märkten sind und diese in
            unser Verzeichnis eintragen möchten! Felder mit einem * sind Pflichtfelder.
        </p>

        <div class="row">
            <div class="col col-sm-6">
                <?= $form->field($model, 'anrede')->dropDownList($model->getGenderOptions()) ?>
                <?= $form->field($model, 'username') ?>
                <?php if ($module->enableGeneratingPassword == false): ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                    <?= $form->field($model, 'passwordCompare')->passwordInput() ?>

                <?php endif ?>

            </div>
            <div class="col col-sm-6">
                <?= $form->field($model, 'firma') ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'strasse') ?>
                <div class="row">
                    <div class="col col-sm-3">   <?= $form->field($model, 'plz') ?></div>
                    <div class="col col-sm-9">   <?= $form->field($model, 'ort') ?></div>
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12">
                    <?= $form->field($model, 'agb', [
                        'template' => "<div class='row'> <div class=\"col-xs-1\">{input}</div>\n<div class=\"col-xs-10\">{label}\n{error}</div></div>",
                    ])->checkbox(['label'=>''])->label('Ja, ich habe die AGB gelesen*') ?>

                    <?= $form->field($model, 'newsletter', [
                        'template' => "<div class='row'> <div class=\"col-xs-1\">{input}</div>\n<div class=\"col-xs-10\">{label}{error}</div></div>",
                    ])->checkbox(['label'=>''])->label('Ja, ich möchte den Veranstalter-Newsletter abonnieren') ?>
                </div>
            </div>
        </div>
        <div class="row text-right">
            <div class="col col-xs-12">
                <?= Html::submitButton(Yii::t('user', 'Jetzt Registrieren'), ['class' => 'btn btn-default btn-block text-right']) ?>
            </div>
        </div>
    </div>
    <div class="col col-sm-4">
        <h3>
            Warum sollten Sie sich registrieren?
        </h3>

        <p>
            We are excited to launch our new company and product Ooooh.
            After being featured in too many magazines to mention and having created
            an online stir, we know that Ooooh is going to be big.
        </p>

        <p>Vorteile für Unternehmen</p>
        <ul class="feature">
            <li>to develop your skills</li>
            <li>to empower you to feel more confident</li>
            <li>to enable you to maintain changes.</li>
        </ul>
        <?php ActiveForm::end(); ?>
    </div>

    </div>
</div>