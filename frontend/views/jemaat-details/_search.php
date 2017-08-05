<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\JemaatDetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jemaat-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'jemaat_id') ?>

    <?= $form->field($model, 'alamat_jalan') ?>

    <?= $form->field($model, 'alamat_desa_kelurahan') ?>

    <?= $form->field($model, 'alamat_kecamatan') ?>

    <?php // echo $form->field($model, 'alamat_kota_kabupaten') ?>

    <?php // echo $form->field($model, 'alamat_provinsi') ?>

    <?php // echo $form->field($model, 'alamat_kodepos') ?>

    <?php // echo $form->field($model, 'telp') ?>

    <?php // echo $form->field($model, 'fax') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'website') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
