<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Distrik */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="distrik-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'super_id')->textInput() ?>

    <?= $form->field($model, 'level_jemaat_id')->textInput() ?>

    <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'telp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_berdiri')->textInput() ?>

    <?= $form->field($model, 'status_jemaat_id')->textInput() ?>

    <?= $form->field($model, 'jumlah_tangga_banggal')->textInput() ?>

    <?= $form->field($model, 'jumlah_tangga_etek')->textInput() ?>

    <?= $form->field($model, 'jumlah_jiwa')->textInput() ?>

    <?= $form->field($model, 'jumlah_sintua')->textInput() ?>

    <?= $form->field($model, 'jumlah_syamas')->textInput() ?>

    <?= $form->field($model, 'nama_pengantar_jemaat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
