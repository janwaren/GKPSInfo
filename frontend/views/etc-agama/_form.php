<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EtcAgama */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="etc-agama-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_agama')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
