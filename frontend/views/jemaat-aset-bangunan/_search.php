<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\JemaatAsetBangunanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jemaat-aset-bangunan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'jemaat_id') ?>

    <?= $form->field($model, 'jenis_bangunan_id') ?>

    <?= $form->field($model, 'luas_bangunan') ?>

    <?= $form->field($model, 'jumlah_unit') ?>

    <?php // echo $form->field($model, 'kondisi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
