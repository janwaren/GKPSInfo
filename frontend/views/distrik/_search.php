<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DistrikSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="distrik-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'super_id') ?>

    <?= $form->field($model, 'level_jemaat_id') ?>

    <?= $form->field($model, 'deskripsi') ?>

    <?php // echo $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'telp') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'tanggal_berdiri') ?>

    <?php // echo $form->field($model, 'status_jemaat_id') ?>

    <?php // echo $form->field($model, 'jumlah_tangga_banggal') ?>

    <?php // echo $form->field($model, 'jumlah_tangga_etek') ?>

    <?php // echo $form->field($model, 'jumlah_jiwa') ?>

    <?php // echo $form->field($model, 'jumlah_sintua') ?>

    <?php // echo $form->field($model, 'jumlah_syamas') ?>

    <?php // echo $form->field($model, 'nama_pengantar_jemaat') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
