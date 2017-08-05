<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\JemaatStatistikSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jemaat-statistik-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'jemaat_id') ?>

    <?= $form->field($model, 'jumlah_tangga_banggal') ?>

    <?= $form->field($model, 'jumlah_tangga_etek') ?>

    <?= $form->field($model, 'jumlah_jiwa') ?>

    <?php // echo $form->field($model, 'jumlah_sintua') ?>

    <?php // echo $form->field($model, 'jumlah_syamas') ?>

    <?php // echo $form->field($model, 'nama_pengantar_jemaat') ?>

    <?php // echo $form->field($model, 'tahun_data') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
