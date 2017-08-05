<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\JemaatKategorialSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jemaat-kategorial-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'jemaat_id') ?>

    <?= $form->field($model, 'kegiatan_id') ?>

    <?= $form->field($model, 'tempat') ?>

    <?= $form->field($model, 'hari') ?>

    <?php // echo $form->field($model, 'jadwal') ?>

    <?php // echo $form->field($model, 'jam') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
