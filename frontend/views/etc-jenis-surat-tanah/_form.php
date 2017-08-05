<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EtcJenisSuratTanah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="etc-jenis-surat-tanah-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jenis_surat_tanah')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
