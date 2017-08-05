<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FullTimerSekolahSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="full-timer-sekolah-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'full_timer_id') ?>

    <?= $form->field($model, 'sd') ?>

    <?= $form->field($model, 'tahun_lulus_sd') ?>

    <?= $form->field($model, 'smp') ?>

    <?php // echo $form->field($model, 'tahun_lulus_smp') ?>

    <?php // echo $form->field($model, 'sma') ?>

    <?php // echo $form->field($model, 'tahun_lulus_sma') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
