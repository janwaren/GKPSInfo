<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\JemaatDemografiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jemaat-demografi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'jemaat_id') ?>

    <?= $form->field($model, 'mayoritas_pekerjaan') ?>

    <?= $form->field($model, 'keterangan_pekerjaan') ?>

    <?= $form->field($model, 'mayoritas_pendidikan') ?>

    <?php // echo $form->field($model, 'keterangan_pendidikan') ?>

    <?php // echo $form->field($model, 'mayoritas_ekonomi') ?>

    <?php // echo $form->field($model, 'keterangan_ekonomi') ?>

    <?php // echo $form->field($model, 'mayoritas_agama') ?>

    <?php // echo $form->field($model, 'keterangan_agama') ?>

    <?php // echo $form->field($model, 'mayoritas_budaya') ?>

    <?php // echo $form->field($model, 'keterangan_budaya') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
