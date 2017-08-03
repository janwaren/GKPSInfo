<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FullTimerRiwayatHidupSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="full-timer-riwayat-hidup-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'full_timer_id') ?>

    <?= $form->field($model, 'tempat_lahir') ?>

    <?= $form->field($model, 'tanggal_lahir') ?>

    <?= $form->field($model, 'gereja_baptis') ?>

    <?php // echo $form->field($model, 'tanggal_baptis') ?>

    <?php // echo $form->field($model, 'gereja_nikah') ?>

    <?php // echo $form->field($model, 'tanggal_nikah') ?>

    <?php // echo $form->field($model, 'nama_pendeta') ?>

    <?php // echo $form->field($model, 'gereja_sidi') ?>

    <?php // echo $form->field($model, 'tanggal_sidi') ?>

    <?php // echo $form->field($model, 'kisah_hidup') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
