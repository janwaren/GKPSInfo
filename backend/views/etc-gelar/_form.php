<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EtcGelar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="etc-gelar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'singkatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'posisi')->dropDownList([ 'belakang' => 'Belakang', 'depan' => 'Depan', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
