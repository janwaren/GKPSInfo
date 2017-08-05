<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FullTimerPelayananSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="full-timer-pelayanan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'full_timer_id') ?>

    <?= $form->field($model, 'jemaat_tahbis_id') ?>

    <?= $form->field($model, 'tanggal_tahbis') ?>

    <?= $form->field($model, 'golongan') ?>

    <?php // echo $form->field($model, 'ruang') ?>

    <?php // echo $form->field($model, 'gaji_terakhir') ?>

    <?php // echo $form->field($model, 'refleksi_pribadi_pelayanan') ?>

    <?php // echo $form->field($model, 'pencapaian_pelayanan') ?>

    <?php // echo $form->field($model, 'visi_pribadi') ?>

    <?php // echo $form->field($model, 'misi_pribadi') ?>

    <?php // echo $form->field($model, 'motto') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
