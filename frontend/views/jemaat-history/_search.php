<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\JemaatHistorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jemaat-history-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'jemaat_id') ?>

    <?= $form->field($model, 'tanggal_permulaan_kebaktian') ?>

    <?= $form->field($model, 'tanggal_peresmian') ?>

    <?= $form->field($model, 'tanggal_patibal_batu_onjolan') ?>

    <?php // echo $form->field($model, 'tanggal_pamongkoton') ?>

    <?php // echo $form->field($model, 'narasi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
