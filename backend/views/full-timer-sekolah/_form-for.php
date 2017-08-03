<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FullTimerSekolah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="full-timer-sekolah-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-10">
            <?= $form->field($model, 'sd')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'tahun_lulus_sd')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-10">
            <?= $form->field($model, 'smp')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'tahun_lulus_smp')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-10">
            <?= $form->field($model, 'sma')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'tahun_lulus_sma')->textInput(['maxlength' => true]) ?>
        </div>
    </div> 

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
