<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\KarirExternalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="karir-external-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'full_timer_id') ?>

    <?= $form->field($model, 'jabatan_id') ?>

    <?= $form->field($model, 'external_org_id') ?>

    <?= $form->field($model, 'tahun_mulai') ?>

    <?php // echo $form->field($model, 'tahun_selesai') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
