<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FullTimerKuliahSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="full-timer-kuliah-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'full_timer_id') ?>

    <?= $form->field($model, 'universitas_id') ?>

    <?= $form->field($model, 'tahun_masuk') ?>

    <?= $form->field($model, 'strata_id') ?>

    <?php // echo $form->field($model, 'gelar_id') ?>

    <?php // echo $form->field($model, 'judul_thesis') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
