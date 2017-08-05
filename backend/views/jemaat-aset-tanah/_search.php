<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\JemaatAsetTanahSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jemaat-aset-tanah-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'jemaat_id') ?>

    <?= $form->field($model, 'luas') ?>

    <?= $form->field($model, 'lokasi') ?>

    <?= $form->field($model, 'kondisi_pemakaian') ?>

    <?php // echo $form->field($model, 'asal_perolehan') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
