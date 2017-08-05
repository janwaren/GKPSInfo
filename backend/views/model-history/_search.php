<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ModelHistorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="model-history-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'table') ?>

    <?= $form->field($model, 'model_name') ?>

    <?= $form->field($model, 'model_label') ?>

    <?php // echo $form->field($model, 'field_name') ?>

    <?php // echo $form->field($model, 'field_id') ?>

    <?php // echo $form->field($model, 'field_label') ?>

    <?php // echo $form->field($model, 'old_value') ?>

    <?php // echo $form->field($model, 'new_value') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
