<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\KarirEtcJabatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="karir-etc-jabatan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'posisi')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
