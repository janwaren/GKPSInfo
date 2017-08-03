<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use frontend\models\FullTimer;

/* @var $this yii\web\View */
/* @var $model backend\models\FullTimerKursus */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="full-timer-kursus-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'nama_kursus')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'tahun')->textInput(['maxlength' => true]) ?>
        </div>
    </div><!-- .row -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
