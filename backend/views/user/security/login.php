<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use dektrium\user\widgets\Connect;
use yii\helpers\Url;
?>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">LOGIN / REGISTRIEREN</h3>
        </div>
        <div class="panel-body">

            <div class="col col-sm-12">
                <h4>Login</h4>
                <p>
                    Geben Sie hier Ihre Zugangsdaten ein, um den Zugriff auf Ihr persönliches Menü und Ihre
                    Veranstaltungen zu erhalten.
                </p>

                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'enableAjaxValidation' => true,
                    'enableClientValidation' => false,
                    'validateOnBlur' => false,
                    'validateOnType' => false,
                    'validateOnChange' => false,
                ]) ?>

                <?= $form->field($model, 'login', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'tabindex' => '1']]) ?>

                <?= $form->field($model, 'password', ['inputOptions' => ['class' => 'form-control', 'tabindex' => '2']])->passwordInput()->label(Yii::t('user', 'Password') . ($module->enablePasswordRecovery ? ' (' . Html::a(Yii::t('user', 'Forgot password?'), ['/user/recovery/request'], ['tabindex' => '5']) . ')' : '')) ?>


                <?= Html::submitButton(Yii::t('user', 'Sign in'), ['class' => 'btn btn-default btn-block', 'tabindex' => '3']) ?>

                <?php ActiveForm::end(); ?>
                <div class="row">
                    <div class="col col-sm-12">
                        <?php if ($module->enableConfirmation): ?>
                            <p class="text-center">
                                <?= Html::a(Yii::t('user', 'Didn\'t receive confirmation message?'), ['/user/registration/resend']) ?>
                            </p>
                        <?php endif ?>
                        <?= Connect::widget([
                            'baseAuthUrl' => ['/user/security/auth']
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>