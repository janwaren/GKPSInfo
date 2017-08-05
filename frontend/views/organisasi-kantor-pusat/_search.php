<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\OrganisasiKantorPusatSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="organisasi-kantor-pusat-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'level_internal_id') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'super_id') ?>

    <?= $form->field($model, 'deskripsi') ?>

    <?php // echo $form->field($model, 'telp') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
